<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\product_images;
use App\Models\product_tags;
use App\Models\products;
use App\Models\tags;
use App\Traits\DeleteModelTrait;
use App\Traits\StrogageImageTrait;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    use DeleteModelTrait;
    use StrogageImageTrait;
    private $category;
    private $products;
    private $product_images;
    private $tags;
    private $product_tags;
    public function __construct(Category $category,products $products,product_images $product_images,tags $tags,product_tags $product_tags)
    {
        $this->category=$category;
        $this->products=$products;
        $this->product_images=$product_images;
        $this->tags = $tags;
        $this->product_tags = $product_tags;
    }
    public function index(){
        Paginator::useBootstrap();
        $products = $this->products->latest()->paginate(5);
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        $htmlOption = $this->getCategory(0);
        return view('admin.product.add',compact('htmlOption'));
    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function store(ProductAddRequest $request){
        try{
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeartureImage = $this->strorageTraitUpload($request,'feature_image_path','product');
            if (!empty($dataUploadFeartureImage)){
                $dataProductCreate['feature_image_name']= $dataUploadFeartureImage['file_name'];
                $dataProductCreate['feature_image_path']= $dataUploadFeartureImage['file_path'];
            }
            $product = $this->products->create($dataProductCreate);
            //Insert data to product_images
            if ($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->strorageTraitUploadMutiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }
            //Insert tags to table tags
            if (!empty($request->tags)){
                foreach ($request->tags as $tagItem){
                    $tagInstance = $this->tags->firstOrCreate(['name'=>$tagItem]);
                    $tagIds[]=$tagInstance->id;
                }
            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('products.index');
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line : '.$exception->getLine());
        }
    }
    public function edit($id){
        $product = $this->products->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit',compact('htmlOption','product'));
    }
    public function update(Request $request,$id){
        try{
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeartureImage = $this->strorageTraitUpload($request,'feature_image_path','product');
            if (!empty($dataUploadFeartureImage)){
                $dataProductUpdate['feature_image_name']= $dataUploadFeartureImage['file_name'];
                $dataProductUpdate['feature_image_path']= $dataUploadFeartureImage['file_path'];
            }
            $this->products->find($id)->update($dataProductUpdate);
            $product = $this->products->find($id);
            //Insert data to product_images
            if ($request->hasFile('image_path')){
                $this->product_images->where('product_id',$id)->delete();
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->strorageTraitUploadMutiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }
            //Insert tags to table tags
            if (!empty($request->tags)){
                foreach ($request->tags as $tagItem){
                    $tagInstance = $this->tags->firstOrCreate(['name'=>$tagItem]);
                    $tagIds[]=$tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('products.index');
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line : '.$exception->getLine());
        }
    }
    public function delete($id){
        return $this->DeleteModelTrait($id,$this->products);
    }
}

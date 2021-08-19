<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StrogageImageTrait;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    use DeleteModelTrait;
    use StrogageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index(){
        Paginator::useBootstrap();
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }
    public function create(){
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request){
        try{
            DB::beginTransaction();
            $dataInsertSlider = [
                'name'=>$request->name,
                'description'=>$request->description,
            ];
            $dataImageSlider = $this->strorageTraitUpload($request,'image_path','slider');
            if(!empty($dataImageSlider)){
                $dataInsertSlider['image_name'] = $dataImageSlider['file_name'];
                $dataInsertSlider['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataInsertSlider);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('Lỗi'.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }
    public function edit($id){
        $slider = $this->slider->find($id);
        return view('admin.slider.edit',compact('slider'));
    }
    public function update(Request $request,$id){
        try{
            DB::beginTransaction();
            $dataUpdateSlider = [
                'name'=>$request->name,
                'description'=>$request->description,
            ];
            $dataImageSlider = $this->strorageTraitUpload($request,'image_path','slider');
            if(!empty($dataImageSlider)){
                $dataUpdateSlider['image_name'] = $dataImageSlider['file_name'];
                $dataUpdateSlider['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->find($id)->update($dataUpdateSlider);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('Lỗi'.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }
    public function delete($id){
        return $this->DeleteModelTrait($id,$this->slider);
    }
}

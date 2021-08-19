<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    //Quan hệ 1 nhiều : 1 sản phẩm có nhiều hình ảnh
    public function images(){
        return $this->hasMany(product_images::class,'product_id');
    }
    //quan hệ nhiều nhiều : nhiều sản phảm có nhiều tag và nhiều tag có nhiều sản phẩm , qua bảng trung gia product_tags
    public function tags(){
        return $this->belongsToMany(tags::class,'product_tags','product_id','tag_id')->withTimestamps();;
    }
    //quan hệ 1 nhiều : 1 danh mục có nhiều sản phẩm
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}

//product với product image là mối quan hệ 1 nhiều

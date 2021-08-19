<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StrogageImageTrait{
    public function strorageTraitUpload($request,$fieldName,$folderNam){
        if ($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            //lấy tên ảnh
            $file_Name_Origin = $file->getClientOriginalName();
            $file_Name_Hash = Str::random(20).'.'.$file->getClientOriginalExtension();
            //lấy đưa vào product và lấy đường dẫn
            $path = $request->file($fieldName)->storeAS('public/'.$folderNam.'/'.auth()->id(),$file_Name_Hash);
            $dataUploadTrait = [
                'file_name' => $file_Name_Origin,
                'file_path'=> Storage::url($path),
            ];
            return $dataUploadTrait;
        }
        return null;
    }
    public function strorageTraitUploadMutiple($file,$folderNam){
        $file_Name_Origin = $file->getClientOriginalName();
        $file_Name_Hash = Str::random(20).'.'.$file->getClientOriginalExtension();
        $path = $file->storeAS('public/'.$folderNam.'/'.auth()->id(),$file_Name_Hash);
        $dataUploadTrait = [
            'file_name' => $file_Name_Origin,
            'file_path'=> Storage::url($path),
        ];
        return $dataUploadTrait;
    }
}

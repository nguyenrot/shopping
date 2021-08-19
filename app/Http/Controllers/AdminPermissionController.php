<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function createPermisssion(){
        return view('admin.permission.add');
    }

    public function store(Request $request){
        $permission = Permission::create([
            'name' => $request->module_parent,
            'display_name'=> $request->module_parent,
            'parent_id'=> 0,
        ]);
        $name_permision = config('permissions.module_childrent');
        foreach ($request->module_childrent as $value){
            Permission::create([
                'name' => $name_permision[$value].' '.$permission->name,
                'display_name'=> $name_permision[$value].' '.$permission->name,
                'parent_id'=> $permission->id,
                'key_code'=> $request->module_parent.'_'.$value
            ]);
        }
    }
}

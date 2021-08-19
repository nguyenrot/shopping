<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use App\Models\Settings;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;

class AdminSettingsController extends Controller
{
    use DeleteModelTrait;
    private $settings;
    public function __construct(Settings $settings)
    {
        $this->settings=$settings;
    }

    public function index(){
        Paginator::useBootstrap();
        $settings = $this->settings->latest()->paginate(5);
        return view('admin.setting.index',compact('settings'));
    }
    public function create(){
        return view('admin.setting.add');
    }
    public function store(AddSettingRequest $request){
        $this->settings->create([
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value,
            'type'=>$request->type,
        ]);
        return redirect()->route('settings.index');
    }
    public function edit($id){
        $settings = $this->settings->find($id);
        return view('admin.setting.edit',compact('settings'));
    }
    public function update(Request $request,$id){
        $this->settings->find($id)->update([
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value,
        ]);
        return redirect()->route('settings.index');
    }
    public function delete($id){
        return $this->DeleteModelTrait($id,$this->settings);
    }
}

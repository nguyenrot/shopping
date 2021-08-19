@extends('layouts.admin')
@section('title')
    <title>Cập nhập setting</title>
@endsection
@section('linkcss')
    <link href="{{asset('admin_resources/setting/add/add.css')}}" rel="stylesheet" />
@endsection
@section('content')
    @include('partials.content-header',['name'=>'settings','key'=>'Add'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Cập nhập setting</h4>
                            <a href="" class="btn btn-success float-right m-2">Quay lại</a>
                        </div>
                        <form action="{{route('settings.update',['id'=>$settings->id])}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Config key</label>
                                <input type="text" value="{{$settings->config_key}}"  name="config_key" class="form-control border-1 @error('config_key') is-invalid @enderror" placeholder="Nhập config key...">
                                @error('config_key')
                                <div class="alert alert-danger mt-2"> <i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Config key</label>
                                @if(request()->type==='Text')
                                    <input type="text" value="{{$settings->config_value}}"  name="config_value" class="form-control border-1 @error('config_value') is-invalid @enderror" placeholder="Nhập config value...">
                                    @error('config_value')
                                    <div class="alert alert-danger mt-2"> <i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                                    @enderror
                                @elseif(request()->type==='Textarea')
                                    <textarea name="config_value" class="form-control border-1 @error('config_value') is-invalid @enderror" placeholder="Nhập config value..." rows="5">{{$settings->config_value}}</textarea>
                                    @error('config_value')
                                    <div class="alert alert-danger mt-2"> <i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                                    @enderror
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

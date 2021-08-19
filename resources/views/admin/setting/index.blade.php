@extends('layouts.admin')
@section('title')
    <title>Setting</title>
@endsection
@section('linkcss')
    <link rel="stylesheet" href="{{asset('admin_resources/setting/index/index.css')}}">
@endsection
@section('content')
    @include('partials.content-header',['name'=>'settings','key'=>'List'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Setting</h4>
                            <div class="dropdown">
                                <button class="dropbtn btn btn-primary">ADD Setting <i class="me-3 fas fa-caret-down"></i></button>
                                <div class="dropdown-content">
                                    <a href="{{route('settings.create').'?type=Text'}}" class="dropdown-item">Text</a>
                                    <a href="{{route('settings.create').'?type=Textarea'}}" class="dropdown-item">Text Area</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Config key</th>
                                    <th class="border-top-0">Config value</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($settings as $setting)
                                    <tr>
                                        <td>{{$setting->id}}</td>
                                        <td>{{$setting->config_key}}</td>
                                        <td>{{$setting->config_value}}</td>
                                        <td>
                                            <a href="{{route('settings.edit',['id'=>$setting->id]).'?type='.$setting->type}}" class="btn btn-default">Edit</a>
                                            <a href="" data-url="{{route('settings.delete',['id'=>$setting->id])}}" class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            {{$settings->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admin_resources/main.js')}}"></script>
@endsection

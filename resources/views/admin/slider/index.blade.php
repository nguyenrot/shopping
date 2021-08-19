@extends('layouts.admin')
@section('title')
    <title>Slider</title>
@endsection
@section('linkcss')
    <link rel="stylesheet" href="{{asset('admin_resources/slider/index/index.css')}}">
@endsection
@section('content')
    @include('partials.content-header',['name'=>'slider','key'=>'List'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Menus</h4>
                            <a href="{{route('slider.create')}}" class="btn btn-success float-right m-2">ADD</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Tên Slider</th>
                                    <th class="border-top-0">Description</th>
                                    <th class="border-top-0">Hình ảnh</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td>{{$slider->name}}</td>
                                        <td>{{$slider->description}}</td>
                                        <td>
                                            <img class="img-thumbnail slider-image_150_100" src="{{$slider->image_path}}" alt="">
                                        </td>
                                        <td>
                                            <a href="{{route('slider.edit',['id' => $slider->id])}}" class="btn btn-default">Edit</a>
                                            <a href="" data-url="{{route('slider.delete',['id'=>$slider->id])}}" class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            {{$sliders->links()}}
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

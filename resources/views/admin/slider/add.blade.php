@extends('layouts.admin')
@section('title')
    <title>Thêm danh mục</title>
@endsection
@section('linkcss')
    <link href="{{asset('admin_resources/slider/add/add.css')}}" rel="stylesheet" />
@endsection
@section('content')
    @include('partials.content-header',['name'=>'slider','key'=>'Add'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Thêm slider</h4>
                            <a href="" class="btn btn-success float-right m-2">Quay lại</a>
                        </div>
                        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tên menu</label>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control border-1 @error('name') is-invalid @enderror" placeholder="Nhập tên menu..">
                                @error('name')
                                    <div class="alert alert-danger mt-2"> <i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mô tả</label>
                                <textarea name="description" class="form-control border-1 @error('description') is-invalid @enderror" placeholder="Nhập mô tả.." rows="4">{{old('description')}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hình ảnh</label>
                                <input type="file" name="image_path" class="form-control border-1 @error('image_path') is-invalid @enderror">
                                @error('image_path')
                                    <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

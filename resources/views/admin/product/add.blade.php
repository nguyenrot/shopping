@extends('layouts.admin')

@section('title')
    <title>Thêm sản phẩm</title>
@endsection

@section('linkcss')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_resources/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    @include('partials.content-header',['name'=>'products','key'=>'Add'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Thêm sản phẩm</h4>
                            <a href="" class="btn btn-success float-right m-2">Quay lại</a>
                        </div>
{{--                        <div class="col-md-12">--}}
{{--                            @if ($errors->any())--}}
{{--                                <div class="alert alert-danger">--}}
{{--                                    <ul>--}}
{{--                                        @foreach ($errors->all() as $error)--}}
{{--                                            <li>{{ $error }}</li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" name="name"  class="form-control border-1 @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm.." value="{{old('name')}}">
                                @error('name')
                                    <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá sản phẩm</label>
                                <input type="text" name="price"  class="form-control border-1 @error('price') is-invalid @enderror" placeholder="Nhập giá sản phẩm.." value="{{old('price')}}">
                                @error('price')
                                    <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input type="file" name="feature_image_path" class="form-control border-1">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ảnh chi tiết</label>
                                <input type="file" name="image_path[]" multiple class="form-control border-1">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chọn danh mục</label>
                                <select class="form-select select2_init @error('category_id') is-invalid @enderror" name="category_id" value="{{old('category_id')}}">
                                    <option value="" >Chọn danh mục</option>
                                    {!!$htmlOption!!}
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nhập tags cho sản phẩm</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nội dung sản phẩm</label>
                                <textarea class="form-control ps-0 form-control-line editor @error('contents') is-invalid @enderror" name="contents" rows="15" >{{old('contents')}}</textarea>
                                @error('contents')
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
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/tinymce.min.js" integrity="sha512-laacsEF5jvAJew9boBITeLkwD47dpMnERAtn4WCzWu/Pur9IkF0ZpVTcWRT/FUCaaf7ZwyzMY5c9vCcbAAuAbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>>
    <script src="{{asset('admin_resources/product/add/add.js')}}"></script>
@endsection

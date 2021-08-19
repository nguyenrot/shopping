@extends('layouts.admin')

@section('title')
    <title>Cập nhập sản phẩm</title>
@endsection

@section('linkcss')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_resources/product/add/add.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin_resources/product/edit/edit.css')}}">
@endsection

@section('content')
    @include('partials.content-header',['name'=>'products','key'=>'Edit'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Cập nhập sản phẩm</h4>
                            <a href="" class="btn btn-success float-right m-2">Quay lại</a>
                        </div>
                        <form action="{{route('products.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" name="name" value="{{$product->name}}" class="form-control border-1" placeholder="Nhập tên sản phẩm..">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá sản phẩm</label>
                                <input type="text" name="price" value="{{$product->price}}" class="form-control border-1" placeholder="Nhập giá sản phẩm..">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input type="file" name="feature_image_path" class="form-control border-1">
                                <img class="mt-2 img-thumbnail product-image_50_50" src="{{$product->feature_image_path}}" alt="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ảnh chi tiết</label>
                                <input type="file" name="image_path[]" multiple class="form-control border-1">
                                <div class="mt-2">

                                    @foreach($product->images as $productImageItem)
                                        <img class="img-thumbnail product-image_50_50" src="{{$productImageItem->image_path}}" alt="">
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chọn menu cha</label>
                                <select class="form-select select2_init" name="category_id">
                                    <option selected value="0" >Chọn danh mục</option>
                                    {!!$htmlOption!!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nhập tags cho sản phẩm</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                    @foreach($product->tags as $tagItem)
                                        <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nội dung sản phẩm</label>
                                <textarea class="form-control ps-0 form-control-line editor" name="contents" rows="15">
                                    {{$product->content}}
                                </textarea>
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

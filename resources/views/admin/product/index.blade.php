@extends('layouts.admin')
@section('title')
    <title>Sản phẩm</title>
@endsection
@section('linkcss')
    <link rel="stylesheet" href="{{asset('admin_resources/product/index/list.css')}}">
@endsection
@section('content')
    @include('partials.content-header',['name'=>'products','key'=>'List'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Sản phẩm</h4>
                            <a href="{{route('products.create')}}" class="btn btn-success float-right m-2">ADD</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Tên sản phẩm</th>
                                    <th class="border-top-0">Giá</th>
                                    <th class="border-top-0">Hình ảnh</th>
                                    <th class="border-top-0">Danh mục</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $productItem)
                                <tr>
                                    <td>{{$productItem->id}}</td>
                                    <td>{{$productItem->name}} VND</td>
                                    <td>{{ number_format($productItem->price)}} VND</td>
                                    <td>
                                        <img class="img-thumbnail product-image_50_50" src="{{$productItem->feature_image_path}}" alt="">
                                    </td>
                                    <td>{{optional($productItem->category)->name }}</td>
                                    <td>
                                        <a href="{{route('products.edit',['id'=>$productItem->id])}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{route('products.delete',['id'=>$productItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                           {{$products->links()}}
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

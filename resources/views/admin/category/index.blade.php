@extends('layouts.admin')
@section('title')
    <title>Danh mục</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'categories','key'=>'List'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Danh mục sản phẩm</h4>
                            @can('category-add')
                            <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">ADD</a>
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Tên danh mục</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categoris as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @can('category-edit')
                                            <a href="{{route('categories.edit',['id'=>$category->id])}}" class="btn btn-default">Edit</a>
                                        @endcan

                                        @can('category-delete')
                                            <a href="{{route('categories.delete',['id'=>$category->id])}}" class="btn btn-danger">Delete</a>
                                            @endcan
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                           {{$categoris->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

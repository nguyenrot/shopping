@extends('layouts.admin')
@section('title')
    <title>Menu</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'menus','key'=>'List'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Menus</h4>
                            <a href="{{route('menus.create')}}" class="btn btn-success float-right m-2">ADD</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Tên menu</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menus as $menu)
                                <tr>
                                    <td>{{$menu->id}}</td>
                                    <td>{{$menu->name}}</td>
                                    <td>
                                        <a href="{{route('menus.edit',['id'=>$menu->id])}}" class="btn btn-default">Edit</a>
                                        <a href="{{route('menus.delete',['id'=>$menu->id])}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                           {{$menus->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.admin')
@section('title')
    <title>Vai trò</title>
@endsection
@section('linkcss')

@endsection
@section('content')
    @include('partials.content-header',['name'=>'roles','key'=>'List'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Roles</h4>
                            <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">ADD</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Tên vai trò</th>
                                    <th class="border-top-0">Mô tả vai trò</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->display_name}}</td>
                                        <td>
                                            <a href="{{route('roles.edit',['id' => $role->id])}}" class="btn btn-default">Edit</a>
                                            <a href="" data-url="{{route('roles.delete',['id'=>$role->id])}}" class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            {{$roles->links()}}
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

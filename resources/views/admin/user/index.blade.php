@extends('layouts.admin')
@section('title')
    <title>Users</title>
@endsection
@section('linkcss')
{{--    <link rel="stylesheet" href="{{asset('admin_resources/slider/index/index.css')}}">--}}
@endsection
@section('content')
    @include('partials.content-header',['name'=>'users','key'=>'List'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Users</h4>
                            <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">ADD</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Tên</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-default">Edit</a>
                                            <a href="" data-url="{{route('users.delete',['id'=>$user->id])}}" class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            {{$users->links()}}
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

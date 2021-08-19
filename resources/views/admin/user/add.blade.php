@extends('layouts.admin')
@section('title')
    <title>Thêm user</title>
@endsection
@section('linkcss')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin_resources/user/add/add.css')}}">
@endsection

@section('content')
    @include('partials.content-header',['name'=>'users','key'=>'Add'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Thêm users</h4>
                            <a href="" class="btn btn-success float-right m-2">Quay lại</a>
                        </div>
                        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tên user</label>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control border-1 " placeholder="Nhập tên user..">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" value="{{old('email')}}" name="email" class="form-control border-1 " placeholder="Nhập email..">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control border-1 " placeholder="Nhập tên menu..">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chọn vai trò</label>
                                <select name="role_id[]" name="" class="form-control select2_init" multiple>
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
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
    <script src="{{asset('admin_resources/user/add/add.js')}}"></script>
@endsection

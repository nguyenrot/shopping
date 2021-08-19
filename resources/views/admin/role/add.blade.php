@extends('layouts.admin')
@section('title')
    <title>Thêm vai trò</title>
@endsection
@section('linkcss')

@endsection
@section('content')
    @include('partials.content-header',['name'=>'roles','key'=>'Add'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Thêm role</h4>
                            <a href="" class="btn btn-success float-right m-2">Quay lại</a>
                        </div>
                        <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tên vai trò</label>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control border-1 " placeholder="Nhập tên vai trò..">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mô tả vai trò</label>
                                <textarea name="display_name" class="form-control border-1 " placeholder="Nhập mô tả.." rows="4">{{old('display_name')}}</textarea>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="col-md-3">
                                        <label>
                                            <input type="checkbox" class="form-check-input checkall">
                                        </label>
                                        Check All
                                    </h5>
                                </div>
                                @foreach($permissionsParent as $permissionsParentItem)
                                <div class="card border-dark mb-3 col-md-12">
                                    <div class="card-header border border-primary rounded-3 ">
                                            <h5 class="">
                                                <label class="form-check-labe">
                                                    <input type="checkbox" class="form-check-input checkbox_wrapper" value="">
                                                </label>
                                                Module {{$permissionsParentItem->name}}
                                            </h5>
                                    </div>
                                    <div class="card-body text-dark border border-dark rounded-3 ">
                                        <div class="row">
                                            @foreach($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)
                                                <h6 class="card-title col-md-3">
                                                    <label class="form-check-labe">
                                                        <input type="checkbox" name="permission_id[]" class="form-check-input checkbox_childrent" value="{{$permissionsChildrentItem->id}}">
                                                    </label>
                                                    {{$permissionsChildrentItem->name}}
                                                </h6>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
    <script src="{{asset('admin_resources/role/add/add.js')}}"></script>
@endsection

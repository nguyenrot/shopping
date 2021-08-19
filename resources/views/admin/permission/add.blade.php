@extends('layouts.admin')
@section('title')
    <title>Thêm permission</title>
@endsection

@section('content')
{{--    @include('partials.content-header',['name'=>'permissions','key'=>'Add'])--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Thêm permission</h4>
                            <a href="" class="btn btn-success float-right m-2">Quay lại</a>
                        </div>
                        <form action="{{route('permissions.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Chọn tên module</label>
                                <select class="form-select" name="module_parent">
                                    <option value="">Chọn tên module</option>
                                    @foreach(config('permissions.table_module') as $moduleItem)
                                        <option  value="{{$moduleItem}}">{{$moduleItem}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="row d-flex justify-content-around">
                                    @foreach(config('permissions.module_childrent') as $moduleItemChildrent => $value)
                                    <div class="col-md-3 d-flex justify-content-around">
                                        <h6>
                                            <label for="">
                                                <input type="checkbox" class="form-check-input" value="{{$moduleItemChildrent}}" name="module_childrent[]">
                                                {{$value}}
                                            </label>
                                        </h6>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

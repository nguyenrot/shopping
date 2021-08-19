@extends('layouts.admin')
@section('title')
    <title>Cập nhập menu</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'menus','key'=>'Edit'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Cập nhập danh mục</h4>
                            <a href="{{route('menus.index')}}" class="btn btn-success float-right m-2">Quay lại</a>
                        </div>
                        <form action="{{route('menus.update',['id'=>$menu->id])}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tên menu</label>
                                <input type="text" name="name" value="{{$menu->name}}" class="form-control border-1" placeholder="Nhập tên menu...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chọn menu cha</label>
                                <select class="form-select" name="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    {!!$htmlOption!!}
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

@extends('layouts.admin')
@section('title')
    <title>Cập nhập danh mục</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'categories','key'=>'Edit'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Cập nhậ danh mục</h4>
                            <a href="{{route('categories.index')}}" class="btn btn-success float-right m-2">Quay lại</a>
                        </div>
                        <form action="{{route('categories.update',['id'=>$category->id])}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tên danh mục</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control border-1" placeholder="Nhập tên danh mục...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chọn danh mục cha</label>
                                <select class="form-select" name="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
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

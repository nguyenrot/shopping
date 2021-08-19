@extends('layouts.admin')
@section('title')
    <title>Thêm danh mục</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'menus','key'=>'Add'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title">Thêm menu</h4>
                            <a href="" class="btn btn-success float-right m-2">Quay lại</a>
                        </div>
                        <form action="{{route('menus.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tên menu</label>
                                <input type="text" required name="name" class="form-control border-1" placeholder="Nhập tên menu..">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chọn menu cha</label>
                                <select class="form-select" name="parent_id">
                                    <option selected value="0">Chọn menu cha</option>
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

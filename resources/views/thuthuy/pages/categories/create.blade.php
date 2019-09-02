@extends('thuthuy.layouts.master')

@section('title', 'Tạo mới danh mục')

@section('breadcrumb', 'Tạo mới danh mục')

@section('title-content', 'Danh mục')

@section('content')
<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Tạo mới một danh mục </h6>
    <div class="form-layout">
        <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="row mg-b-25">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Tên danh mục: </label>
                    <input class="form-control" type="text" name="name" placeholder="Nhập tên danh mục...">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Status: </label>
                    <select class="form-control" name="status">
                        <option value="1" class="hien">Hiển thị</option>
                        <option value="0" class="an">Ẩn</option>
                    </select>
                </div>
            </div>
            <!-- col-4 -->
        </div>
        <!-- row -->
        <div class="form-layout-footer">
        <button type="submit" class="pure-button fuller-button blue" name="create" value="one">Tạo ngay</button>

        <button type="submit" class="pure-button fuller-button blue" name="create" value="more">Tạo và thêm mới</button>

        <a href="{{ route('categories.index') }}">
            <button type="button" class="pure-button fuller-button red">Huỷ</button>
        </a>
        </div>
        <!-- form-layout-footer -->
        </form>
    </div><!-- form-layout -->
</div><!-- card -->
@endsection
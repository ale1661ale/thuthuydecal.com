@extends('thuthuy.layouts.master')

@section('title', 'Tạo mới thể loại')

@section('breadcrumb', 'Tạo mới thể loại')

@section('content')
<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Tạo mới một thể loại </h6>
    <div class="form-layout">
        <form action="{{ route('product-types.store') }}" method="post">

        @csrf

        <div class="row mg-b-25">
            <div class="col-lg-8">
                <div class="form-group">
                    <label class="form-control-label">Tên thể loại: </label>
                    <input class="form-control" type="text" name="name" placeholder="Nhập tên thể loại...">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-8 -->

            <div class="col-lg-8">
                <div class="form-group">
                    <label class="form-control-label">Danh mục: </label>
                    <select class="form-control" name="id_cate">
                        @foreach($category as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- col-8 -->

            <div class="col-lg-8">
                <div class="form-group">
                    <label class="form-control-label">Hot: </label>
                    <select class="form-control" name="hot">
                        <option value="1" class="noibat">Thể loại nổi bật</option>
                        <option value="0" class="thuong">Thể loại thường</option>
                    </select>
                </div>
            </div>
            <!-- col-8 -->


            <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Status: </label>
                    <select class="form-control" name="status">
                        <option value="1" class="hien">Hiển thị</option>
                        <option value="0" class="an">Ẩn</option>
                    </select>
                </div>
            </div>
            <!-- col-8 -->

        </div>
        <!-- row -->
        <div class="form-layout-footer">
            <button type="submit" class="pure-button fuller-button blue">Tạo ngay</button>
            <button type="submit" class="pure-button fuller-button blue">Tạo và thêm mới</button>
            <button type="reset" class="pure-button fuller-button red">Huỷ</button>
        </div>
        <!-- form-layout-footer -->
        </form>
    </div><!-- form-layout -->
</div><!-- card -->
@endsection
@extends('thuthuy.layouts.master')

@section('title', 'Tạo mới một thông tin')

@section('breadcrumb', 'tạo mới thông tin')

@section('content')
<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Tạo mới một thông tin trong trang client </h6>
    <div class="form-layout">
        <form action="{{ route('ales.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row mg-b-25">

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Tiêu dề: </label>
                    <input class="form-control" type="text" name="title" placeholder="Nhập tiêu đề...">
                    @if($errors->has('title'))
                        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-122 -->

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Key_name: </label>
                    <input class="form-control" 
                        type="text" name="key_name" 
                        placeholder="bắt buộc phãi nhập không dấu và khoảng cách">
                    @if($errors->has('key_name'))
                        <div class="alert alert-danger">{{ $errors->first('key_name') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-12 -->

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Hình ảnh: </label>
                    <input class="form-control" type="file" name="image">
                    @if($errors->has('image'))
                        <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-12 -->

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Mô tả: </label>
                    <input class="form-control" type="text" name="description">
                    @if($errors->has('description'))
                        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-12 -->

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Nội dung: </label>
                    <textarea class="form-control content" rows="10" cols="10" name="content" id="demon"></textarea>
                    @if($errors->has('content'))
                        <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-12 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Status: </label>
                    <select class="form-control" name="status">
                        <option value="1" class="hien">Hiển thị</option>
                        <option value="0" class="an">Ẩn</option>
                    </select>
                </div>
            </div>
            <!-- col-6 -->
        </div><!-- /.row -->

        <div class="form-layout-footer">
            <button type="submit" class="pure-button fuller-button blue" name="create" value="one">Tạo ngay</button>
            
            <a href="{{ route('ales.index') }}">
                <button type="button" class="pure-button fuller-button red">Huỷ</button>
            </a>
        </div>
        
            
        </form>
    </div><!-- form-layout -->
</div><!-- card -->
@endsection
@extends('thuthuy.layouts.master')

@section('title', 'Tạo mới một bài giới thiệu')

@section('breadcrumb', 'Tạo mới bài GT')

@section('title-content', 'Danh mục')

@section('content')
<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Tạo mới một bài giới thiệu </h6>
    <div class="form-layout">
        <form action="{{ route('introduces.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row mg-b-25">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Tên bài viết: </label>
                    <input class="form-control" type="text" name="title" placeholder="Nhập tên bài viết...">
                    @if($errors->has('title'))
                        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
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

            <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Status: </label>
                    <select class="form-control" name="status">
                        <option value="1" class="hien">Hiển thị</option>
                        <option value="0" class="an">Ẩn</option>
                    </select>
                </div>
            </div>
            <!-- col-12 -->

        </div>
        <!-- row -->
        <div class="form-layout-footer">
            <button type="submit" class="pure-button fuller-button blue" name="create" value="one">Tạo ngay</button>

            <button type="submit" class="pure-button fuller-button blue" name="create" value="more">Tạo và thêm mới</button>

            <a href="{{ route('introduces.index') }}">
                <button type="button" class="pure-button fuller-button red">Huỷ</button>
            </a>
        </div>
        <!-- form-layout-footer -->
        </form>
    </div><!-- form-layout -->
</div><!-- card -->
@endsection
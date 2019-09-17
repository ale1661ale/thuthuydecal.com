@extends('thuthuy.layouts.master')

@section('title', 'Tạo mới một logo')

@section('breadcrumb', 'Tạo mới logo')

@section('content')
<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Tạo mới một ảnh logo </h6>
    <div class="form-layout">
        <form action="{{ route('logos.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="row mg-b-25">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Tên : </label>
                        <input class="form-control" type="text" name="name" placeholder="Nhập tên logo...">
                        @if($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>
                <!-- col-12 -->

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Link : </label>
                        <input class="form-control" type="text" name="link" placeholder="không cần thiết...">
                    </div>
                </div>
                <!-- col-12 -->

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Hình ảnh : ( 170x80 là tốt nhất ) </label>
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
                    </div>
                </div>
                <!-- col-12 -->

                <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Col_val: </label>
                        <select class="form-control" name="id_image_type">
                            <option value="1" class="logo">Logo thuthuy</option>
                            <option value="0" class="doitac">Logo đối tác</option>
                        </select>
                    </div>
                </div>
                <!-- col-6 -->

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

            </div>
            <!-- row -->
            <div class="form-layout-footer">
                <button type="submit" class="pure-button fuller-button blue" name="create" value="one">Tạo ngay</button>
                
                <a href="{{ route('logos.index') }}">
                    <button type="button" class="pure-button fuller-button red">Huỷ</button>
                </a>
            </div>
            <!-- form-layout-footer -->
        </form>
    </div><!-- form-layout -->
</div><!-- card -->
@endsection
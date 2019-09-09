@extends('thuthuy.layouts.master')

@section('title', 'Thêm mới admin')

@section('breadcrumb', 'Thêm mới admin')

@section('content')
<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Thêm mới admin </h6>
    <div class="form-layout">
        <form action="{{ route('admins.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row mg-b-25">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Tên : </label>
                    <input class="form-control" type="text" name="name" placeholder="Nhập tên admin...">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Email: </label>
                    <input class="form-control" type="text" name="email" placeholder="Nhập email đăng nhập...">
                    @if($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Mật khẩu: </label>
                    <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu...">
                    @if($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Nhập lại mật khẩu: </label>
                    <input class="form-control" type="password" name="confirmPassword" placeholder="Nhập lại mật khẩu...">
                    @if($errors->has('confirmPassword'))
                        <div class="alert alert-danger">{{ $errors->first('confirmPassword') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Avatar: </label>
                    <input class="form-control" type="file" name="avatar">
                    @if($errors->has('avatar'))
                        <div class="alert alert-danger">{{ $errors->first('avatar') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Giới tính: </label>
                    <select class="form-control" name="sex">
                        <option value="1" class="name">Nam</option>
                        <option value="2" class="nu">Nữ</option>
                        <option value="3" class="khac">Khác</option>
                    </select>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Số điện thoại: </label>
                    <input class="form-control" type="text" name="phone" placeholder="Nhập số điện thoại...">
                    @if($errors->has('phone'))
                        <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Địa chỉ: </label>
                    <input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ...">
                    @if($errors->has('address'))
                        <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Chức danh: </label>
                    <select class="form-control" name="role">
                        <option value="1" class="admin">Admin</option>
                        <option value="0" class="user">User</option>
                    </select>
                </div>
            </div>
            <!-- col-6 -->

        </div>
        <!-- row -->
        <div class="form-layout-footer">
            <button type="submit" class="pure-button fuller-button blue" name="create" value="one">Tạo ngay</button>

            <a href="{{ route('admins.index') }}">
                <button type="button" class="pure-button fuller-button red">Huỷ</button>
            </a>
        </div>
        <!-- form-layout-footer -->
        </form>
    </div><!-- form-layout -->
</div><!-- card -->
@endsection
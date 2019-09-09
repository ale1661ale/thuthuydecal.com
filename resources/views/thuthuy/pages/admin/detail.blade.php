@extends('thuthuy.layouts.master')

@section('title', @$admin->name)

@section('breadcrumb', @$admin->name)

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="inline-block">
        <a href="{{ route('admins.index') }}" style="float:left;font-size: 22px;transform: translateY(-10px);">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
        <h6 class="card-body-title pd-l-30">Thông tin chi tiết của  : {{ $admin->name }}</h6>
    </div>
    
    <div class="form-layout">
        <form action="{{ route('admins.update', $admin->id) }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row mg-b-25">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Tên : </label>
                    <input class="form-control name" 
                           type="text" 
                           name="name" 
                           value="{{ old('name', $admin->name) ? : '' }}"
                    >
                    @if ($errors->has('name'))
                        <div class="alert alert-danger error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-12 -->

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Email : </label>
                    <p class="form-control email" name="email">{{ $admin->email }}</p>
                </div>
            </div>
            <!-- col-12 -->

            <div class="col-lg-6">
                <label class="form-control-label">Ảnh đại diện: </label>
                <img src="img/upload/user/{{ $admin->avatar }}" 
                class="img img-thumbnail imageThum" 
                width="200" height="100" style="margin-left:15%"
                lign="center" title="{{ old('name', $admin->name )}}"
                >
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">
                        @if (isset($admin->avatar))
                            Thay đổi ảnh
                        @else
                            Nhập ảnh đại diện
                        @endif
                    </label>
                    <input class="form-control avatar" 
                           type="file" 
                           name="avatar"
                    >
                    @if ($errors->has('avatar'))
                        <div class="alert alert-danger error">{{ $errors->first('avatar') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Giới tính : </label>
                    <select class="form-control" name="sex">
                        <option value="1" {{ $admin->status == 1 ? 'selected' : '' }} class="nam">Nam</option>
                        <option value="2" {{ $admin->status == 2 ? 'selected' : '' }} class="nu">Nữ</option>
                        <option value="3" {{ $admin->status == 3 ? 'selected' : '' }} class="khac">Khác</option>
                    </select>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Số điện thoại : </label>
                    <input class="form-control phone" 
                           type="text" 
                           name="phone" 
                           value="{{ old('phone', $admin->phone) ? : '' }}"
                    >
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger error">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Địa chỉ : </label>
                    <input class="form-control address" 
                           type="text" 
                           name="address" 
                           value="{{ old('address', $admin->address) ? : '' }}"
                    >
                    @if ($errors->has('address'))
                        <div class="alert alert-danger error">{{ $errors->first('address') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Chức danh: </label>
                    <p class="form-control role" name="role">
                        @if ($admin->role ==1)
                            Admin
                        @else
                            User
                        @endif
                    </p>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Cập nhật gần đây nhất: </label>
                    <p class="form-control updated_at" name="updated_at">{{ $admin->updated_at }}</p>
                </div>
            </div>
            <!-- col-6 -->

        </div>
        <!-- row -->
        <div class="form-layout-footer">
            <button type="submit" 
                class="pure-button fuller-button blue updateAdmin" 
                name="create" 
                value="one" 
                data-id=" {{ $admin->id }} ">Cập nhật mới
            </button>

            <a href="{{ route('admins.index') }}">
                <button type="button" class="pure-button fuller-button red">Huỷ</button>
            </a>
        </div>
        <!-- form-layout-footer -->
        </form>
    </div><!-- form-layout -->
</div><!-- card -->
@endsection
@extends('thuthuy.layouts.master')

@section('title', 'Tạo mới sản phẩm')

@section('breadcrumb', 'Tạo mới sản phẩm')

@section('content')
<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Tạo mới sản phẩm </h6>
    <div class="form-layout">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row mg-b-25">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Tên thể loại: </label>
                    <input class="form-control name" type="text" name="name" placeholder="Nhập tên thể loại...">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-12 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Số lượng: </label>
                    <input class="form-control quantity" type="number" name="quantity" value="1">
                    @if($errors->has('quantity'))
                        <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Đơn giá: </label>
                    <input class="form-control price" type="number" name="price" value="0">
                    @if($errors->has('price'))
                        <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Giá khuyến mãi: </label>
                    <input class="form-control promotion" type="number" name="promotion" value="0">
                    @if($errors->has('promotion'))
                        <div class="alert alert-danger">{{ $errors->first('promotion') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-4 -->

            <div class="col-lg-8">
                <div class="form-group">
                    <label class="form-control-label">Ảnh minh hoạ: </label>
                    <input class="form-control image" type="file" name="image">
                    @if($errors->has('image'))
                        <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-8 -->

            <div class="col-lg-8">
                <div class="form-group">
                    <label class="form-control-label">Mô tả: </label>
                    <input class="form-control description" type="text" name="description">
                    @if($errors->has('description'))
                        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                    @endif
                </div>
            </div>
            <!-- col-8 -->

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
                <div class="form-group">
                    <label class="form-control-label">Danh mục: </label>
                    <select class="form-control id_cate" name="id_cate">
                        @foreach($category as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Thể loại: </label>
                    <select class="form-control id_protype" name="id_protype">
                        @foreach($productType as $protype)
                            <option value="{{ $protype->id }}">{{ $protype->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Hot: </label>
                    <select class="form-control" name="hot">
                        <option value="0" class="noibat">Sản phẩm thường</option>
                        <option value="1" class="thuong">Sản phẩm nổi bật</option>
                        <option value="2" class="thuong">Sản phẩm bán chạy</option>
                        <option value="3" class="thuong">Sản phẩm mới</option>
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

            <button type="submit" class="pure-button fuller-button blue" name="create" value="more">Tạo và thêm mới</button>

            <a href="{{ route('products.index') }}">
                <button type="button" class="pure-button fuller-button red">Huỷ</button>
            </a>
        </div>
        <!-- form-layout-footer -->
        </form>
    </div><!-- form-layout -->
</div><!-- card -->
@endsection
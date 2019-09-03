@extends('thuthuy.layouts.master')

@section('title', 'Chi tiết sản phẩm')

@section('breadcrumb')
    {{ $product->name }}
@endsection

@section('content')
    <div class="card pd-20 pd-sm-40">
        <div class="header">
            <h4>Thông tin chi tiết :
                <span>{{ $product->name }}</span>
            </h4>
        </div>
        
        <div class="body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label>Name :</label>
                        <input class="form-control name" placeholder="Nhập tên cần sửa..." name="name">
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="form-group">
                        <label>Name :</label>
                        <input class="form-control name" placeholder="Nhập tên cần sửa..." name="name">
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.body -->
        <div class="footer">
            <button class="btn btn-primary">Update</button>
            <a href=" {{ route('products.index') }}"><button class="btn btn-danger">Cancle</button></a>
        </div>
    </div><!-- /card -->
@endsection
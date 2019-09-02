@extends('thuthuy.layouts.master')

@section('title', 'products')

@section('breadcrumb', 'products')

@section('title-content', 'Danh sách sản phẩm')

@section('content')
<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Quản lý sản phẩm</h6>
    <p class="mg-b-20 mg-sm-b-30">Cung cấp thông tin cơ bản của sản phẩm.</p>

    <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sp</th>
            <th>Hình ảnh</th>
            <th>Tình trạng</th>
            <th>Tạo lúc</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>

                <td>{{ $value->name }}</td>

                <td>
                    <img src="img/upload/products/{{ $value->image }}" alt="{{ $value->name }}">
                </td>

                <td>
                    @if($value->status == 1)
                        Hiện
                    @else
                        Ẩn
                    @endif
                </td>

                <td>{{ $value->created_at }}</td>

                <td>
                    <button class="btn btn-primary">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="fa fa-eraser" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div><!-- table-wrapper -->
</div><!-- card -->
@endsection
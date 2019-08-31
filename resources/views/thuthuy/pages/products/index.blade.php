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
            <th>Loại sản phẩm</th>
            <th>Tình trạng</th>
            <th>Xoá</th>
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
                <td>{{ $value->Category->name }}</td>
                <td>
                    @if($value->status == 1)
                        Hiện
                    @else
                        Ẩn
                    @endif
                </td>
                <td>
                    <button class="btn btn-danger">Xoá</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div><!-- table-wrapper -->
</div><!-- card -->
@endsection
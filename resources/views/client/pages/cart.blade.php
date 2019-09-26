@extends('client.layouts.master')

@section('title', 'Giỏ hàng')

@section('content')
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="">Trang chủ</a></li>
                <li class="active">Giỏ hàng </li>
            </ul>
        </div>
    </div>
</div>
    <!-- shopping-cart-area start -->
<div class="cart-main-area pt-50 pb-100">
    <div class="container">
        <h3 class="page-title">Giỏ hàng của bạn có: {{ Cart::count() }} sản phẩm</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Chỉnh sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $key => $value)
                                <tr>
                                    <td class="product-thumbnail">
                                        <img 
                                            src="img/upload/product/{{ $value->options->img }}" 
                                            alt="{{ $value->name }}"
                                            width="130"
                                            height="86"
                                        >
                                    </td>

                                    <td class="product-name"><a href="#">{{ $value->name }}</a></td>

                                    <td class="product-price-cart">
                                        <span class="amount">{{ number_format($value->price) }} VNĐ</span>
                                    </td>

                                    <td class="product-quantity">
                                        <input 
                                            type="number" 
                                            name="qty" 
                                            value="{{ $value->qty }}" 
                                            data-id="{{ $value->rowId }}"
                                            class="qty"
                                            min="1"
                                        >
                                    </td>

                                    <td class="product-remove">
                                        <a 
                                            href="javascript:void(0)" 
                                            data-toggle="modal" 
                                            class="deleteCart"
                                            data-target="#deleteCart"
                                            data-id="{{ $value->rowId }}"
                                        >
                                            <i class="fa fa-eraser" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                
                                <div class="cart-shiping-update">
                                    <a href="">Quay lại trang chủ</a>
                                </div>

                                <div class="cart-clear">
                                    <h4 class="grand-totall-title">Tổng cộng  <span>{{ Cart::total() }} VNĐ</span></h4>
                                    <a href="{{ route('checkout') }}">Tiến hàng thanh toán</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
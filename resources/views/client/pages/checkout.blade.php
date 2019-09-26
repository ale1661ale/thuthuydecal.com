@extends('client.layouts.master')

@section('title', 'Checkout')

@section('content')
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="">Trang chủ</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- checkout-area start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <form action="{{ route('orders.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                        @if ($message = Session::get('customer'))
                        <div class="alert alert-success alert-block custom-flash">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <span>1.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">Thông tin cá nhân</a>
                                    </h5>
                                </div>
                                <div id="payment-1" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="checkout-login">

                                                    <div class="login-form">
                                                        <label>Họ tên *</label>
                                                        <input type="text" name="name" class="name">
                                                        @if($errors->has('name'))
                                                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                                        @endif
                                                    </div>

                                                    <div class="login-form">
                                                        <label>Số điện thoại *</label>
                                                        <input type="text" name="phone" class="phone">
                                                        @if($errors->has('phone'))
                                                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                                        @endif
                                                    </div>

                                                    <div class="login-form">
                                                        <label>Địa chỉ nhận hàng *</label>
                                                        <input type="text" name="address" class="address">
                                                        @if($errors->has('address'))
                                                            <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <span>2.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">Phương thức vận chuyển</a>
                                    </h5>
                                </div>
                                <div id="payment-2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="ship-wrapper">

                                                    <div class="single-ship">
                                                        <input type="radio" name="transport" value="1" checked>
                                                        <label>Giao hàng hoả tốc (trong 24h) - 30.000vnd</label>
                                                    </div>

                                                    <div class="single-ship">
                                                        <input type="radio" name="transport" value="0">
                                                        <label>Giao hàng thường (3-5 ngày) - 10.000vnd</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- /col-8 -->
                <div class="col-lg-4">

                    <div class="checkout-progress">
                        <h4>Thông tin đơn hàng</h4>
                        <div>

                            <p class="pl-30 pt-10" style="font-size:16px">Tổng tiền đơn hàng : 
                                <span class="pl-30" style="color:red">{{ $price }} VNĐ</span>
                            </p>

                        </div>
                    </div>

                    <div class="checkout-progress mt-40">
                        <h4>Ghi chú</h4>
                        <div>

                            <textarea 
                                name="message" 
                                cols="15" rows="5" 
                                placeholder="Bạn cần nhắn gì không ?"
                                class="message"
                            ></textarea>
                            
                        </div>
                    </div>

                    <button 
                        type="submit"
                        class="btn btn-primary mt-20"
                        style="font-size:16px;width:150px;height:39px;text-align:center;margin-left: 30%;"
                    >
                        Mua hàng
                    </button>

                </div><!-- /col-4 -->
            </div><!-- /row -->
        </form>
    </div>
</div>
@endsection
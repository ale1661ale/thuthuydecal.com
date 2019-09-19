@extends('client.layouts.master')

@section('title', 'Liên hệ')

@section('content')
    <div class="breadcrumb-area gray-bg">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="">Trang chủ</a></li>
                    <li class="active"> Liên hệ chúng tôi </li>
                </ul>
            </div>
        </div>
    </div>
<?php  
    $rs1 = DB::table('ales')->where('key_name', 'thongtinlienlac1')->get();
    $rs2 = DB::table('ales')->where('key_name', 'thongtinlienlac2')->get();
    $rs3 = DB::table('ales')->where('key_name', 'thongtinlienlac3')->get();
?>
    <div class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-wrapper text-center mb-30">
                        <div class="contact-info-icon">
                            <i class="ion-ios-location-outline"></i>
                        </div>
                        @foreach($rs1 as $value)
                        <div class="contact-info-content">
                            <h4>{{ $value->description }}</h4>
                            {!! $value->content !!}
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-wrapper text-center mb-30">
                        <div class="contact-info-icon">
                            <i class="ion-ios-telephone-outline"></i>
                        </div>
                        @foreach($rs2 as $value)
                        <div class="contact-info-content">
                            <h4>{{ $value->description }}</h4>
                            {!! $value->content !!}
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-wrapper text-center mb-30">
                        <div class="contact-info-icon">
                            <i class="ion-ios-email-outline"></i>
                        </div>
                        @foreach($rs3 as $value)
                        <div class="contact-info-content">
                            <h4>{{ $value->description }}</h4>
                            {!! $value->content !!}
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="contact-message-wrapper">
                        <h4 class="contact-title">Bạn muốn góp ý gì không ?</h4>
                        <div class="contact-message">
                            <form action="{{ route('contact.store') }}" method="POST">

                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="name" placeholder="Nhập họ tên" type="text">
                                            @if($errors->has('name'))
                                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="email" placeholder="Nhập địa chỉ email" type="email">
                                            @if($errors->has('email'))
                                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input 
                                                name="phone" 
                                                placeholder="Số điện thoại" 
                                                type="text"
                                                minlength="8" 
                                                maxlength="12"
                                            >
                                            @if($errors->has('phone'))
                                                <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="subject" placeholder="Tiêu đề" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="contact-form-style">

                                            <textarea name="message" placeholder="Nội dung"></textarea>
                                            @if($errors->has('message'))
                                                <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                                            @endif

                                            <button type="submit" class="submit btn-style">Gửi góp ý</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.7571960592354!2d106.65316581436011!3d10.753186892337295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ef485b9fe03%3A0x4a727ae6eae0a0b0!2zNjggRMawxqFuZyBU4butIEdpYW5nLCBQaMaw4budbmcgMTQsIFF14bqtbiA1LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1565955848560!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection















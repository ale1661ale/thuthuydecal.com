@extends('client.layouts.master')

@section('title')
    {{ $content[0]->title }}
@endsection

@section('content')
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="">Trang chủ</a></li>
                <li class="active">{{ $content[0]->slug }}</li>
            </ul>
        </div>
    </div>
</div>

<!-- blog-area start -->
<div class="blog-area ptb-100">
    <div class="container">
        <div class="row">
            @foreach($content as $key => $value)
            <div class="col-lg-9 col-md-8">
                <div class="blog-details-wrapper">
                    <div class="blog-img mb-20">
                        <img alt="" src="img/upload/content/{{ $value->image }}">
                        <span class="pull-right">{{ $value->created_at }}</span>
                    </div>
                    <div class="blog-content">
                        <h2>{{ $value->title }}</h2>
                        
                        <div class="text-content-img">
                            {!! $value->content !!}
                        </div>
                    </div>

                    <div class="social-network text-center">
                        <ul>
                            <li><a class="facebook" href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a class="instagram" href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            <li><a class="rss" href="#"><i class="ion-social-rss"></i></a></li>
                            <li><a class="dribbble" href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                        </ul>
                    </div>


                    <div class="blog-reply-wrapper mt-50">
                        <h4 class="blog-dec-title">Let me know your ideas</h4>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="leave-form">
                                        <input name="name" placeholder="Nhập họ tên" type="text">
                                        @if($errors->has('name'))
                                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="leave-form">
                                        <input name="email" placeholder="Nhập địa chỉ email" type="email">
                                        @if($errors->has('email'))
                                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="leave-form">
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

                                <div class="col-md-12">
                                    <div class="text-leave">
                                        <textarea name="message" placeholder="Nội dung"></textarea>
                                        @if($errors->has('message'))
                                            <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                                        @endif
                                        <input type="submit" value="Gửi ngay">
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            @endforeach

            <div class="col-lg-3 col-md-4">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    
                    <div class="shop-widget shop-sidebar-border pt-25">
                        <h4 class="shop-sidebar-title">Danh mục </h4>
                        <div class="sidebar-list-style mt-20">
                            @foreach($category as $value)
                            <ul>
                                <li>
                                    <a href="#">{{ $value->name }}
                                        <span>({{ count($value->productType) }})</span>
                                    </a>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>

                    <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                        <h4 class="shop-sidebar-title">By Brand</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <li><input type="checkbox"><a href="#">Poure </a></li>
                                <li><input type="checkbox"><a href="#">Eveman </a></li>
                                <li><input type="checkbox"><a href="#">Iccaso </a></li>
                                <li><input type="checkbox"><a href="#">Annopil </a></li>
                                <li><input type="checkbox"><a href="#">Origina </a></li>
                                <li><input type="checkbox"><a href="#">Perini  </a></li>
                                <li><input type="checkbox"><a href="#">Dolloz </a></li>
                                <li><input type="checkbox"><a href="#">Spectry </a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                        <h4 class="shop-sidebar-title">Popular Tags</h4>
                        <div class="shop-tags mt-25">
                            <ul>
                                <li><a href="#">Bouquet</a></li>
                                <li><a href="#">Event</a></li>
                                <li><a href="#">Gift</a></li>
                                <li><a href="#">Joy</a></li>
                                <li><a href="#">Love </a></li>
                                <li><a href="#">Special</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-area end -->
@endsection
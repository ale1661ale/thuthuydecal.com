@extends('client.layouts.master')

@section('title', 'Trang chủ')

@section('slide')
    @include('client.layouts.slide')
@endsection

@section('banner-top')
    @include('client.layouts.banner-top')
@endsection

@section('content')
<div class="product-area pb-70">
    <div class="custom-container">
        <div class="product-tab-list-wrap text-center mb-40">
            <div class="product-tab-list nav">
                <a class="active" href="#tab1" data-toggle="tab">
                    <h4>Tất cả loại tem </h4>
                </a>
                <a href="#tab2" data-toggle="tab">
                    <h4>Tem nổi bật </h4>
                </a>
                <a href="#tab3" data-toggle="tab">
                    <h4>Tem mới nhất </h4>
                </a>
            </div>
            <p>Typi non habent claritatem insitam est usus legentis in qui facit eorum claritatem, investigationes demonstraverunt lectores legere me lius quod legunt saepius.</p>
        </div>
        <div class="tab-content jump">
            <div id="tab1" class="tab-pane active">
                <div class="row">

                    @foreach($product as $value)
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="javascript:void(0)">
                                    <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                        <a href="avascript:void(0)">{{ $value->name }}</a>
                                    </h4>
                                <div class="product-price-wrapper">
                                    <span>{{ number_format($value->promotion) }} VNĐ</span>
                                    <span class="product-price-old">{{ number_format($value->price) }} VNĐ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <div class="pull-right">{{ $product->links() }}</div>
            </div>
            

            <div id="tab2" class="tab-pane">
                <div class="row">

                    @foreach($spnb as $value)
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="javascript:void(0)">
                                    <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                        <a href="avascript:void(0)">{{ $value->name }}</a>
                                    </h4>
                                <div class="product-price-wrapper">
                                    <span>{{ number_format($value->promotion) }} VNĐ</span>
                                    <span class="product-price-old">{{ number_format($value->price) }} VNĐ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="pull-right">{{ $spnb->links() }}</div>
            </div>

            <div id="tab3" class="tab-pane">
                <div class="row">

                    @foreach($spmn as $value)
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a href="javascript:void(0)">
                                    <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                </a>
                                <div class="product-action">
                                    <div class="pro-action-left">
                                        <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                    </div>
                                    <div class="pro-action-right">
                                        <a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>
                                        <a href="avascript:void(0)">{{ $value->name }}</a>
                                    </h4>
                                <div class="product-price-wrapper">
                                    <span>{{ number_format($value->promotion) }} VNĐ</span>
                                    <span class="product-price-old">{{ number_format($value->price) }} VNĐ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="pull-right">{{ $spmn->links() }}</div>
            </div>
        </div>
    </div>
</div>

@include('client.layouts.banner-bottom')

<div class="best-food-area pt-100 pb-95">
    <div class="custom-container">
        <div class="row">
            <div class="best-food-width-1">
                <div class="single-banner">
                    <div class="hover-style">
                    <?php $rs2 = DB::table('banners')->where('slug', 'banner-bottom-1')->get(); ?>
                        @foreach($rs2 as $value)
                            <a href="#">
                                <img src="img/upload/ale/{{ $value->image }}" alt="{{ $value->name }}">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="best-food-width-2">
                <div class="product-top-bar section-border mb-25">
                    <div class="section-title-wrap">
                        <h3 class="section-title section-bg-white">Tem được ưa chuộng nhất</h3>
                    </div>
                    <div class="product-tab-list-2 nav section-bg-white">
                        <a class="active" href="#tab4" data-toggle="tab">
                            <h4>Tất cả</h4>
                        </a>
                        <a href="#tab5" data-toggle="tab">
                            <h4>Tem xe máy</h4>
                        </a>
                        <a href="#tab6" data-toggle="tab">
                            <h4>Tem oto</h4>
                        </a>
                    </div>
                </div>
                <div class="tab-content jump">
                    <div id="tab4" class="tab-pane active">
                        <div class="product-slider-active owl-carousel product-nav">

                            @foreach($spbc as $value)
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="javascript:void(0)">
                                        <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                            <a href="javascript:void(0)">{{ $value->name }}</a>
                                        </h4>
                                    <div class="product-price-wrapper">
                                        <span>{{ number_format($value->promotion )}}</span>
                                        <span class="product-price-old">{{ number_format($value->price )}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <div id="tab5" class="tab-pane">
                        <div class="product-slider-active owl-carousel product-nav">

                            @foreach($xeMay as $value)
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="javascript:void(0)">
                                        <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                            <a href="javascript:void(0)">{{ $value->name }}</a>
                                        </h4>
                                    <div class="product-price-wrapper">
                                        <span>{{ number_format($value->promotion )}}</span>
                                        <span class="product-price-old">{{ number_format($value->price )}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <div id="tab6" class="tab-pane">
                        <div class="product-slider-active owl-carousel product-nav">

                            @foreach($xeOto as $value)
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="javascript:void(0)">
                                        <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                            <a href="javascript:void(0)">{{ $value->name }}</a>
                                        </h4>
                                    <div class="product-price-wrapper">
                                        <span>{{ number_format($value->promotion )}}</span>
                                        <span class="product-price-old">{{ number_format($value->price )}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="best-food-width-1 mrg-small-35">
                <div class="single-banner">
                    <div class="hover-style">
                        <?php $rs2 = DB::table('banners')->where('slug', 'banner-bottom-2')->get(); ?>
                        @foreach($rs2 as $value)
                            <a href="javascript:void(0)">
                                <img src="img/upload/ale/{{ $value->image }}" alt="{{ $value->name }}">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="brand-logo-area pb-100">
    <div class="container">
        <div class="brand-logo-active owl-carousel">
            <?php $rs1 = DB::table('logos')->where('id_image_type', 0)->where('status', 1)->get(); ?>
            @foreach($rs1 as $value)
            <div class="single-brand-logo">
                <img alt="{{ $value->name }}" src="img/upload/ale/{{ $value->image }}">
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
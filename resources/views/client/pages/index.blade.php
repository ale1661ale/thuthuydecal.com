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
                                <a 
                                    href="javascript:void(0)" 
                                    class="exampleModal" 
                                    data-toggle="modal" 
                                    data-target="#exampleModal" 
                                    data-id="{{ $value->id }}"
                                >
                                    <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                </a>
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
                <div class="pull-right">{!! $product->links() !!}</div>
            </div>
            

            <div id="tab2" class="tab-pane">
                <div class="row">

                    @foreach($spnb as $value)
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a 
                                    href="javascript:void(0)" 
                                    class="exampleModal" 
                                    data-toggle="modal" 
                                    data-target="#exampleModal" 
                                    data-id="{{ $value->id }}"
                                >
                                    <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                </a>
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
                <div class="pull-right">{!! $spnb->links() !!}</div>
            </div>

            <div id="tab3" class="tab-pane">
                <div class="row">

                    @foreach($spmn as $value)
                    <div class="custom-col-5">
                        <div class="product-wrapper mb-25">
                            <div class="product-img">
                                <a 
                                    href="javascript:void(0)" 
                                    class="exampleModal" 
                                    data-toggle="modal" 
                                    data-target="#exampleModal" 
                                    data-id="{{ $value->id }}"
                                >
                                    <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                </a>
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
                <div class="pull-right">{!! $spmn->links() !!}</div>
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
                    <?php $rs2 = DB::table('banners')->where('key_name', 'bannerbottom1')->get(); ?>
                        @foreach($rs2 as $value)
                            <a href="blogs/{{ $value->slug }}">
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
                                    <a 
                                        href="javascript:void(0)" 
                                        class="exampleModal" 
                                        data-toggle="modal" 
                                        data-target="#exampleModal" 
                                        data-id="{{ $value->id }}"
                                    >
                                        <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                    </a>
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
                                    <a 
                                        href="javascript:void(0)" 
                                        class="exampleModal" 
                                        data-toggle="modal" 
                                        data-target="#exampleModal" 
                                        data-id="{{ $value->id }}"
                                    >
                                        <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                    </a>
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
                                    <a 
                                        href="javascript:void(0)" 
                                        class="exampleModal" 
                                        data-toggle="modal" 
                                        data-target="#exampleModal" 
                                        data-id="{{ $value->id }}"
                                    >
                                        <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}">
                                    </a>
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
                        <?php $rs2 = DB::table('banners')->where('key_name', 'bannerbottom2')->get(); ?>
                        @foreach($rs2 as $value)
                            <a href="blogs/{{ $value->slug }}">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <!-- Thumbnail Large Image start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <img class="productImage" alt="ale">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="modal-pro-content">

                            <h3 class="productName"></h3>
                            
                            <div class="product-price-wrapper">
                                <span class="productPromotion"></span>
                                <span class="product-price-old productPrice"></span>
                            </div>

                            <p class="quick-view-select productDescription"></p>
                            
                            <input type="text" class="sold_out">

                            <a class="btn btn-primary mt-10 addToCart" style="height: 38px;background-color: #4a4646;">
                                Thêm giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

@endsection
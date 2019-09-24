@extends('client.layouts.master')

@section('title', 'Collections')

@section('content')
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="">Trang chủ</a></li>
                <li class="active">{{ $cate[0]->name }}</li>
            </ul>
        </div>
    </div>
</div>

<div class="shop-page-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">

                            @foreach($product as $key => $value)
                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
                                                    <span>{{ number_format($value->promotion) }} VNĐ</span>
                                                    <span class="product-price-old">{{ number_format($value->price) }} VNĐ</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="ale">{{ $product->links() }}</div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    
                    <div class="shop-price-filter mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Price Filter</h4>
                        <div class="price_filter mt-25">
                            <span>Range:  $100.00 - 1.300.00 </span>
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button> 
                            </div>
                        </div>
                    </div>

                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
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
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">By Color</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <li><input type="checkbox"><a href="#">Black </a></li>
                                <li><input type="checkbox"><a href="#">Blue </a></li>
                                <li><input type="checkbox"><a href="#">Green </a></li>
                                <li><input type="checkbox"><a href="#">Grey </a></li>
                                <li><input type="checkbox"><a href="#">Red</a></li>
                                <li><input type="checkbox"><a href="#">White  </a></li>
                                <li><input type="checkbox"><a href="#">Yellow   </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Compare Products</h4>
                        <div class="compare-product">
                            <p>You have no item to compare. </p>
                            <div class="compare-product-btn">
                                <span>Clear all </span>
                                <a href="#">Compare <i class="fa fa-check"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Popular Tags</h4>
                        <div class="shop-tags mt-25">
                            <ul>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Cheesy</a></li>
                                <li><a href="#">Fast Food</a></li>
                                <li><a href="#">French Fries</a></li>
                                <li><a href="#">Hamburger </a></li>
                                <li><a href="#">Pizza</a></li>
                                <li><a href="#">Red Meat</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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
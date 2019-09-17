<!doctype html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="robots" content="noindex, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Begin SEO -->

    <!-- Primary Meta Tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}" >
    <title>ThuthuyDecal ~ @yield('title')</title>
    <meta name="title" content="Template Thức Uống Và Đồ Ăn Nhanh | KhoTemplateVN">
    <meta name="description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://khotemplate.vn/preview/template-thuc-uong-va-do-an-nhanh-dr03/index.html">
    <meta property="og:title" content="Template Thức Uống Và Đồ Ăn Nhanh | KhoTemplateVN">
    <meta property="og:description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive.">
    <meta property="og:image" content="assets/client/img/slider/slider-2.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://khotemplate.vn/preview/template-thuc-uong-va-do-an-nhanh-dr03/index.html">
    <meta property="twitter:title" content="Template Thức Uống Và Đồ Ăn Nhanh | KhoTemplateVN">
    <meta property="twitter:description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive.">
    <meta property="twitter:image" content="assets/client/img/slider/slider-2.jpg">

    <!-- End SEO -->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/client/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="assets/client/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/client/css/animate.css">
    <link rel="stylesheet" href="assets/client/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/client/css/slick.css">
    <link rel="stylesheet" href="assets/client/css/chosen.min.css">
    <link rel="stylesheet" href="assets/client/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/client/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/client/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/client/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/client/css/style.css">
    <link rel="stylesheet" href="assets/client/css/responsive.css">
    <script src="assets/client/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- header start -->
    <header class="header-area">

        @include('client.layouts.header-top')

        @include('client.layouts.header')
        
        @include('client.layouts.menu')
        
    </header>
    
    @yield('slide')

    @yield('banner-top')

    @yield('content')
    
    @include('client.layouts.footer')

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
                                <div id="pro-1" class="tab-pane fade show active">
                                    <img src="assets/client/img/product-details/product-detalis-l1.jpg" alt="">
                                </div>
                                <div id="pro-2" class="tab-pane fade">
                                    <img src="assets/client/img/product-details/product-detalis-l2.jpg" alt="">
                                </div>
                                <div id="pro-3" class="tab-pane fade">
                                    <img src="assets/client/img/product-details/product-detalis-l3.jpg" alt="">
                                </div>
                                <div id="pro-4" class="tab-pane fade">
                                    <img src="assets/client/img/product-details/product-detalis-l4.jpg" alt="">
                                </div>
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="product-thumbnail">
                                <div class="thumb-menu owl-carousel nav nav-style" role="tablist">
                                    <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/client/img/product-details/product-detalis-s1.jpg" alt="">
                                    </a>
                                    <a data-toggle="tab" href="#pro-2"><img src="assets/client/img/product-details/product-detalis-s2.jpg" alt="">
                                    </a>
                                    <a data-toggle="tab" href="#pro-3"><img src="assets/client/img/product-details/product-detalis-s3.jpg" alt="">
                                    </a>
                                    <a data-toggle="tab" href="#pro-4"><img src="assets/client/img/product-details/product-detalis-s4.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Thumbnail image end -->
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="modal-pro-content">
                                <h3>PRODUCTS NAME HERE </h3>
                                <div class="product-price-wrapper">
                                    <span>$120.00</span>
                                    <span class="product-price-old">$162.00 </span>
                                </div>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>
                                <div class="quick-view-select">
                                    <div class="select-option-part">
                                        <label>Size*</label>
                                        <select class="select">
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value="">L</option>
                                        </select>
                                    </div>
                                    <div class="quickview-color-wrap">
                                        <label>Color*</label>
                                        <div class="quickview-color">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="red">r</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                    </div>
                                    <button>Add to cart</button>
                                </div>
                                <span><i class="fa fa-check"></i> In stock</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->





    <!-- all js here -->
    <script src="assets/client/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="assets/client/js/popper.js"></script>
    <script src="assets/client/js/bootstrap.min.js"></script>
    <script src="assets/client/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/client/js/isotope.pkgd.min.js"></script>
    <script src="assets/client/js/ajax-mail.js"></script>
    <script src="assets/client/js/owl.carousel.min.js"></script>
    <script src="assets/client/js/plugins.js"></script>
    <script src="assets/client/js/main.js"></script>
    
    <script>
      $('.pagination a').unbind('click').on('click', function(e) {
             e.preventDefault();
             var page = $(this).attr('href').split('page=')[1];
             getPosts(page);
       });
      
       function getPosts(page)
       {
            $.ajax({
                 type: "GET",
                 url: '?page='+ page
            })
            .success(function(data) {
                 $('body').html(data);
            });
       }
    </script>
</body>

</html>
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

    @include('flash_message')

    @yield('content')
    
    @include('client.layouts.footer')

    
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
    <script src="assets/client/js/ajax.js"></script>
    <script>
    $('.pull-right .pagination a').unbind('click').on('click', function(e) {
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
    
    <script>
      setTimeout(function(){
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
          $(".alert").slideUp(500);
        });
        }); // 5 secs
    </script>
    <script type="text/javascript">
        var x = document.getElementById("count-ti");
        if($(".count-title")){
            $(".count-title").find("h2").addClass('count');
        }
        $('.count').counterUp({
            delay: 10,
            time: 1000
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="vi">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Katniss">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/katniss/img/katniss-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/katniss">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/katniss/img/katniss-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/katniss/img/katniss-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}">
    <title>Admin ~ @yield('title')</title>

    <!-- vendor css -->
    <link href="assets/thuthuy/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/thuthuy/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="assets/thuthuy/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/thuthuy/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Katniss CSS -->
    <link rel="stylesheet" href="assets/thuthuy/css/katniss.css">
    <link rel="stylesheet" href="assets/thuthuy/css/toastr.css">
  </head>

  <body>

    @include('thuthuy.layouts.header')

    @include('thuthuy.layouts.menu')

    @include('thuthuy.layouts.header_panel')

    @include('thuthuy.layouts.breadcrumb')

    <!-- ##### MAIN PANEL ##### -->
    <div class="kt-mainpanel">
      @include('flash_message')
      
      @yield('content')

      @include('thuthuy.layouts.footer')
    
    </div><!-- kt-mainpanel -->

    <script src="assets/thuthuy/lib/jquery/jquery.js"></script>
    <script src="assets/thuthuy/lib/popper.js/popper.js"></script>
    <script src="assets/thuthuy/lib/bootstrap/bootstrap.js"></script>
    <script src="assets/thuthuy/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="assets/thuthuy/lib/moment/moment.js"></script>
    <script src="assets/thuthuy/lib/d3/d3.js"></script>
    <script src="assets/thuthuy/lib/gmaps/gmaps.js"></script>
    <script src="assets/thuthuy/lib/chart.js/Chart.js"></script>
    <script src="assets/thuthuy/js/katniss.js"></script>
    <script src="assets/thuthuy/js/ResizeSensor.js"></script>
    <script src="assets/thuthuy/js/dashboard.js"></script>
    <script src="assets/thuthuy/js/ajax.js"></script>
    <script src="ckeditor/ckeditor.js"></script>

    <script>
        if($("textarea").length > 0){
            CKEDITOR.replace( 'demon' );
        }
    </script>
    
    <script>
      setTimeout(function(){
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
          $(".alert").slideUp(500);
        });
        }); // 5 secs
    </script>
  </body>
</html>

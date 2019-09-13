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


    <title>Admin - Thuthuy</title>

    <!-- vendor css -->
    <link href="assets/thuthuy/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/thuthuy/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="assets/thuthuy/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Katniss CSS -->
    <link rel="stylesheet" href="assets/thuthuy/css/katniss.css">
    <link rel="stylesheet" href="assets/thuthuy/css/toastr.css">
  </head>

  <body>
  
     <div class="signpanel-wrapper">
        <div class="signbox">
            <div class="signbox-header">
                <h4>Thuthuy</h4>
                <p class="mg-b-0">Have a nice day ^.^</p>
            </div>
            <!-- signbox-header -->
            
            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="signbox-body">
                    <div class="form-group">
                        <label class="form-control-label">Email:</label>
                        <input type="email" name="email" placeholder="Nhập email..." class="form-control">
                    </div>
                    <!-- form-group -->

                    <div class="form-group">
                        <label class="form-control-label">Password:</label>
                        <input type="password" name="password" placeholder="Nhập mật khẩu..." class="form-control">
                    </div>
                    <!-- form-group -->

                    <div class="form-group">
                        <a href="">Quên mật khẩu ?</a>
                    </div>
                    <!-- form-group -->

                    <button type="submit" class="btn btn-dark btn-block">Đăng nhập</button>
            
                </div>
                <!-- signbox-body -->
            </form>
        </div>
        <!-- signbox -->
    </div>
    <!-- signpanel-wrapper -->

    <script src="assets/thuthuy/lib/jquery/jquery.js"></script>
    <script src="assets/thuthuy/lib/popper.js/popper.js"></script>
    <script src="assets/thuthuy/js/toastr.min.js"></script>
    @if(Session::has('success'))
        <script>
            $(function(){
                toastr.options.timeOut = 3000;
                toastr.success("{{ Session::get('success') }}")
            });
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            $(function(){
                toastr.options.timeOut = 3000;
                toastr.error("{{ Session::get('error') }}")
            });
        </script>
    @endif
  </body>
</html>

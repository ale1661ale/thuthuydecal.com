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


    <title>Admin - @yield('title')</title>

    <!-- vendor css -->
    <link href="assets/thuthuy/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/thuthuy/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="assets/thuthuy/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/thuthuy/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Katniss CSS -->
    <link rel="stylesheet" href="assets/thuthuy/css/katniss.css">
  </head>

  <body>

    <!-- ##### SIDEBAR LOGO ##### -->
    <div class="kt-sideleft-header">
      <div class="kt-logo"><a href="/thuthuy">katniss</a></div>
      <div id="ktDate" class="kt-date-today"></div>
      <div class="input-group kt-input-search">
        <input type="text" class="form-control" placeholder="Search...">
        <span class="input-group-btn mg-0">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span>
      </div><!-- input-group -->
    </div><!-- kt-sideleft-header -->

    <!-- ##### SIDEBAR MENU ##### -->
    <div class="kt-sideleft">
      <label class="kt-sidebar-label">Navigation</label>
      <ul class="nav kt-sideleft-menu">
        <li class="nav-item">
          <a href="index.html" class="nav-link active">
            <i class="icon ion-ios-home-outline"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-gear-outline"></i>
            <span>Forms</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
            <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
            <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
            <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
            <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-filing-outline"></i>
            <span>UI Elements</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="accordion.html" class="nav-link">Accordion</a></li>
            <li class="nav-item"><a href="alerts.html" class="nav-link">Alerts</a></li>
            <li class="nav-item"><a href="buttons.html" class="nav-link">Buttons</a></li>
            <li class="nav-item"><a href="cards.html" class="nav-link">Cards</a></li>
            <li class="nav-item"><a href="icons.html" class="nav-link">Icons</a></li>
            <li class="nav-item"><a href="modal.html" class="nav-link">Modal</a></li>
            <li class="nav-item"><a href="navigation.html" class="nav-link">Navigation</a></li>
            <li class="nav-item"><a href="pagination.html" class="nav-link">Pagination</a></li>
            <li class="nav-item"><a href="popups.html" class="nav-link">Tooltip &amp; Popover</a></li>
            <li class="nav-item"><a href="progress.html" class="nav-link">Progress</a></li>
            <li class="nav-item"><a href="spinners.html" class="nav-link">Spinners</a></li>
            <li class="nav-item"><a href="typography.html" class="nav-link">Typography</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-analytics-outline"></i>
            <span>Charts</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="chart-morris.html" class="nav-link">Morris Charts</a></li>
            <li class="nav-item"><a href="chart-flot.html" class="nav-link">Flot Charts</a></li>
            <li class="nav-item"><a href="chart-chartjs.html" class="nav-link">Chart JS</a></li>
            <li class="nav-item"><a href="chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
            <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-navigate-outline"></i>
            <span>Maps</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
            <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-list-outline"></i>
            <span>Tables</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
            <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-bookmarks-outline"></i>
            <span>Pages</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
            <li class="nav-item"><a href="mailbox.html" class="nav-link">Mailbox</a></li>
            <li class="nav-item"><a href="chat.html" class="nav-link">Chat Page</a></li>
            <li class="nav-item"><a href="calendar.html" class="nav-link">Calendar</a></li>
            <li class="nav-item"><a href="edit-profile.html" class="nav-link">Edit Profile</a></li>
            <li class="nav-item"><a href="file-manager.html" class="nav-link">File Manager</a></li>
            <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
            <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
            <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="widgets.html" class="nav-link">
            <i class="icon ion-ios-briefcase-outline"></i>
            <span>Widgets</span>
          </a>
        </li><!-- nav-item -->
      </ul>
    </div><!-- kt-sideleft -->

    @include('thuthuy.layouts.header_panel')

    @include('thuthuy.layouts.breadcrumb')

    <!-- ##### MAIN PANEL ##### -->
    <div class="kt-mainpanel">
      <div class="kt-pagetitle">
        <h5>Dashboard</h5>
      </div><!-- kt-pagetitle -->

      @yield('content')
      
      @include('thuthuy.layouts.footer')
    </div><!-- kt-mainpanel -->

    <script src="assets/thuthuy/lib/jquery/jquery.js"></script>
    <script src="assets/thuthuy/lib/popper.js/popper.js"></script>
    <script src="assets/thuthuy/lib/bootstrap/bootstrap.js"></script>
    <script src="assets/thuthuy/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="assets/thuthuy/lib/moment/moment.js"></script>
    <script src="assets/thuthuy/lib/d3/d3.js"></script>
    <script src="assets/thuthuy/lib/rickshaw/rickshaw.min.js"></script>
    <script src="assets/thuthuy/lib/gmaps/gmaps.js"></script>
    <script src="assets/thuthuy/lib/chart.js/Chart.js"></script>
    <script src="assets/thuthuy/js/katniss.js"></script>
    <script src="assets/thuthuy/js/ResizeSensor.js"></script>
    <script src="assets/thuthuy/js/dashboard.js"></script>

  </body>
</html>

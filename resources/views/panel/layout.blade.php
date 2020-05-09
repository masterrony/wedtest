<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>@yield('title') | test IO</title>

        <meta name="description" content="test IO panel">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="/assets/panel/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/assets/panel/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/panel/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        @section('style')
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
          <link rel="stylesheet" id="css-main" href="/assets/panel/css/dashmix.min.css">
        @show
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container" class="@if(!isset($customer_folder)) sidebar-o @endif enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
            
            <!-- Sidebar -->
                @yield('side-bar')
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                @yield('page-header')
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Hero -->
                <div class="bg-image" style="background-image: url('/assets/panel/media/various/bg_dashboard.jpg');">
                    <div class="bg-white-90">
                        <div class="content content-full">
                            <div class="row">
                                <div class="col-md-6 d-md-flex align-items-md-center">
                                    <div class="py-4 py-md-0 text-center text-md-left invisible" data-toggle="appear">
                                        <h1 class="font-size-h2 mb-2">Dashboard</h1>
                                        @yield('action')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                            <a class="font-w600" href="https://1.envato.market/r6y" target="_blank">Dashmix 2.2</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>

        <!-- define script section -->
        @section('script')
          <!-- incldue core javascript libraries -->
          <script src="/assets/panel/js/core/jquery.min.js"></script>
          <script src="/assets/panel/js/core/bootstrap.bundle.min.js"></script>
          <script src="/assets/panel/js/core/simplebar.min.js"></script>
          <script src="/assets/panel/js/core/jquery-scrollLock.min.js"></script>
          <script src="/assets/panel/js/core/jquery.appear.min.js"></script>
          <script src="/assets/panel/js/core/js.cookie.min.js"></script>
          <!-- end core libraries -->

          <script src="/assets/panel/js/dashmix.core.min.js"></script>
          <script src="/assets/panel/js/dashmix.app.min.js"></script>

          <!-- Page JS Plugins -->
          <script src="/assets/panel/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
          <script src="/assets/panel/js/plugins/chart.js/Chart.bundle.min.js"></script>

          <!-- Page JS Code -->
          <script src="/assets/panel/js/pages/be_pages_dashboard.min.js"></script>

          <!-- Page JS Helpers (jQuery Sparkline plugin) -->
          <script>jQuery(function(){ Dashmix.helpers('sparkline'); });</script>
              
          <!-- Page JS Plugins -->
          <script src="/assets/panel/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  
          <!-- Page JS Helpers (Magnific Popup Plugin) -->
          <script>jQuery(function(){ Dashmix.helpers('magnific-popup'); });</script>

          <!-- Developer specific script -->
          <script>
            // set current path
            var currentPath = @if(isset($admin_folder)) '{{$admin_folder}}'
                              @elseif(isset($customerFolder)) '{{$customerFolder}}' @endif

            $.getScript('/assets/manual/js/file_manage.js')
          </script>
        @show
    </body>
</html>

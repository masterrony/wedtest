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
                                        <div class="mt-5 smini-hide">
                                            @if(isset($admin_folder) || isset($customer_folder))
                                                <div class="btn-group" role="group">
                                                    @if(!!$permissions['create_folder'])
                                                        <button class="btn btn-hero-success" id="btn_new_folder">
                                                            <i class="fa fa-plus mr-1"></i> New Folder
                                                        </button>
                                                    @endif
                                                    @if(isset($admin_folder))
                                                        <button class="btn btn-hero-primary" id="btn_new_file">
                                                            <span><i class="fa fa-plus mr-1"></i> New File</span>
                                                            <input type="file" id="inpt_new_file">
                                                        </button>
                                                        <button class="btn btn-primary" id="btn_upload_file" disabled>
                                                            <i class="fa fa-file-upload mr-1"></i>
                                                        </button>
                                                    @endif
                                                    <button class="btn btn-hero-info" id="btn_move_up">
                                                        <i class="fa fa-arrow-up mr-1"></i> Up One Folder
                                                    </button>
                                                </div>
                                            @else
                                                <p>Set permission for each role. </p>
                                            @endif   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="row no-gutters flex-md-10-auto mb-4">
                    @if(!!isset($customer_folder))
                        <div class="content">
                            @yield('content')
                        </div>
                    @else
                        @yield('user-info')
                        <div class="col-md-10 col-lg-9 col-xl-10 order-md-0 bg-body-dark">
                            <div class="content">
                                @yield('content')
                            </div>
                        </div>
                    @endif
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="#" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                            <a class="font-w600" href="#" target="_blank">Dashmix 2.2</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>

         <!-- Set toast template -->
        <div style="position: fixed; top: 5rem; right: 3rem; z-index: 9999999;">
            <!-- Toast Example 1 -->
            <div id="div_toast" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                <div id="div_toast_header" class="toast-header">
                    <i class="far fa-thumbs-up mr-2"></i>
                    <strong class="mr-auto"></strong>
                    <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="div_toast_body" class="toast-body">
                </div>
            </div>
            <!-- END Toast Example 1 -->
        </div>
        <!-- End toast template -->

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
            var rootPath = ''
            @if(isset($admin_folder)) rootPath =  '{{$admin_folder}}'
            @elseif(isset($customer_folder)) rootPath = '{{$customer_folder}}' @endif

            var showToast = function(result, message) {
                if(!!result) {
                    $('div#div_toast div#div_toast_header').removeClass('text-warning')
                    $('div#div_toast div#div_toast_header').addClass('text-success')
                    $('div#div_toast div#div_toast_header strong').text('Success')
                } else {
                    $('div#div_toast div#div_toast_header').removeClass('text-success')
                    $('div#div_toast div#div_toast_header').addClass('text-warning')
                    $('div#div_toast div#div_toast_header strong').text('Failed')
                }

                $('div#div_toast div#div_toast_body').text(message)

                $('div#div_toast').toast('show')
            }

            $.getScript('/js/file_manage.js')
          </script>
        @show
    </body>
</html>

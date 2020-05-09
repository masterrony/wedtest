<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Login | test IO</title>

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="/assets/panel/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/assets/panel/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/panel/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="/assets/panel/css/dashmix.min.css">

    </head>
    <body>
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('assets/media/photos/photo9@2x.jpg');">
                    <div class="row no-gutters justify-content-center bg-black-75">
                        <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                            <!-- Lock Block -->
                            <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                                <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                                    <!-- Header -->
                                    <div class="mb-2 text-center">
                                        <a class="link-fx text-danger font-w700 font-size-h1" href="{{route('home')}}">
                                            <span class="text-dark">test</span><span class="text-danger">IO</span>
                                        </a>
                                        <p class="text-uppercase font-w700 font-size-sm text-muted">Login your Account</p>
                                    </div>
                                    <div class="text-center push">
                                        <div class="d-inline-block p-4 rounded bg-body">
                                            <img class="img-avatar img-avatar-thumb" src="/assets/panel/media/avatars/avatar15.jpg" alt="">
                                            <a class="d-block font-w600 mt-2" href="javascript:void(0)">Please Enter</a>
                                            <div class="font-size-sm font-w600 text-black-50">Your ID</div>
                                        </div>
                                    </div>
                                    <!-- END Header -->

                                    <!-- Lock Form -->
                                    <form class="js-validation-lock" action="{{route('login')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="user_id" placeholder="Your ID..">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-asterisk"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        @elseif (isset($message))
                                            <div class="alert alert-danger">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @endif


                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-hero-danger">
                                                <i class="fa fa-fw fa-lock-open mr-1"></i> Login
                                            </button>
                                        </div>
                                    </form>
                                    <!-- END Lock Form -->
                                </div>
                            </div>
                            <!-- END Lock Block -->
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>

        <script src="/assets/panel/js/dashmix.core.min.js"></script>
        <script src="/assets/panel/js/dashmix.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="/assets/panel/js/plugins/vide/jquery.vide.min.js"></script>
        <script src="/assets/panel/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/panel/js/pages/op_auth_lock.min.js"></script>
    </body>
</html>

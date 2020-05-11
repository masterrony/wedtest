@extends('panel.layout')

@section('title', 'Admin')

@section('style')
    @parent

    <link rel="stylesheet" href="/assets/panel/js/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" id="css-theme" href="/assets/panel/css/themes/xdream.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/manual/css/style.css">
@endsection

@section('side-bar')
    <!-- Sidebar -->
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
            <div class="content-header bg-white-10">
                <!-- Logo -->
                <a class="link-fx font-w600 font-size-lg text-white" href="{{route('panel.admin.file')}}">
                    <span class="smini-visible">
                        <span class="text-white-75">Ad</span><span class="text-white">min</span>
                    </span>
                    <span class="smini-hidden">
                        <span class="text-white">Admin </span><span class="text-white-75">Panel</span> <span class="text-white font-size-base font-w400"></span>
                    </span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Toggle Sidebar Style -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                    <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" data-toggle="layout" data-action="sidebar_style_toggle" href="javascript:void(0)">
                        <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                    </a>
                    <!-- END Toggle Sidebar Style -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('panel.admin.file')}}">
                        <i class="nav-main-link-icon far fa-file-alt"></i>
                        <span class="nav-main-link-name">File</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('panel.admin.permission')}}">
                        <i class="nav-main-link-icon si si-cursor"></i>
                        <span class="nav-main-link-name">Permission</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </nav>
            <!-- END Sidebar -->
@endsection

@section('page-header')

    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">

            <div class="content-header bg-white-10">
                <!-- Logo -->
                <a class="link-fx font-w600 font-size-lg text-white" href="{{route('panel.admin.file')}}">
                    <span class="smini-visible">
                        <span class="text-white-75">Fi</span><span class="text-white">le</span>
                    </span>
                    <span class="smini-hidden">
                        <span class="text-white">File</span><span class="text-white-75"></span>
                    </span>
                </a>
                <!-- END Options -->
            </div>
            
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div>
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block">
                <a type="button" class="btn btn-dual" href="{{route('home')}}">
                    <i class="fa fa-fw fa-home ml-1"></i> Go to Home
                </a>
            </div>
            <div class="dropdown d-inline-block">
                <a type="button" class="btn btn-dual" href="{{route('auth.sign_out')}}">
                    <i class="fa fa-fw fa-sign-out-alt ml-1"></i> Logout
                </a>
            </div>
            <!-- END User Dropdown -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary-darker">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->

@endsection

@section('content')

    <!-- Page Content -->
    <div class="row no-gutters flex-md-12-auto">
        <div class="col-md-12 col-lg-12 col-xl-12 order-md-0 bg-body-dark">
            <div class="content">

                <!-- Folders -->
                <h2 id="folder-heading" class="content-heading border-black-op">
                    <i class="far fa-fw fa-folder mr-1"></i> Folders ({{count($folders)}})
                </h2>
                <div class="row items-push" id="div_folder_container">
                    @foreach( $folders as $folder)
                        <div class="col-sm-6 col-md-4 col-xl-3 d-flex align-items-center top-container">
                            <!-- Inspiration Folder -->
                            <div class="options-container fx-overlay-zoom-in w-100">
                                <!-- Inspiration Folder Block -->
                                <div class="options-item block block-rounded block-transparent mb-0 content-container">
                                    <div class="block-content text-center">
                                        <p class="mb-2">
                                            <i class="fa fa-folder fa-4x text-info"></i>
                                        </p>
                                        <p class="font-w600 font-size-lg mb-0">
                                            {{$folder['name']}}
                                        </p>
                                        <p class="font-size-sm text-muted">
                                            ({{$folder['file_count']}})
                                        </p>
                                    </div>
                                </div>
                                <!-- END Inspiration Folder Block -->

                                <!-- Inspiration Folder Hover Options -->
                                <div class="options-overlay rounded-lg bg-white-50">
                                    <div class="options-overlay-content" data-path = "{{$folder['fullpath']}}">
                                        <div class="mt-3 mb-3">
                                            <button class="btn btn-hero-light btn-open">
                                                <i class="fa fa-share text-primary mr-1"></i> Open
                                            </button>
                                        </div>
                                        <div class="btn-group mb-3">
                                            @if(!!$permissions['move'])
                                                <button class="btn btn-sm btn-light btn-cut">
                                                    <i class="fa fa-cut text-primary mr-1"></i>
                                                </button>
                                                <button class="btn btn-sm btn-light btn-paste">
                                                    <i class="fa fa-paste mr-1"></i>
                                                </button>
                                            @endif
                                            @if(!!$permissions['delete'])
                                                <button class="btn btn-sm btn-light btn-delete-folder" data-toggle="tooltip" data-animation="true" data-placement="bottom" title="Really delete this folder?">
                                                    <i class="fa fa-trash text-danger mr-1"></i>
                                                </button>
                                            @endif
                                        </div>
                                        @if(!!$permissions['rename'])
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" value = "{{$folder['name']}}" data-type="folder" class="form-control inpt-rename" placeholder="type name...">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- END Inspiration Folder Hover Options -->
                            </div>
                            <!-- END Inspiration Folder -->
                        </div>
                    @endforeach
                </div>
                <!-- END Folders -->

                <!-- Files -->
                <h2 id="file-heading" class="content-heading border-black-op">
                    <i class="far fa-fw fa-file mr-1"></i> Files ({{count($files)}})
                </h2>
                <div class="row items-push js-gallery" id="div_file_container">
                    @foreach($files as $file)
                        <div class="col-sm-6 col-md-4 col-xl-3 d-flex align-items-center top-container">
                            <!-- Example File -->
                            <div class="options-container w-100">
                                <!-- Example File Block -->
                                <div class="options-item block block-rounded block-transparent mb-0 content-container">
                                    <div class="block-content text-center">
                                        <p class="mb-2 overflow-hidden">
                                            <img class="img-fluid" src="@php echo asset('/storage/' . $file['fullpath']) @endphp" alt="">
                                        </p>
                                        <p class="font-w600 mb-0">
                                            {{$file['name']}}
                                        </p>
                                        <p class="font-size-sm text-muted">
                                            {{$file['size']}}
                                        </p>
                                    </div>
                                </div>
                                <!-- END Example File Block -->

                                <!-- Example File Hover Options -->
                                <div class="options-overlay rounded-lg bg-white-50">
                                    <div class="options-overlay-content" data-path = "{{$file['fullpath']}}">
                                        <div class="mb-3">
                                            <a class="btn btn-hero-light img-lightbox" href="@php echo asset('/storage/' . $file['fullpath']) @endphp">
                                                <i class="fa fa-eye text-primary mr-1"></i> View
                                            </a>
                                        </div>
                                        <div class="btn-group mb-3">
                                            @if(!!$permissions['move'])
                                                <button class="btn btn-sm btn-light btn-cut">
                                                    <i class="fa fa-cut text-primary mr-1"></i>
                                                </button>
                                            @endif
                                            <a class="btn btn-sm btn-light" href="/file/download?path={{$file['fullpath']}}">
                                                <i class="fa fa-download text-black mr-1"></i>
                                            </a>
                                            @if(!!$permissions['delete'])
                                                <button class="btn btn-sm btn-light btn-delete-file" data-toggle="tooltip" data-animation="true" data-placement="bottom" title="Really delete this photo ?">
                                                    <i class="fa fa-trash text-danger mr-1"></i>
                                                </button>
                                            @endif
                                        </div>
                                        @if(!!$permissions['rename'])
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" value = "{{$file['name']}}" class="form-control inpt-rename" placeholder="type name...">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- END Example File Hover Options -->
                            </div>
                            <!-- END Example File -->
                        </div>
                    @endforeach
                </div>
                <!-- END Files -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

@endsection
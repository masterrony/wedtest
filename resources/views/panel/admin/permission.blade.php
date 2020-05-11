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
                <a class="link-fx font-w600 font-size-lg text-white" href="{{route('panel.admin.permission')}}">
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
                    <a class="nav-main-link active" href="{{route('panel.admin.permission')}}">
                        <i class="nav-main-link-icon si si-cursor"></i>
                        <span class="nav-main-link-name">Permission</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('panel.admin.file')}}">
                        <i class="nav-main-link-icon far fa-file-alt"></i>
                        <span class="nav-main-link-name">File</span>
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
                <a class="link-fx font-w600 font-size-lg text-white" href="{{route('panel.admin.permission')}}">
                    <span class="smini-visible">
                        <span class="text-white-75">Per</span><span class="text-white">mission</span>
                    </span>
                    <span class="smini-hidden">
                        <span class="text-white">Permission</span><span class="text-white-75"></span>
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

@section('action')
    <div class="mt-3 smini-hide">
        Permission management
    </div>
@endsection

@section('content')

    <!-- Page Content -->
    <div class="row no-gutters flex-md-12-auto">
        <div class="col-md-12 col-lg-12 col-xl-12 order-md-0 bg-body-dark">
            <div class="content">

                <!-- Hover Table -->
                <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Change permission settings</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-hover table-vcenter table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th class="text-center" style="width: 25%">Role</th>
                                        <th class="text-center" style="width: 20%">Create Folder</th>
                                        <th class="text-center" style="width: 20%">Rename</th>
                                        <th class="text-center" style="width: 20%">Delete</th>
                                        <th class="text-center" style="width: 20%">Move</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <th class="text-center" scope="row">{{$loop->index + 1}}</th>
                                            <td class="text-center font-w600">
                                                {{$permission->role}}
                                            </td>
                                            <td class="text-center d-none d-sm-table-cell">
                                                <div class="custom-control custom-control-lg custom-switch mb-1">
                                                    <input type="checkbox" class="custom-control-input" id="{{$permission->id}}create_folder" @if(!!$permission->create_folder) checked @endif>
                                                    <label data-id="{{$permission->id}}" data-permission="create_folder" class="custom-control-label" for="{{$permission->id}}create_folder"></label>
                                                </div>
                                            </td>
                                            <td class="text-center d-none d-sm-table-cell">
                                                <div class="custom-control custom-control-lg custom-switch mb-1">
                                                    <input type="checkbox" class="custom-control-input" id="{{$permission->id}}rename" @if(!!$permission->rename) checked @endif>
                                                    <label data-id="{{$permission->id}}" data-permission="rename" class="custom-control-label" for="{{$permission->id}}rename"></label>
                                                </div>
                                            </td>
                                            <td class="text-center d-none d-sm-table-cell">
                                                <div class="custom-control custom-control-lg custom-switch mb-1">
                                                    <input type="checkbox" class="custom-control-input" id="{{$permission->id}}delete" @if(!!$permission->delete) checked @endif>
                                                    <label data-id="{{$permission->id}}" data-permission="delete" class="custom-control-label" for="{{$permission->id}}delete"></label>
                                                </div>
                                            </td>
                                            <td class=" text-center d-none d-sm-table-cell">
                                                <div class="custom-control custom-control-lg custom-switch mb-1">
                                                    <input type="checkbox" class="custom-control-input" id="{{$permission->id}}move" @if(!!$permission->move) checked @endif>
                                                    <label data-id="{{$permission->id}}" data-permission="move" class="custom-control-label" for="{{$permission->id}}move"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Hover Table -->

            </div>
        </div>
    </div>

    <!-- END Page Content -->

@endsection

@section('script')
    @parent

    <script src="/assets/manual/js/permission_manage.js"></script>
@endsection
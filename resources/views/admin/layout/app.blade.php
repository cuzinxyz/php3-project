<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adm/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adm/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adm/dist/css/adminlte.min.css') }}">
</head>

{{-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse"> --}}

<body class="control-sidebar-slide-open layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            {{-- <img class="animation__wobble" src="{{ asset('adm/dist/img/AdminLTELogo.png') }}" alt="Abner"
                height="60" width="60"> --}}
            <div class="square-loading">
            </div>
            <style>
                .square-loading {
                    width: 100px;
                    height: 100px;
                    background-color: #fcfcfc;
                    border-radius: 8px;
                    animation: flip 1.2s ease-in-out infinite;
                }

                @keyframes flip {
                    0% {
                        transform: perspective(200px) rotateX(0) rotateY(0);
                    }

                    50% {
                        transform: perspective(200px) rotateX(180deg) rotateY(0);
                    }

                    100% {
                        transform: perspective(200px) rotateX(180deg) rotateY(180deg);
                    }
                }
            </style>
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block dropdown">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel d-flex dropdown-toggle align-items-center" id="navbarVersionDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="image">
                            <img src="{{ asset('adm/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                                alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block text-white">CuzinPro</a>
                        </div>
                    </div>

                    <div class="dropdown-menu py-0" aria-labelledby="navbarVersionDropdown"
                        style="left: 0px; right: inherit;">
                        <a class="dropdown-item bg-info disabled" href="#">Thay đổi thông tin</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}">Đăng xuất</a>
                        <a class="dropdown-item" href="{{ route('index') }}">Go home</a>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-header">Property Manager</li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="fas fa-home nav-icon"></i>
                                <p>
                                    Property
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('property.list') }}" class="nav-link">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('property.create') }}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('property-type.list') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Property type</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">Blog Manager</li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="fas fa-home nav-icon"></i>
                                <p>
                                    Blog
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('blog.list') }}" class="nav-link">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('blog.create') }}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categories.list') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">Banner</li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="fas fa-home nav-icon"></i>
                                <p>
                                    Banner
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('banner.list') }}" class="nav-link">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('banner.create') }}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('heading-title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6 d-flex justify-content-end align-items-center">
                            @yield('heading-button')
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @include('admin.layout.errors')

                    @yield('content')

                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    {{-- Font Awesome Icon  --}}
    {{-- <script src="https://kit.fontawesome.com/878f67d2d2.js" crossorigin="anonymous"></script> --}}

    <!-- jQuery -->
    <script src="{{ asset('adm/plugins/jquery/jquery.min.js') }}"></script>

    @yield('script')

    <!-- Bootstrap -->
    <script src="{{ asset('adm/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adm/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adm/dist/js/adminlte.js') }}"></script>

    {{-- <!-- jQuery Mapael -->
    <script src="{{ asset('adm/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('adm/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('adm/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('adm/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS --> --}}

</body>

</html>

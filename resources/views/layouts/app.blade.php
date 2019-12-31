<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HM Blog') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<section class="wrapper" id="app">

    @guest
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    {{ config('app.name', 'HM Blog') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            {{--                        @else--}}
                            {{--                            <li class="nav-item dropdown">--}}
                            {{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                            {{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
                            {{--                                </a>--}}

                            {{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                            {{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
                            {{--                                       onclick="event.preventDefault();--}}
                            {{--                                                     document.getElementById('logout-form').submit();">--}}
                            {{--                                        {{ __('Logout') }}--}}
                            {{--                                    </a>--}}

                            {{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                            {{--                                        @csrf--}}
                            {{--                                    </form>--}}
                            {{--                                </div>--}}
                            {{--                            </li>--}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    @endguest

<!-- Navbar -->
    @auth
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/admin') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="/admin-lte/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2"
                             alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                               class="btn btn-default btn-flat float-right"> {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    @endauth
<!-- /.navbar -->


    <!-- Main Sidebar Container -->
    @auth
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/admin') }}" class="brand-link">
                <img src="/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name', 'HM Blog') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
            {{--                <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
            {{--                    <div class="image">--}}
            {{--                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
            {{--                    </div>--}}
            {{--                    <div class="info">--}}
            {{--                        <a href="#" class="d-block">Alexander Pierce</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->


                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Blog Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('articles.list') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Articles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tags.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tags</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        @if(Auth::user()->roleAdmin())
                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Users Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Roles</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endif

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    @endauth

    <main class="py-4 content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            @yield('header')
                        </h1>
                    </div><!-- /.col -->
                    {{--                            <div class="col-sm-6">--}}
                    {{--                                <ol class="breadcrumb float-sm-right">--}}
                    {{--                                    <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    {{--                                    <li class="breadcrumb-item active">Starter Page</li>--}}
                    {{--                                </ol>--}}
                    {{--                            </div><!-- /.col -->--}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </main>


    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            HMBlog
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019 <a href="#">Fadi Selo</a>.</strong> All rights reserved.
    </footer>
    </div>


</body>
</html>

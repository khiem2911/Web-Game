<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GamingStore - Responsive Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- App favicon -->
    <link rel="icon" href="\assets\images\shopgame.png">


    <!-- App css -->
    <link href="\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="\assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="\assets\css\app.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="d-none d-sm-block">
                    <form class="app-search" action="{{ route('search.product') }}" method="GET">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

                <li class="dropdown notification-list">


                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="https://nld.mediacdn.vn/291774122806476800/2023/1/19/2023-01-18t210922z1006316874rc28jy9jubz1rtrmadp3soccer-friendly-sxi-psg-16741283634491960274025.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            Admin<i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0 text-white">
                                Welcome !
                            </h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

               

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{route('admin')}}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="\assets\images\shopgame.png" alt="" height="66">
                        <span class="logo-lg-text-light">Gaming</span>
                    </span>
                    <span class="logo-sm">
                        <span class="logo-sm-text-dark">G</span>
                        <img src="\assets\images\shopgame.png" alt="" height="28">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="{{route('admin')}}">
                                <i class="fe-user"></i>
                                <span class="badge badge-info badge-pill float-right"></span>
                                <span> User new </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('topsell.product')}}">
                                <i class="la la-ticket"></i>
                                <span class="badge badge-info badge-pill float-right"></span>
                                <span> Top sell procduct </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('statistics.product')}}">
                                <i class=" la la-gamepad"></i>
                                <span class="badge badge-info badge-pill float-right"></span>
                                <span> Product Statistics </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('product')}}">
                                <i class="la la-dashboard"></i>
                                <span class="badge badge-info badge-pill float-right"></span>
                                <span> Product New </span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{route('category')}}">
                                <i class="la la-dashboard"></i>
                                <span class="badge badge-info badge-pill float-right"></span>
                                <span> Category Game </span>
                            </a>
                        </li>              

                        <li class="menu-title mt-2">Components</li>

                        <li>
                            <a href="{{route('create.user')}}">
                                <i class="mdi mdi-account-multiple-plus-outline "></i>
                                <span> Create user </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('create.product')}}">
                                <i class="la la-wrench"></i>
                                <span> Create Product </span>
                                <span class="menu-arrow"></span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('create.category')}}">
                                <i class="la la-wrench"></i>
                                <span> Create Category </span>
                                <span class="menu-arrow"></span>
                            </a>
                        </li>

                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->
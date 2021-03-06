<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images') }}/favicon.ico">
    <!-- third party css -->
    @stack('styles')
    <!-- third party css end -->
    <!-- Notification css (Toastr) -->
    <link href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/css') }}/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/css') }}/icons.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/css') }}/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/libs') }}/sweetalert2/sweetalert2.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
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
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('uploads/avatar')}}/{{Auth::user()->m_avatar}}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            <i class="mdi mdi-chevron-down">{{Auth::user()->m_name}}</i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Ch??o m???ng {{Auth::user()->name}}</h6>
                        </div>

                        <!-- item-->
                        <a href="/admintrator/profile" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>T??i kho???n</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>C??i ?????t</span>
                        </a>

                        {{-- <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a> --}}

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{route('logout')}}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>????ng xu???t</span>
                        </a>

                    </div>
                </li>
                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('admin/assets/images') }}/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('admin/assets/images') }}/logo-sm.png" alt="" height="24">
                    </span>
                </a>
                <a href="index.html" class="logo logo-light text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('admin/assets/images') }}/logo-light.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('admin/assets/images') }}/logo-sm.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">{{$data['title']}}</h4>
                </li>

            </ul>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{asset('uploads/avatar')}}/{{Auth::user()->m_avatar}}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                    <div class="dropdown">
                        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}}</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="/admintrator/profile" class="dropdown-item notify-item">
                                <i class="fe-user mr-1"></i>
                                <span>T??i kho???n</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings mr-1"></i>
                                <span>C??i ?????t</span>
                            </a>

                            {{-- <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock mr-1"></i>
                                <span>Lock Screen</span>
                            </a> --}}

                            <!-- item-->
                            <a href="{{route('logout')}}" class="dropdown-item notify-item">
                                <i class="fe-log-out mr-1"></i>
                                <span>????ng xu???t</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted">
                        @if(Auth::user()->role == 1)
                        Admintrator
                        @else if(Auth::user()->role == 2)
                        Nh??n vi??n
                        @endif
                    </p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-muted">
                                <i class="mdi mdi-cog"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="{{route('logout')}}">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="{{ route("dashboard.index") }}" class=" {{ $data['action'] === 'dashboard' ? 'active' : '' }} ">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Th???ng k?? </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route("category-admin") }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Danh m???c </span>
                            </a>
                        </li>
                        <li>
                            <a href="/admintrator/user">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Ng?????i d??ng</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> B??i vi???t </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level mm-collapse" aria-expanded="false">
                                <li><a href="{{ route('post-list') }}">Danh s??ch b??i vi???t</a></li>
                                <li><a href="{{ route('add-form') }}">Th??m b??i vi???t</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> S???n ph???m </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level mm-collapse" aria-expanded="false">
                                <li><a href="{{ route('product.index') }}">Xem s???n ph???m</a></li>
                                <li><a href="{{ route('product.create') }}">Th??m s???n ph???m</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Qu???n l?? b??nh lu???n </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level mm-collapse" aria-expanded="false">
                                <li><a href="{{ url('admintrator/list') }}">B??nh lu???n s???n ph???m</a></li>
                                <li><a href="">B??nh lu???n Blog</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route("contact-admin") }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Ph???n h???i </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route("file") }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> QL h??nh ???nh </span>
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

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            @yield('content')
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
        </div>
        <div class="slimscroll-menu">

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout, etc.
                </div>
                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images') }}/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images') }}/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="{{ asset('admin/assets/css') }}/bootstrap-dark.min.css" data-appStyle="{{ asset('admin/assets/css') }}/app-dark.min.css" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images') }}/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="{{ asset('admin/assets/css') }}/app-rtl.min.css" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images') }}/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="{{ asset('admin/assets/css') }}/bootstrap-dark.min.css" data-appStyle="{{ asset('admin/assets/css') }}/app-dark-rtl.min.css" />
                    <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                </div>

                <a href="https://1.envato.market/k0YEM" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- Vendor js -->
    <script src="{{ asset('admin/assets/js') }}/vendor.min.js"></script>
    <script src="{{ asset('admin/assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/toastr.init.js') }}"></script>

    {{-- Another JS --}}
    @stack('scripts')
    <!-- Toastr js -->

    <script src="{{ asset('admin/assets/libs') }}/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('admin/assets/js') }}/pages/sweet-alerts.init.js"></script>
    <script src="{{ asset('admin/assets/js') }}/{{ $data['action'] }}.js"></script>
    <script src="{{ asset('admin/assets/js') }}/{{ $data['action'] }}.js"></script>

    <!-- App js -->
    <script src="{{ asset('admin/assets/js') }}/app.min.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Admin Dashboard</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
    rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
    
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('adminAssets/assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('adminAssets/assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{ asset('adminAssets/assets/css/sleek.css') }}" />
    
    
    
    <!-- FAVICON -->
    <link href="{{ asset('adminAssets/assets/img/favicon.png') }}" rel="shortcut icon" />

    <!--
        HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
        <![endif]-->
    <script src="{{ asset('adminAssets/assets/plugins/nprogress/nprogress.js') }}"></script>
    @livewireStyles
</head>


<body class="sidebar-fixed sidebar-dark header-fixed header-light" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="/index.html">
                        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"
                            width="30" height="33" viewBox="0 0 30 33">
                            <g fill="none" fill-rule="evenodd">
                                <path class="logo-fill-blue" fill="red" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                            </g>
                        </svg>
                        <span class="brand-name">E-Dashboard</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-scrollbar">

                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">



                        <li class="has-sub active expand">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">Dashboard</span> <b class="caret"></b>
                            </a>
                            <ul class="collapsed" id="dashboard" data-parent="#sidebar-menu">
                                <div class="sub-menu">



                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.dashboard') }}">
                                            <span class="nav-text">View All</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.categories') }}">
                                            <span class="nav-text">Categories</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.products') }}">
                                            <span class="nav-text">Products</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.banners') }}">
                                            <span class="nav-text">Banners</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.homeCategories') }}">
                                            <span class="nav-text">HomePage Categories</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.sales') }}">
                                            <span class="nav-text">Manage Sales</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.coupons') }}">
                                            <span class="nav-text">Coupons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.coupons') }}">
                                            <span class="nav-text">Orders</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.coupons') }}">
                                            <span class="nav-text">New</span>
                                        </a>
                                    </li>
                                    

                                </div>
                            </ul>
                        </li>

                    </ul>

                </div>


            </div>
        </aside>



        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <!-- search form -->
                    <div class="search-form d-none d-lg-inline-block">
                        <div class="input-group">
                            <button type="button" name="search" id="search-btn" class="btn btn-flat">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <input type="text" name="query" id="search-input" class="form-control"
                                placeholder="'button', 'chart' etc." autofocus autocomplete="off" />
                        </div>
                        <div id="search-results-container">
                            <ul id="search-results"></ul>
                        </div>
                    </div>

                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                           
                            <li class="dropdown notifications-menu">
                                <button class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-bell-outline"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">You have 5 notifications</li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-plus"></i> New user registered
                                            <span class="float-right font-size-12 d-inline-block"><i
                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-remove"></i> User deleted
                                            <span class="float-right font-size-12 d-inline-block"><i
                                                    class="mdi mdi-clock-outline"></i> 07 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                                            <span class="float-right font-size-12 d-inline-block"><i
                                                    class="mdi mdi-clock-outline"></i> 12 PM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-supervisor"></i> New client
                                            <span class="float-right font-size-12 d-inline-block"><i
                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-server-network-off"></i> Server overloaded
                                            <span class="float-right font-size-12 d-inline-block"><i
                                                    class="mdi mdi-clock-outline"></i> 05 AM</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a class="text-center" href="#"> View All </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ asset('adminAssets/assets/img/user/user.png') }}" class="user-image"
                                        alt="User Image" />
                                    <span class="d-none d-lg-inline-block">Abdus Salam</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <!-- User image -->
                                    <li class="dropdown-header">
                                        <img src="{{ asset('adminAssets/assets/img/user/user.png') }}"
                                            class="img-circle" alt="User Image" />
                                        <div class="d-inline-block">
                                            Abdus Salam <small class="pt-1">abdus@gmail.com</small>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="profile.html">
                                            <i class="mdi mdi-account"></i> My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="email-inbox.html">
                                            <i class="mdi mdi-email"></i> Message
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a href="signin.html"> <i class="mdi mdi-logout"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>


            <div class="content-wrapper">
                {{ $slot }}

            </div>



        </div>
    </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
    <script src="{{ asset('adminAssets/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/toaster/toastr.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/ladda/spin.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/ladda/ladda.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/plugins/jekyll-search.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/js/sleek.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/js/chart.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/js/date-range.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/js/map.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js" integrity="sha512-jWNpWAWx86B/GZV4Qsce63q5jxx/rpWnw812vh0RE+SBIo/mmepwOSQkY2eVQnMuE28pzUEO7ux0a5sJX91g8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        window.addEventListener('show-model', event => {
            $('#exampleModalForm').modal('show');
        })
        window.addEventListener('hide-model', event => {
            $('#exampleModalForm').modal('hide');
        })
        window.addEventListener('confirm-model', event => {
            $('#deleteModel').modal('show');
        })
        window.addEventListener('hide-confirm-model', event => {
            $('#deleteModel').modal('hide');
        })
        // product modal
        window.addEventListener('show-product-modal', event => {
            $('#productModal').modal('show');
        })
        window.addEventListener('hide-product-modal', event => {
            $('#productModal').modal('hide');
        })
        window.addEventListener('confirm-product-modal', event => {
            $('#deleteModal').modal('show');
        })
        window.addEventListener('hide-product-confirm-modal', event => {
            $('#deleteModal').modal('hide');
        })
        // BannerSlider
        window.addEventListener('show-banner-modal',event=>{
            $('#bannerModal').modal('show');
        })
        window.addEventListener('show-editbanner-modal',event=>{
            $('#bannerModal').modal('show');
        })
        window.addEventListener('hide-banner-modal',event=>{
            $('#bannerModal').modal('hide');
        })
        window.addEventListener('confirm-banner-modal', event => {
            $('#deleteModal').modal('show');
        })
        window.addEventListener('hide-banner-confirm-modal', event => {
            $('#deleteModal').modal('hide');
        })
        // Coupon Modal
        window.addEventListener('show-coupon-modal',event=>{
            $('#couponModal').modal('show');
        })
        window.addEventListener('show-editcoupon-modal',event=>{
            $('#couponModal').modal('show');
        })
        window.addEventListener('hide-coupon-modal',event=>{
            $('#couponModal').modal('hide');
        })
        window.addEventListener('confirm-coupon-modal', event => {
            $('#deleteModal').modal('show');
        })
        window.addEventListener('hide-coupon-confirm-modal', event => {
            $('#deleteModal').modal('hide');
        })
        
    </script>
    @livewireScripts
@stack('scripts')


</body>

</html>

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
    <link href="{{ asset('adminAssets/assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminAssets/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

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
                                <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                            </g>
                        </svg>
                        <span class="brand-name">Sleek Dashboard</span>
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
                            <ul class="collapse" id="dashboard" data-parent="#sidebar-menu">
                                <div class="sub-menu">



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
                                        <a class="sidenav-item-link" href="analytics.html">
                                            <span class="nav-text">Analytics</span>

                                            <span class="badge badge-success">new</span>

                                        </a>
                                    </li>




                                </div>
                            </ul>
                        </li>






                    </ul>

                </div>

                <hr class="separator" />

                <div class="sidebar-footer">
                    <div class="sidebar-footer-content">
                        <h6 class="text-uppercase">
                            Cpu Uses <span class="float-right">40%</span>
                        </h6>
                        <div class="progress progress-xs">
                            <div class="progress-bar active" style="width: 40%;" role="progressbar"></div>
                        </div>
                        <h6 class="text-uppercase">
                            Memory Uses <span class="float-right">65%</span>
                        </h6>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-warning" style="width: 65%;" role="progressbar"></div>
                        </div>
                    </div>
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
                            <!-- Github Link Button -->
                            <li class="mr-3 github-link">
                                <a class="btn btn-outline-secondary btn-sm"
                                    href="https://github.com/tafcoder/sleek-dashboard" target="_blank">
                                    <span class="mr-2 d-none d-md-inline-block">Source Code</span>
                                    <i class="mdi mdi-github-circle"></i>
                                </a>

                            </li>
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

            <footer class="mt-auto footer">
                <div class="bg-white copyright">
                    <p>
                        &copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
                        <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
    </div>


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
    </script>
    @livewireScripts



</body>

</html>

<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Legitquest Case Monitoring System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/lq-logo-m.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body data-topbar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark text-left">
                                <span class="logo-sm">
                                    <img src="assets/images/lq-logo-m.png" alt="" height="30">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/lq-logo.png" alt="" height="35">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm-light.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect" data-toggle="dropdown">
                                <i class="mdi mdi mdi-bell-outline"></i>
                            </button>
                            <div class="dropdown-menu notification-dropdown dropdown-menu-right p-0 m-0" aria-labelledby="notification-drop-link">
                               <div class="d-flex align-items-center justify-content-center py-3 mb-2 border-bottom bg-light">
                                <h5 class="text-center mb-0">Notification </h5> <span class="badge badge-pill badge-success ml-2">3</span>
                               </div>

                                <a class="dropdown-item border-bottom py-3 d-flex align-items-center justify-content-between" href="#">
                                  Lorem ipsum dolor
                                  <small class="text-muted">10min</small>
                                </a>
                                <a class="dropdown-item border-bottom py-3 d-flex align-items-center justify-content-between " href="#">
                                  venenatis ut rutrum ac
                                  <small class="text-muted">2:34pm</small>
                                </a>
                                <a class="dropdown-item border-bottom py-3 d-flex align-items-center justify-content-between " href="#">
                                  Lorem ipsum dolor
                                  <small class="text-muted">2:34pm</small>
                                </a>
                                <a class="dropdown-item border-bottom py-3 d-flex align-items-center justify-content-between" href="#">
                                  Lorem ipsum dolor
                                  <small class="text-muted">10min</small>
                                </a>
                                <a class="dropdown-item border-bottom py-3 d-flex align-items-center justify-content-between " href="#">
                                  venenatis ut rutrum ac
                                  <small class="text-muted">2:34pm</small>
                                </a>
                                <a class="dropdown-item border-bottom py-3 d-flex align-items-center justify-content-between " href="#">
                                  Lorem ipsum dolor
                                  <small class="text-muted">2:34pm</small>
                                </a>
                                <div class="p-2">
                                    <button class="btn-outline-primary btn btn-block btn-sm">View All</button>
                                </div>

                              </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1">Smith</span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> Billing</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-settings font-size-16 align-middle mr-1"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock font-size-16 align-middle mr-1"></i> Lock screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>

            </header>

            @include('layout.left-sidebar')



            @yield('container')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 mx-auto text-center">
                            2020 © Legitquest case Monitoring System.
                        </div>

                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->




            <!-- JAVASCRIPT -->
            <script src="assets/libs/jquery/jquery.min.js"></script>
            <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/libs/metismenu/metisMenu.min.js"></script>
            <script src="assets/libs/simplebar/simplebar.min.js"></script>
            <script src="assets/libs/node-waves/waves.min.js"></script>

            <script src="./assets/js/pages/bundle.js"></script>

            <script src="assets/js/pages/dashboard.init.js"></script>

            <script src="assets/js/app.js"></script>

            @yield('script')
        </div>
    </body>

<!-- Mirrored from themesdesign.in/xoric/layouts/blue/vertical/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Sep 2020 10:02:35 GMT -->
</html>


<!doctype html>

<html
    lang="en"
    class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="http://localhost/course-crm/public/admin-assets/assets/"
    data-template="vertical-menu-template"
    data-style="light">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard</title>
 
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="http://localhost/course-crm/public/admin-assets/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />


    <!-- Page CSS -->
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/css/pages/cards-advance.css" />

    <!-- Helpers -->
    <script src="http://localhost/course-crm/public/admin-assets/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="http://localhost/course-crm/public/admin-assets/assets/vendor/js/template-customizer.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="http://localhost/course-crm/public/admin-assets/assets/js/config.js"></script>


    <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- jQuery (necessary for DataTables) -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <style>

        .app-brand-logo.demo {
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: center;
            justify-content: center;
            display: -ms-flexbox;
            display: flex;
            width: 180px;
            height: 68px;
        }
        .dark-style .menu .app-brand.demo {
            height: 120px;
        }
    </style>


</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

       <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{url('/dashboard')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('public/admin-assets/assets/img/branding/logo.png')}}" alt="Project logo" width="100%" height="height: auto;" />
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="ti ti-home-2 me-2"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('user-management') }}" class="menu-link">
                <i class="ti ti-user-circle me-2"></i>
                <div data-i18n="User Menagement">User Menagement</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('customer-management') }}" class="menu-link">
                <i class="ti ti-users-group me-2"></i>
                <div data-i18n="Customer">Customer</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('calender.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div data-i18n="Calendar">Calendar</div>
            </a>
        </li>
    </ul>
</aside>

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="ti ti-menu-2 ti-md"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item navbar-search-wrapper mb-0">
                            <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                                <i class="ti ti-search ti-md me-2 me-lg-4 ti-lg"></i>
                                <span class="d-none d-md-inline-block text-muted fw-normal">Search (Ctrl+/)</span>
                            </a>
                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Language -->

                        <!--/ Language -->



                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a
                                class="nav-link dropdown-toggle hide-arrow p-0"
                                href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="http://localhost/course-crm/public/admin-assets/assets/img/avatars/1.png" alt class="rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item mt-0" href="pages-account-settings-account.html">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                <div class="avatar avatar-online">
                                                    <img src="http://localhost/course-crm/public/admin-assets/assets/img/avatars/1.png" alt class="rounded-circle" />
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <div class="d-grid px-2 pt-2 pb-1">
                                    <!-- Logout Button -->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <button class="btn btn-sm btn-danger d-flex" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <small class="align-middle">Logout</small>
                                        <i class="ti ti-logout ms-2 ti-14px"></i>
                                    </button>
                                </div>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>


            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>

                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl">
                        <div
                            class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">

                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js admin-assets/vendor/js/core.js -->


<!-- Core JS -->
<!-- build:js admin-assets/vendor/js/core.js -->

<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/jquery/jquery.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/popper/popper.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/js/bootstrap.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/hammer/hammer.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/i18n/i18n.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/swiper/swiper.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
   <script src="http://localhost/course-crm/public/admin-assets/assets/js/tables-datatables-basic.js"></script>

<!-- Main JS -->
<script src="http://localhost/course-crm/public/admin-assets/assets/js/main.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/js/pages-auth-multisteps.js"></script>


{{--<!-- Page JS -->--}}
<script src="http://localhost/course-crm/public/admin-assets/assets/js/dashboards-analytics.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
    $(document).ready(function() {
    $('#myTable').DataTable({
        "paging": true,  // Enable pagination
        "searching": true,  // Enable search functionality
        "ordering": true,  // Enable sorting
        "lengthChange": true,  // Allow the number of entries per page to be changed
        "responsive": true  // Make the table responsive
    });
});
</script>

</body>
</html>
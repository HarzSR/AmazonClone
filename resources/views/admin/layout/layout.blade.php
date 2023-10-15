<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Panel - {{ Route::currentRouteName() }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ url('admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="{{ url('admin/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ url('admin/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    @if (Session::get('page') == "dashboard")
        <!-- Morris Chart Css-->
        <link href="{{ url('admin/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
    @endif

    @if (Session::get('page') == "passwords")
        <!-- Sweet Alert Css -->
        <link href="{{ url('admin/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    @endif

    <!-- Custom Css -->
    <link href="{{ url('admin/css/style.css') }}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-black">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-black">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Search for anything ...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    
    @include('admin.layout.header')

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            
            @include('admin.layout.sidebar')

            @include('admin.layout.footer')

        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    @yield('content')

    <!-- Jquery Core Js -->
    <script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ url('admin/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ url('admin/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ url('admin/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    @if (Session::get('page') == 'passwords')
        <!-- Jquery Validation Plugin Css -->
        <script src="{{ url('admin/plugins/jquery-validation/jquery.validate.js') }}"></script>

        <!-- JQuery Steps Plugin Js -->
        <script src="{{ url('admin/plugins/jquery-steps/jquery.steps.js') }}"></script>

        <!-- Sweet Alert Plugin Js -->
        <script src="{{ url('admin/plugins/sweetalert/sweetalert.min.js') }}"></script>
    @endif

    <!-- Waves Effect Plugin Js -->
    <script src="{{ url('admin/plugins/node-waves/waves.js') }}"></script>

    @if (Session::get('page') == "dashboard")
        <!-- Jquery CountTo Plugin Js -->
        <script src="{{ url('admin/plugins/jquery-countto/jquery.countTo.js') }}"></script>

        <!-- Morris Plugin Js -->
        <script src="{{ url('admin/plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ url('admin/plugins/morrisjs/morris.js') }}"></script>

        <!-- ChartJs -->
        <script src="plugins/chartjs/Chart.bundle.js"></script>

        <!-- Flot Charts Plugin Js -->
        <script src="{{ url('admin/plugins/flot-charts/jquery.flot.js') }}"></script>
        <script src="{{ url('admin/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
        <script src="{{ url('admin/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
        <script src="{{ url('admin/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
        <script src="{{ url('admin/plugins/flot-charts/jquery.flot.time.js') }}"></script>

        <!-- Sparkline Chart Plugin Js -->
        <script src="{{ url('admin/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>
    @endif

    <!-- Custom Js -->
    <script src="{{ url('admin/js/admin.js') }}"></script>

    @if (Session::get('page') == "dashboard")
        <script src="{{ url('admin/js/pages/index.js') }}"></script>
    @endif

    @if (Session::get('page') == 'passwords')
        <script src="{{ url('admin/js/pages/forms/form-validation.js') }}"></script>
    @endif

    <!-- Demo Js -->
    <script src="{{ url('admin/js/demo.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ url('admin/js/custom.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Admin Control Board</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ url('admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="{{ url('admin/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ url('admin/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ url('admin/css/style.css') }}" rel="stylesheet" />
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>Dashboard</b></a>
            <small>Admin Control Board</small>
        </div>
        <div class="card">
            <div class="body">
                @if(\Illuminate\Support\Facades\Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error: </strong> {{ \Illuminate\Support\Facades\Session::get('error_message') }}
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('neutral_message'))
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Notice: </strong> {{ \Illuminate\Support\Facades\Session::get('neutral_message') }}
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Success: </strong> {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error: </strong>
                            <br>
                            @foreach($errors->all() as $error)
                                &emsp; &#x2022; {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                <form id="sign_in" method="POST" action="{{ url('admin/login') }}">
                    @csrf
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">mail</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required autofocus value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <a href="{{ url('admin/forgot-password')}}">Forgot Password?</a>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-black waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ url('admin/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ url('admin/plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ url('admin/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ url('admin/js/admin.js') }}"></script>
    <script src="{{ url('admin/js/pages/examples/sign-in.js') }}"></script>
</body>

</html>
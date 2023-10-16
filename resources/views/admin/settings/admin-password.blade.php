@extends('admin.layout.layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>UPDATE PASSWORD</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" id="adminPasswordUpdate" name="adminPasswordUpdate" method="POST" action="{{ url('admin/password') }}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="password" id="current_password" name="current_password" class="form-control" required>
                                                <label class="form-label">Old Password</label>
                                                <div class="help-info" id="currentPassError" name="currentPassError"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="password" id="new_password" name="new_password" class="form-control" required>
                                                <label class="form-label">New Password</label>
                                                <div class="help-info" id="newPassError" name="newPassError"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                                                <label class="form-label">Retype Password</label>
                                                <div class="help-info" id="confirmPassError" name="confirmPassError"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group-lg align-right">
                                    <button class="btn btn-danger waves-effect align-right" id="btn_reset" name="btn_reset" type="reset">RESET</button>
                                    <button class="btn btn-primary waves-effect align-right" id="btn_submit" name="btn_submit" type="submit">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
        </div>
    </section>

@endsection
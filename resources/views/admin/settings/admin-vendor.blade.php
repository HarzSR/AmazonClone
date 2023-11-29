@extends('admin.layout.layout')

@section('content')

    <section class="content">
        <div class="container-fluid">

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

            <form action="{{ url('/admin/account') }}" method="POST" id="updateAdminDetails" name="updateAdminDetails" enctype="multipart/form-data">
                @csrf
                <!-- Basic Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    APPROVE VENDORS
                                </h2>
                            </div>
                            <div class="body table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>HEADER</th>
                                            <th>OLD VALUE</th>
                                            <th>NEW VALUE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Larry</td>
                                            <td>Jellybean</td>
                                            <td>@lajelly</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Larry</td>
                                            <td>Kikat</td>
                                            <td>@lakitkat</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Basic Table -->
            </form>
        </div>
    </section>

@endsection
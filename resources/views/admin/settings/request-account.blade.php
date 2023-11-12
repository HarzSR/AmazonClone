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

            <form action="{{ url('/admin/request-account') }}" method="POST" id="updateAdminDetails" name="updateAdminDetails" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-3">
                        <div class="card profile-card">
                            <div class="profile-header">&nbsp;</div>
                            <div class="profile-body">
                                <div class="image-area">
                                    <img src="@if(!empty($userDetails['image'])  && file_exists(public_path('admin/images/admin_images/' . $userDetails['image']))) {{ asset('admin/images/admin_images/' . $userDetails['image']) }} @else ../../admin/images/user.png  @endif" alt="AdminBSB - Profile Image" width="128px" height="128px"/>
                                </div>
                                <div class="content-area">
                                    <h3>{{ ucwords($userDetails['name']) }}</h3>
                                    <p></p>
                                </div>
                                @if(!empty($userDetails['image']) && file_exists(public_path('admin/images/admin_images/' . $userDetails['image'])) && Auth::guard('admin')->user()->vendor_update_status == 0)
                                    <div class="btn-group-xs align-right">
                                        <button type="button" id="deleteVendor" name="deleteVendor" dataId="image" dataName="vendor image" class="btn bg-red waves-effect m-r-5 m-t-5">Delete</button>
                                    </div>
                                @elseif(!empty($userDetails['image']) && Auth::guard('admin')->user()->vendor_update_status == 0)
                                    <div class="btn-group-xs align-right">
                                        <button type="button" id="deleteVendor" name="deleteVendor" dataId="image" dataName="vendor image" class="btn bg-red waves-effect m-r-5 m-t-5">Invalid Image for Admin. Suggest click here.</button>
                                    </div>
                                @endif
                            </div>
                            <div class="profile-footer">
                                <label>Update Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" class="form-control" id="adminImage" name="adminImage" accept="image/*" @if(Auth::guard('admin')->user()->vendor_update_status == 1) disabled style="pointer-events: none;" @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    REQUEST DETAILS UPDATE @if(Auth::guard('admin')->user()->vendor_update_status == 1)<small style="color: red; font-weight: bold;"> UNDER REVIEW </small> @endif
                                </h2>
                            </div>
                            <div class="body">
                                <div class="col-md-3">
                                    <label>Name</label>
                                    <div class="form-group">
                                        <div>
                                            <input style="pointer-events: none;" type="text" class="form-control" disabled value="{{ ucwords($userDetails['name']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Type</label>
                                    <div class="form-group">
                                        <div>
                                            <input style="pointer-events: none;" type="text" class="form-control" disabled value="{{ ucwords($userDetails['type']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Email</label>
                                    <div class="form-group">
                                        <div >
                                            <input style="pointer-events: none;" type="text" class="form-control" disabled value="{{ $userDetails['email'] }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Number</label>
                                    <div class="form-group">
                                        <div>
                                            <input style="pointer-events: none;" type="text" class="form-control" disabled value="{{ ucwords($userDetails['phone']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>New Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" @if(!empty(old('name'))) value="{{ ucwords(old('name')) }}" @else value="{{ trim(ucwords($userDetails['name'])) }}" @endif @if(Auth::guard('admin')->user()->vendor_update_status == 1) disabled style="pointer-events: none;" @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>New Phone</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="number" name="number" class="form-control" placeholder="Enter phone" @if(!empty(old('phone'))) value="{{ ucwords(old('phone')) }}" @else value="{{ trim(ucwords($userDetails['phone'])) }}" @endif @if(Auth::guard('admin')->user()->vendor_update_status == 1) disabled style="pointer-events: none;" @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Notes</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="description" id="note" name="note" class="form-control no-resize" placeholder="Enter Notes" @if(!empty(old('note'))) value="{{ ucwords(old('note')) }}" @else @if ($userDetails['notes'] != null) value="{{ trim(ucwords($userDetails['notes'])) }}" @endif @endif @if(Auth::guard('admin')->user()->vendor_update_status == 1) disabled style="pointer-events: none;" @endif>
                                        </div>
                                        @if(!empty(Auth::guard('admin')->user()->notes) && Auth::guard('admin')->user()->vendor_update_status == 0)
                                            <div class="btn-group-xs align-right">
                                                <button type="button" id="deleteVendor" name="deleteVendor"  dataId="notes" dataName="admin notes" class="btn bg-red waves-effect m-t-5">Delete</button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="btn-group-lg align-right">
                                    <button class="btn btn-danger waves-effect align-right" id="btn_reset" name="btn_reset" type="reset" @if(Auth::guard('admin')->user()->vendor_update_status == 1) disabled style="pointer-events: none;" @endif>RESET</button>
                                    <button class="btn btn-info waves-effect align-right" id="btn_update" name="btn_update" type="button" @if(Auth::guard('admin')->user()->vendor_update_status == 1) disabled style="pointer-events: none;" @endif>REVIEW</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
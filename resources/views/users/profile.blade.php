<?php

$name = Session::get('name');
$type = Session::get('type');
$shipping_line = Session::get('shipping_line');

?>


@include('layouts.main-header')

<div class="page">
    <div class="page-main">

        <!--app header-->
        @include('layouts.app-header')
        <!--/app header-->


        <!-- Horizontal-menu -->
        @include('layouts.menus.horizontal-menu')
        <!-- Horizontal-menu end -->

        <div class="app-content page-body">
            <div class="container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Edit Profile</h4>
                    </div>
                </div>
                <!--End Page header-->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="card box-widget widget-user">
                            <div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" class="rounded-circle"
                                    src="{{ asset('images/users/16.jpg') }}"></div>
                            <div class="card-body text-center">
                                <div class="pro-user">
                                    <h3 class="pro-user-username text-dark mb-1">{{ $name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="card">

                            @if (session('success'))
                                <div class="alert alert-success" role="alert"><button type="button" class="close"
                                        data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger" role="alert"><button type="button" class="close"
                                        data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="card-header">
                                <div class="card-title">Change Password</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-12">

                                        <form class="form-horizontal" action="{{ route('user.update.password') }}"
                                            method="post">
                                            @csrf


                                            <div class="form-group">
                                                <label class="form-label">New Password</label>
                                                <input type="password" name="newPassword" id="newPassword"
                                                    class="form-control" placeholder="New Password" required>
                                            </div>
                                    </div>
                                    <div class="col-sm-6 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Repeat New Password</label>
                                            <input type="password" name="newPasswordRepeat" id="newPasswordRepeat"
                                                class="form-control" placeholder="Repeat New Password" required>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="card-footer text-right">
                                {{-- <a href="#" class="btn btn-lg btn-primary">Update</a> --}}
                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-lg btn-danger">Cancel</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Row-->


                @include('layouts.main-footer')

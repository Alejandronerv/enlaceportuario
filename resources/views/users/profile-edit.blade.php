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
                                    <h3 class="pro-user-username text-dark mb-1">{{ $user->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="card">

                            {{-- @if (session('success'))
                                <div class="alert alert-success" role="alert"><button type="button" class="close"
                                        data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>
                                    {{ session('success') }}
                                </div>
                            @endif --}}

                            {{-- @if (session('error'))
                                <div class="alert alert-danger" role="alert"><button type="button" class="close"
                                        data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>
                                    {{ session('error') }}
                                </div>
                            @endif --}}


                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Edit Profile</div>
                                </div>
                                <div class="card-body">
                                    <div class="card-title font-weight-bold">Basic info:</div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-12">

                                            <form action="{{ route('user.update', $user->email) }}" method="GET">
                                                @csrf
                                                {{-- @method('PUT') --}}
                                                <input type="hidden" name="email" value="{{ $user->email }}">
                                                <div class="form-group row">
                                                    <label for="inputTitle" class="col-md-3 form-label">Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="inputName"
                                                            name="inputName" placeholder="Name"
                                                            value="{{ $user->name }}" required>
                                                    </div>
                                                </div>
                                                {{-- INCLUDE LIST BOX WITH SHIPAGENCY CODES --}}
                                                <x-ship-angency-list-box />
                                                {{-- END LIST BOX --}}

                                                <div class="form-group row">
                                                    <label class="col-md-3 form-label">Role</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="role" id="roleAdmin" value="1"
                                                                {{ $user->type == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="roleAdmin">Admin</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="role" id="roleShippingAgency" value="2"
                                                                {{ $user->type == 2 ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="roleShippingAgency">Shipping
                                                                Agency</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputNote" class="col-md-3 form-label">Notes</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="inputNote"
                                                            name="inputNote" placeholder="Notes"
                                                            value="{{ $user->note }}">
                                                    </div>
                                                </div>

                                                <div class="card-footer text-right">
                                                    {{-- <a href="#" class="btn btn-lg btn-primary">Update</a> --}}
                                                    <button type="submit"
                                                        class="btn btn-lg btn-primary">Update</button>
                                                    <a href="{{ url()->previous() }}"
                                                        class="btn btn-lg btn-danger">Cancel</a>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Row-->


                            @include('layouts.main-footer')

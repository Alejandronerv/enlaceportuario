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
                <div class="page-leftheader">
                    <h4 class="page-title">Create New User</h4>
                </div>
                <!--End Page header-->

                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert"><button type="button" class="close"
                                    data-dismiss="alert" aria-hidden="true">×</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="fa fa-check-circle-o mr-2" aria-hidden="true">{{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-body">

                            <div class="form-group mb-0 mt-4 row">
                                <div class="col mb-2">
                                    <a href="{{ url()->previous() }}" class="btn btn-light"><i
                                            class="fe fe-arrow-left"></i>
                                        Back</a>
                                </div>
                            </div>

                            <form class="form-horizontal" action="{{ route('user.create') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputTitle" class="col-md-3 form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputName" name="inputName"
                                            placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-md-3 form-label">email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                                            placeholder="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-3 form-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="inputPassword"
                                            name="inputPassword" minlength="8" placeholder="Password" required>
                                    </div>
                                </div>

                                {{-- INCLUDE LIST BOX WITH SHIPAGENCY CODES --}}
                                <x-ship-angency-list-box/>
                                {{-- END LIST BOX --}}

                                <div class="form-group row">
                                    <label class="col-md-3 form-label">Role</label>
                                    <div class="col-md-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="roleAdmin"
                                                value="1">
                                            <label class="form-check-label" for="roleAdmin">Admin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role"
                                                id="roleShippingAgency" value="2" checked>
                                            <label class="form-check-label" for="roleShippingAgency">Shipping
                                                Agency</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNote" class="col-md-3 form-label">Notes</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputNote" name="inputNote"
                                            placeholder="Notes">
                                    </div>
                                </div>

                                <div class="form-group mb-0 mt-4 row">
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                @include('layouts.main-footer')

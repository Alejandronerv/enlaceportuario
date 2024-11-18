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
                        <h4 class="page-title">Users List</h4>
                    </div>
                </div>
                <!--End Page header-->

                {{-- DATA TABLE --}}
                @section('content')

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

                        <div class="card-body">
                            <div class="form-group mb-0 mt-4 row">

                                <div class="col mb-2">
                                    <a href="{{ route('dashboard') }}" class="btn btn-light"><i
                                            class="fe fe-arrow-left"></i>
                                        Dashboard</a>
                                    <a href="{{ route('user.form') }}" class="btn btn-primary"><i class="fe fe-plus"></i>
                                        New User</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-nowrap" id="example1"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Action</th>
                                            <th class="wd-15p border-bottom-0">Name</th>
                                            <th class="wd-15p border-bottom-0">email (Username)</th>
                                            <th class="wd-20p border-bottom-0">Created At</th>
                                            <th class="wd-15p border-bottom-0">Updated At</th>
                                            <th class="wd-15p border-bottom-0">Type</th>
                                            <th class="wd-15p border-bottom-0">Shipping Line</th>
                                            <th class="wd-15p border-bottom-0">Status</th>
                                            <th class="wd-15p border-bottom-0">Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-light btn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Options <i
                                                                class="fa fa-angle-down"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.profile-edit', ['email' => $user->email]) }}"><i
                                                                    class="fe fe-eye mr-2"></i> View</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.reset.password', ['email' => $user->email]) }}"><i
                                                                    class="fe fe-refresh-ccw mr-2"></i> Reset Password</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.delete', ['email' => $user->email]) }}"><i
                                                                    class="fe fe-trash mr-2"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->updated_at }}</td>

                                                @if ($user->type == 1)
                                                    <td><span class="badge badge-primary badge-pill">Administrator</span>
                                                    </td>
                                                @elseif ($user->type == 2)
                                                    <td><span class="badge badge-info badge-pill">Standard</span></td>
                                                @else
                                                    <td><span class="badge badge-warning badge-pill">Unknown</span></td>
                                                @endif

                                                <td>{{ $user->shipping_line }}</td>

                                                {{-- 0 = Inactive, 1 = Active, 2 = New Request --}}
                                                @if ($user->status == 0)
                                                    <td><span class="badge badge-secondary badge-pill">Inactive</span></td>
                                                @elseif ($user->status == 1)
                                                    <td><span class="badge badge-success badge-pill">Active</span></td>
                                                @elseif ($user->status == 2)
                                                    <td><span class="badge badge-light badge-pill">Request</span></td>
                                                @endif


                                                <td>{{ $user->note }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- END DATA TABLE --}}


                    @include('layouts.main-footer')

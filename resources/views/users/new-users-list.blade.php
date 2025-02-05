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
                        <h4 class="page-title">Pending Users Requests</h4>
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

                                        @foreach ($newUserRequests as $newUserRequest)
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-light btn-sm"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Options <i
                                                                class="fa fa-angle-down"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.activate', ['email' => $newUserRequest->email]) }}"><i
                                                                    class="fe fe-edit mr-2"></i> Activate User</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.reject', ['email' => $newUserRequest->email]) }}"><i
                                                                    class="fe fe-slash mr-2"></i>Reject User</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.delete', ['email' => $newUserRequest->email]) }}"><i
                                                                    class="fe fe-trash mr-2"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>{{ $newUserRequest->name }}</td>
                                                <td>{{ $newUserRequest->email }}</td>
                                                <td>{{ $newUserRequest->created_at }}</td>
                                                <td>{{ $newUserRequest->updated_at }}</td>

                                                @if ($newUserRequest->type == 1)
                                                    <td><span class="badge badge-primary badge-pill">Administrator</span>
                                                    </td>
                                                @elseif ($newUserRequest->type == 2)
                                                    <td><span class="badge badge-info badge-pill">Standard</span></td>
                                                @else
                                                    <td><span class="badge badge-warning badge-pill">Unknown</span></td>
                                                @endif

                                                <td>{{ $newUserRequest->shipping_line }}</td>

                                                {{-- 0 = Inactive, 1 = Active, 2 = New Request --}}
                                                @if ($newUserRequest->status == 0)
                                                    <td><span class="badge badge-secondary badge-pill">Inactive</span></td>
                                                @elseif ($newUserRequest->status == 1)
                                                    <td><span class="badge badge-success badge-pill">Active</span></td>
                                                @elseif ($newUserRequest->status == 2)
                                                    <td><span class="badge badge-light badge-pill">Request</span></td>
                                                @endif


                                                <td>{{ $newUserRequest->note }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- END DATA TABLE --}}


                    @include('layouts.main-footer')

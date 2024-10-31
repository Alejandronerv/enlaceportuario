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

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-nowrap" id="example1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Name</th>
                                            <th class="wd-15p border-bottom-0">email (Username)</th>
                                            <th class="wd-20p border-bottom-0">Created At</th>
                                            <th class="wd-15p border-bottom-0">Updated At</th>
                                            <th class="wd-15p border-bottom-0">Type</th>
                                            <th class="wd-15p border-bottom-0">Shipping Line</th>
                                            <th class="wd-15p border-bottom-0">Status</th>
                                            <th class="wd-15p border-bottom-0">Notes</th>
                                            <th class="wd-15p border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
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
                                                @elseif ($user->type == 1)
                                                    <td><span class="badge badge-success badge-pill">Active</span></td>
                                                @elseif ($user->type == 2)
                                                    <td><span class="badge badge-light badge-pill">Request</span></td>
                                                @endif

                                                
                                                <td>{{ $user->note }}</td>
                                                <td> </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- END DATA TABLE --}}


                    @include('layouts.main-footer')

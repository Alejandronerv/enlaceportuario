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
                @include('layouts.headers.page-header')
                <!--End Page header-->

                {{-- DATA TABLE --}}
                @section('content')

                    <div class="card">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert"><button type="button" class="close"
                                    data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> {{ session('success') }}
                            </div>
                        @endif

                        <div class="card-body">

                            <div class="form-group mb-0 mt-4 row">
                                <div class="col mb-4">
                                    <a href="{{ url()->previous() }}" class="btn btn-light"><i class="fe fe-arrow-left"></i>
                                        Back</a>
                                    <a href="{{ route('announcements.create') }}" class="btn btn-primary"><i
                                            class="fe fe-plus"></i>New Announcement</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-nowrap" id="example1"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Title</th>
                                            <th class="wd-15p border-bottom-0">Available Date</th>
                                            <th class="wd-20p border-bottom-0">End Date</th>
                                            <th class="wd-15p border-bottom-0">Create by</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($announcements as $announcement)
                                            <tr>
                                                <td>{{ $announcement->anncsTitle }}</td>
                                                <td>{{ $announcement->availableDateTime }}</td>
                                                <td>{{ $announcement->endDateTime }}</td>
                                                <td>{{ $announcement->createUser }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- END DATA TABLE --}}


                    @include('layouts.main-footer')

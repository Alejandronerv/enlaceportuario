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

    <div class="card-body">
        
        <div class="form-group mb-0 mt-4 row">
            <div class="col-md-9">
                <a href="{{ route('announcements.create') }}" class="btn btn-primary">+ Add New Announcement</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered text-nowrap" id="example1">
                <thead>
                    <tr>
                        <th class="wd-15p border-bottom-0">Title</th>
                        <th class="wd-15p border-bottom-0">Available Date</th>
                        <th class="wd-20p border-bottom-0">End Date</th>
                        <th class="wd-15p border-bottom-0">Create by</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($announcements as $announcement)
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
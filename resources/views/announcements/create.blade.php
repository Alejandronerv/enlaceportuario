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

                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('announcement.save') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputTitle" class="col-md-3 form-label">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Announcement Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAvailableDate" class="col-md-3 form-label">Available Date</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" id="inputAvailableDate" name="inputAvailableDate" placeholder="Available Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAvailableTime" class="col-md-3 form-label">Available Time</label>
                                    <div class="col-md-9">
                                        <input type="time" class="form-control" id="inputAvailableTime" name="inputAvailableTime" placeholder="Available Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEndDate" class="col-md-3 form-label">End Date</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" id="inputEndDate" name="inputEndDate" placeholder="End Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEndTime" class="col-md-3 form-label">End Time</label>
                                    <div class="col-md-9">
                                        <input type="time" class="form-control" id="inputEndTime" name="inputEndTime" placeholder="End Date">
                                    </div>
                                </div>

                                <div class="row row-cards">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <textarea class="content" name="inputBody"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 mt-4 row">
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                        <button type="submit" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



@include('layouts.main-footer')
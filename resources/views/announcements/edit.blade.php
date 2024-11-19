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
                        <h4 class="page-title">Edit Announcement</h4>
                    </div>
                </div>
                <!--End Page header-->

                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert"><button type="button" class="close"
                            data-dismiss="alert" aria-hidden="true">×</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="fa fa-check-circle-o mr-2" aria-hidden="true">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-body">

                            <div class="form-group mb-0 mt-4 row">
                                <div class="col mb-2">
                                    <a href="{{ url()->previous() }}" class="btn btn-light"><i class="fe fe-arrow-left"></i>
                                        Back</a>
                                </div>
                            </div>

                            <form class="form-horizontal" action="{{ route('announcement.update') }}" method="get">
                                @csrf
                                <input type="hidden" name="inputId" value="{{ $announcement->anncsID }}">
                                <div class="form-group row">
                                    <label for="inputTitle" class="col-md-3 form-label">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="{{ $announcement->anncsTitle }}"  placeholder="Announcement Title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAvailableDate" class="col-md-3 form-label">Available Date</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" id="inputAvailableDate" name="inputAvailableDate" value="{{ \Carbon\Carbon::parse($announcement->availableDateTime)->format('Y-m-d') }}" placeholder="Available Date" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAvailableTime" class="col-md-3 form-label">Available Time</label>
                                    <div class="col-md-9">
                                        <input type="time" class="form-control" id="inputAvailableTime" name="inputAvailableTime" placeholder="Available Time" value="{{ \Carbon\Carbon::parse($announcement->availableDateTime)->format('H:i') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEndDate" class="col-md-3 form-label">End Date</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" id="inputEndDate" name="inputEndDate" placeholder="End Date" value="{{ \Carbon\Carbon::parse($announcement->endDateTime)->format('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEndTime" class="col-md-3 form-label">End Time</label>
                                    <div class="col-md-9">
                                        <input type="time" class="form-control" id="inputEndTime" name="inputEndTime" placeholder="End Date" value="{{ \Carbon\Carbon::parse($announcement->endDateTime)->format('H:i') }}" required>
                                    </div>
                                </div>

                                <div class="row row-cards">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <textarea class="content" name="inputBody" required>{{ $announcement->anncsBody }}</textarea>
                                            </div>
                                        </div>
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



@include('layouts.main-footer')
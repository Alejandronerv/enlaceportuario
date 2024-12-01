<?php

//$latestInventoryYardFile = Session::get('archivo');

$latestInventoryYardFile = latestRecordYardInventory();
$latestDensityForeCast = latestDensityForecast();

?>
@include('layouts.main-header');
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
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
                <!--End Page header-->

                @if (session('error'))
                    <div class="alert alert-danger" role="alert"><button type="button" class="close"
                            data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Inventory Yard Files Link -->
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card overflow-hidden">
                            <img src="{{ asset('images/photos/yard-inventory.jpg') }}" alt="image">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Inventory Yard</h5>
                                <p class="card-text">Obtain the newest inventory yard data file.</p>
                                <a href="{{ asset('storage/uploads/' . $latestInventoryYardFile) }}"
                                    class="btn btn-primary"><i class="fe fe-download mr-2"></i>Get Latest</a>
                                <a href="{{ route('yardinventory.list-inventory-yard') }}" class="btn btn-info"><i
                                        class="fe fe-list mr-2"></i>All Files</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card overflow-hidden">
                            <img src="{{ asset('images/photos/forecast.jpg') }}" alt="image">
                            <div class="card-body">
                                <h5 class="card-title mb-3">CCT Density Forecast</h5>
                                <p class="card-text">CCT density forecast 7 days projection.</p>
                                <a href="{{ asset('storage/uploads/' . $latestDensityForeCast) }}"
                                    class="btn btn-primary"><i class="fe fe-download mr-2"></i>Get Latest</a>
                                <a href="{{ route('yardinventory.list-density-forecast') }}" class="btn btn-info"><i
                                        class="fe fe-list mr-2"></i>All Files</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card overflow-hidden">
                            <img src="{{ asset('images/photos/berth.jpg') }}" alt="image">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Operation Berth</h5>
                                <p class="card-text">Berth Operation Schedule.</p>
                                {{-- <a href="{{ asset('storage/uploads/'. $latestDensityForeCast) }}" class="btn btn-primary"><i class="fe fe-download mr-2"></i>Get Latest</a> --}}
                                <a href="{{ route('berth.table') }}" class="btn btn-primary"><i
                                        class="fe fe-anchor mr-2"></i>View Berth</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End-->

                <!-- Announcements List -->
                @include('announcements.list')
                <!--Announcements End List-->




            </div>
        </div><!-- end app-content-->
    </div>

    @include('layouts.main-footer')

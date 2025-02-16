@include('layouts.main-header')
<meta http-equiv="Access-Control-Allow-Origin" content="*">
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
                        <h4 class="page-title">Operation Berth</h4>
                    </div>
                </div>
                <!--End Page header-->

                {{-- DATA TABLE --}}
                @section('content')
                <!-- Start::row-1 -->
                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Graphic Berth</div>
                            </div>
                            <div class="card-body">
                                <div id="timeline-advanced"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->
               
                    {{-- END DATA TABLE --}}


                    @include('layouts.main-footer')

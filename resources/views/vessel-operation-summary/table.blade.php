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
                        <h4 class="page-title">Vessel Operation Summary</h4>
                    </div>
                </div>
                <!--End Page header-->

                {{-- DATA TABLE --}}
                @section('content')

                    <div class="card">

                        <div class="card-body">

                            <div class="form-group mb-0 mt-4 row">
                                <div class="col mb-2">
                                    <a href="{{ url()->previous() }}" class="btn btn-light"><i class="fe fe-arrow-left"></i>
                                        Back</a>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-nowrap" id="example1"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Vessel Name</th>
                                            <th class="wd-15p border-bottom-0">Comm</th>
                                            <th class="wd-20p border-bottom-0">TTl</th>
                                            <th class="wd-15p border-bottom-0">Disg</th>
                                            <th class="wd-15p border-bottom-0">Load</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($veselFields as $veselField)
                                            <tr>
                                                <td>{{ $veselField->PO_VESSEL_NAME }}</td>
                                                <td>{{ $veselField->PO_COMM_DATE_TIME }}</td>
                                                <td>{{ $veselField->PO_TTL_VALUE }}</td>
                                                <td>{{ $veselField->PO_DISG_VALUE }}</td>
                                                <td>{{ $veselField->PO_LOAD_VALUE }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- END DATA TABLE --}}


                    @include('layouts.main-footer')

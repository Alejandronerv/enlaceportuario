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
                        <h4 class="page-title">Vessel Info</h4>
                    </div>
                </div>
                <!--End Page header-->

                {{-- DATA TABLE --}}
                @section('content')

                    <div class="card">

                        <div class="card-body">

                            <div class="form-group mb-0 mt-4 row">
                                <div class="col mb-2">
                                    <a href="{{ route('vessel-operation-summary.table')}}" class="btn btn-light"><i class="fe fe-arrow-left"></i>
                                        Back</a>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-nowrap key-buttons" id="example"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Vessel Code</th>
                                            <th class="wd-15p border-bottom-0">Arr Voyage</th>
                                            <th class="wd-20p border-bottom-0">Dep Voyage</th>
                                            <th class="wd-15p border-bottom-0">Berth ID</th>
                                            <th class="wd-15p border-bottom-0">ETA Date</th>
                                            <th class="wd-15p border-bottom-0">ETB Date</th>
                                            <th class="wd-15p border-bottom-0">ATB Date</th>
                                            <th class="wd-15p border-bottom-0">Commence Date</th>
                                            <th class="wd-15p border-bottom-0">Complete Date</th>
                                            <th class="wd-15p border-bottom-0">ETD Date</th>
                                            <th class="wd-15p border-bottom-0">ATD Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($veselInfoFields as $veselInfoField)
                                            <tr>
                                                <td>{{ $veselInfoField->PO_VESSEL_CODE }}</td>
                                                <td>{{ $veselInfoField->PO_ARR_VOYAGE }}</td>
                                                <td>{{ $veselInfoField->PO_DEP_VOYAGE }}</td>
                                                <td>{{ $veselInfoField->PO_BERTH_ID }}</td>
                                                <td>{{ $veselInfoField->PO_ETA_DATE }}</td>
                                                <td>{{ $veselInfoField->PO_ETB_DATE }}</td>
                                                <td>{{ $veselInfoField->PO_ATB_DATE }}</td>
                                                <td>{{ $veselInfoField->PO_COMMENCE_DATE }}</td>
                                                <td>{{ $veselInfoField->PO_COMPLETE_DATE }}</td>
                                                <td>{{ $veselInfoField->PO_ETD_DATE }}</td>
                                                <td>{{ $veselInfoField->PO_ATD_DATE }}</td>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- END DATA TABLE --}}


                    @include('layouts.main-footer')

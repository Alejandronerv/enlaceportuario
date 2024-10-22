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
    
        <div class="table-responsive">
            <table class="table table-bordered text-nowrap" id="example1">
                <thead>
                    <tr>
                        <th class="wd-15p border-bottom-0">Vessel Name</th>
                        <th class="wd-15p border-bottom-0">Type</th>
                        <th class="wd-20p border-bottom-0">Shipping Line</th>
                        <th class="wd-15p border-bottom-0">Arr Date</th>
                        <th class="wd-15p border-bottom-0">Arr Time</th>
                        <th class="wd-15p border-bottom-0">Dep Date</th>
                        <th class="wd-15p border-bottom-0">Dep Time</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($containerFields as $containerField)
                        <tr>
                            <td>{{ $containerField->PO_VESSEL_NAME }}</td>
                            <td>{{ $containerField->PO_VESSEL_NAME }}</td>
                            <td>{{ $containerField->PO_VESSEL_NAME }}</td>
                            <td>{{ $containerField->PO_VESSEL_NAME }}</td>
                            <td>{{ $containerField->PO_VESSEL_NAME }}</td>
                            <td>{{ $containerField->PO_VESSEL_NAME }}</td>
                            <td>{{ $containerField->PO_VESSEL_NAME }}</td>


                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- END DATA TABLE --}}


@include('layouts.main-footer')
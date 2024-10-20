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
                        <th class="wd-15p border-bottom-0">Berth</th>
                        <th class="wd-15p border-bottom-0">PS</th>
                        <th class="wd-20p border-bottom-0">Vessel Name</th>
                        <th class="wd-15p border-bottom-0">Vessel Code</th>
                        <th class="wd-15p border-bottom-0">Arr Voyage</th>
                        <th class="wd-15p border-bottom-0">Dep Voyage</th>
                        <th class="wd-15p border-bottom-0">ETA Date</th>
                        <th class="wd-15p border-bottom-0">ETB Date</th>
                        <th class="wd-15p border-bottom-0">ETD Date</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($berthFields as $berthField)
                        <tr>
                            <td>{{ $berthField->PO_BERTH_ID }}</td>
                            <td>{{ $berthField->PO_BERTH_ID }}</td>
                            <td>{{ $berthField->PO_BERTH_ID }}</td>
                            <td>{{ $berthField->PO_BERTH_ID }}</td>
                            <td>{{ $berthField->PO_BERTH_ID }}</td>
                            <td>{{ $berthField->PO_BERTH_ID }}</td>
                            <td>{{ $berthField->PO_BERTH_ID }}</td>
                            <td>{{ $berthField->PO_BERTH_ID }}</td>
                            <td>{{ $berthField->PO_BERTH_ID }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- END DATA TABLE --}}


@include('layouts.main-footer')
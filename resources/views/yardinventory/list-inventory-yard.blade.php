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
                        <h4 class="page-title">List</h4>
                    </div>
                </div>
                <!--End Page header-->

                {{-- DATA TABLE --}}
                @section('content')

                    <div class="card">

                        <div class="card-body">

                            <div class="form-group mb-0 mt-4 row">
                                <div class="col mb-2">
                                    <a href="{{ route('dashboard') }}" class="btn btn-light"><i
                                            class="fe fe-arrow-left"></i>
                                        Dashboard</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-nowrap" id="example1"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">File Name</th>
                                            <th class="wd-15p border-bottom-0">Created At</th>
                                            <th class="wd-15p border-bottom-0">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($listinventoryyardfiles as $listinventoryyardfile)
                                            <tr>
                                                <td> <a
                                                        href="{{ asset('storage/uploads/' . $listinventoryyardfile->file_name) }}">{{ $listinventoryyardfile->file_name }}</a>
                                                </td>
                                                <td>{{ $listinventoryyardfile->created_at }}</td>
                                                
                                                @if ($listinventoryyardfile->file_type == 'IY')
                                                    <td><span class="badge badge-primary badge-pill">Inventory Yard</span>
                                                    </td>
                                                @elseif ($listinventoryyardfile->file_type == 'DF')
                                                    <td><span class="badge badge-info badge-pill">CCT Density
                                                            Forecast</span></td>
                                                @else
                                                    <td><span class="badge badge-warning badge-pill">Unknown</span></td>
                                                @endif

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- END DATA TABLE --}}


                    @include('layouts.main-footer')

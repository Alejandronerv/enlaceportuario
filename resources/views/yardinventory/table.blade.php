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
                        <h4 class="page-title">Daily In Yard Utilization Files</h4>
                    </div>
                </div>
                <!--End Page header-->

                {{-- DATA TABLE --}}
                @section('content')

                    <div class="card">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert"><button type="button" class="close"
                                    data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> {{ session('success') }}
                            </div>
                        @endif

                        <div class="card-body">

                            <div class="form-group mb-0 mt-4 row">
                                <div class="col mb-2">
                                    {{-- <a href="{{ route('yardinventory.form') }}" class="btn btn-primary">+ Upload File</a> --}}
                                    <a href="{{ url()->previous() }}" class="btn btn-light"><i class="fe fe-arrow-left"></i>
                                        Back</a>
                                    <a href="{{ route('yardinventory.form') }}" class="btn btn-primary"><i
                                            class="fe fe-plus"></i> Upload New File</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-nowrap" id="example1"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">File Name</th>
                                            <th class="wd-15p border-bottom-0">Created At</th>
                                            <th class="wd-20p border-bottom-0">Agency</th>
                                            <th class="wd-15p border-bottom-0">Upload by</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($inventoryyardfile as $yardinventory)
                                            <tr>
                                                <td> <a
                                                        href="{{ asset('storage/uploads/' . $yardinventory->file_name) }}">{{ $yardinventory->file_name }}</a>
                                                </td>
                                                <td>{{ $yardinventory->created_at }}</td>
                                                <td>{{ $yardinventory->agency_code }}</td>
                                                <td>{{ $yardinventory->create_user }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- END DATA TABLE --}}


                    @include('layouts.main-footer')

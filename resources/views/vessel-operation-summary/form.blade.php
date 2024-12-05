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
                        <h4 class="page-title">Vessel Information Summary</h4>
                    </div>
                </div>
                <!--End Page header-->

                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group mb-0 mt-4 row">
                                <div class="col mb-2">
                                    <a href="{{ route('dashboard') }}" class="btn btn-light"><i
                                            class="fe fe-arrow-left"></i>
                                        Dashboard</a>
                                </div>
                            </div>

                            <form class="form-horizontal" action="{{ route('vessel-operation-summary.table') }}"
                                method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputYearMonth" class="col-md-3 form-label">Year-Month</label>
                                    <div class="col-md-9">
                                        <input type="month" class="form-control" id="inputYearMonth"
                                            name="inputYearMonth" required>
                                    </div>
                                </div>


                                <div class="form-group mb-0 mt-4 row">
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Loading indicator -->
                            <div id="loadingIndicator" style="display: none;">
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                @include('layouts.main-footer')

                <script>
                    document.getElementById('searchForm').addEventListener('submit', function() {
                        document.getElementById('searchButton').disabled = true;
                        document.getElementById('loadingIndicator').style.display = 'block';
                    });
                </script>

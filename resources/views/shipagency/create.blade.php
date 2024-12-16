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

                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert"><button type="button" class="close"
                                    data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> {{ session('success') }}
                            </div>
                        @endif


                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert"><button type="button" class="close"
                                    data-dismiss="alert" aria-hidden="true">×</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="fa fa-check-circle-o mr-2" aria-hidden="true">{{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-body">

                            <div class="form-group mb-0 mt-4 row">
                                <div class="col mb-2">
                                    <a href="{{ url()->previous() }}" class="btn btn-light"><i
                                            class="fe fe-arrow-left"></i>
                                        Back</a>
                                </div>
                            </div>

                            <form class="form-horizontal" action="{{ route('shipagency.store') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputTitle" class="col-md-3 form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Ship Agency Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAvailableDate" class="col-md-3 form-label">Codes</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="code" name="code"
                                            placeholder="Ship Agency Code" required>
                                    </div>
                                </div>

                                <div class="form-group mb-0 mt-4 row">
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                @include('layouts.main-footer')

@include('layouts.main-header')
@section('content')
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
		<!-- Row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card overflow-hidden">
           
                    <div class="card-body">
                        <div class="item7-card-desc d-md-flex mb-5">
                            <a class="d-flex mr-3 mb-2"><svg class="svg-icon mr-2" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"/><path d="M4 5.01h16V8H4z" opacity=".3"/></svg><div class="mt-0">{{ $announcement->availableDateTime }}</div></a>
                        </div>
                        <a class="mt-4"><h5 class="font-weight-semibold">{{ $announcement->anncsTitle }}</h5></a>
                        {!! $announcement->anncsBody !!}
                        <div class="media py-3 mt-0 border-top">

                        </div>
                    </div>
                </div>

                <!--Comments-->
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">3 Comments</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-sm-flex mt-0 p-5 sub-review-section border border-bottom-0 br-bl-0 br-br-0">
                            <div class="d-flex mr-3">
                                <a href="#"><img class="media-object brround avatar-md" alt="64x64" src="../../assets/images/users/1.jpg"> </a>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-weight-semibold">Joanne Scott
                                    <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                    <span class="fs-14 ml-2"> 4.5 <i class="fa fa-star text-yellow"></i></span>
                                </h5>
                                <p class="font-13  mb-2 mt-2">
                                   Lorem ipsum dolor sit amet, quis Neque porro quisquam est, nostrud exercitation ullamco laboris   commodo consequat.
                                </p>
                                <a href="#" class="mr-2 mt-1"><span class="badge badge-primary">Helpful</span></a>
                                <a href="" class="mr-2 mt-1" data-toggle="modal" data-target="#Comment"><span class="badge badge-light">Comment</span></a>
                                <a href="" class="mr-2 mt-1" data-toggle="modal" data-target="#report"><span class="badge badge-light">Report</span></a>
                                <div class="btn-group btn-group-sm mb-1 ml-auto float-sm-right mt-1">
                                    <button class="btn btn-light" type="button"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path><path d="M21 12v-2h-9l1.34-5.34L9 9v10h9z" opacity=".3"></path><path d="M9 21h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.58 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9V9zM1 9h4v12H1z"></path></svg></button>
                                    <button class="btn btn-light" type="button"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none" opacity=".87"/><path d="M3 12v2h8.77l-1.11 5.34L15 15V5H6z" opacity=".3"/><path d="M15 3H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 23l6.58-6.59c.37-.36.59-.86.59-1.41V5c0-1.1-.9-2-2-2zm0 12l-4.34 4.34L11.77 14H3v-2l3-7h9v10zm4-12h4v12h-4z"/></svg></button>
                                </div>
                            </div>
                        </div>
                        <div class="d-sm-flex p-5 sub-review-section border subsection-color br-tl-0 br-tr-0">
                            <div class="d-flex mr-3">
                                <a href="#"><img class="media-object brround avatar-md" alt="64x64" src="../../assets/images/users/2.jpg"> </a>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-weight-semibold">Rose Slater <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span></h5>
                                <p class="font-13  mb-2 mt-2">
                                    Lorem ipsum dolor sit amet nostrud exercitation ullamco laboris   commodo consequat.
                                </p>
                                <a href="" data-toggle="modal" data-target="#Comment" class="mt-1"><span class="badge badge-light">Comment</span></a>
                                <div class="btn-group btn-group-sm mb-1 ml-auto float-sm-right mt-1">
                                    <button class="btn btn-light" type="button"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path><path d="M21 12v-2h-9l1.34-5.34L9 9v10h9z" opacity=".3"></path><path d="M9 21h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.58 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9V9zM1 9h4v12H1z"></path></svg></button>
                                    <button class="btn btn-light" type="button"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none" opacity=".87"/><path d="M3 12v2h8.77l-1.11 5.34L15 15V5H6z" opacity=".3"/><path d="M15 3H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 23l6.58-6.59c.37-.36.59-.86.59-1.41V5c0-1.1-.9-2-2-2zm0 12l-4.34 4.34L11.77 14H3v-2l3-7h9v10zm4-12h4v12h-4z"/></svg></button>
                                </div>
                            </div>
                        </div>
                        <div class="d-sm-flex p-5 mt-4 border sub-review-section">
                            <div class="d-flex mr-3">
                                <a href="#"><img class="media-object brround avatar-md" alt="64x64" src="../../assets/images/users/3.jpg"> </a>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-weight-semibold">Edward
                                <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                <span class="fs-14 ml-2"> 4 <i class="fa fa-star text-yellow"></i></span>
                                </h5>
                                <p class="font-13  mb-2 mt-2">
                                   Lorem ipsum dolor sit amet, quis Neque porro quisquam est, nostrud exercitation ullamco laboris   commodo consequat.
                                </p>
                                <a href="#" class="mr-2 mt-1"><span class="badge badge-primary">Helpful</span></a>
                                <a href="" class="mr-2 mt-1" data-toggle="modal" data-target="#Comment"><span class="badge badge-light">Comment</span></a>
                                <a href="" class="mr-2 mt-1" data-toggle="modal" data-target="#report"><span class="badge badge-light">Report</span></a>
                                <div class="btn-group btn-group-sm mb-1 ml-auto float-sm-right mt-1">
                                    <button class="btn btn-light" type="button"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path><path d="M21 12v-2h-9l1.34-5.34L9 9v10h9z" opacity=".3"></path><path d="M9 21h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.58 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9V9zM1 9h4v12H1z"></path></svg></button>
                                    <button class="btn btn-light" type="button"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none" opacity=".87"/><path d="M3 12v2h8.77l-1.11 5.34L15 15V5H6z" opacity=".3"/><path d="M15 3H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 23l6.58-6.59c.37-.36.59-.86.59-1.41V5c0-1.1-.9-2-2-2zm0 12l-4.34 4.34L11.77 14H3v-2l3-7h9v10zm4-12h4v12h-4z"/></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--/Comments-->

                {{-- <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Add a Comment</h3>
                    </div>
                    <div class="card-body">
                        <div class="mt-2">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name1" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Write Review"></textarea>
                            </div>
                            <a href="#" class="btn btn-primary">Send Reply</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!--End Row-->

                @include('layouts.main-footer')
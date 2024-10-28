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
                        <h4 class="page-title">Container Information</h4>
                    </div>
                </div>
                <!--End Page header-->
                <body class="h-100vh page-style1 light-mode">

                    <div class="page relative">
                        <div class="page-content">
                            <div class="container text-center">
                                <div class="display-1 text-primary mb-5 font-weight-bold">400</div>
                                <h1 class="h3  mb-3 font-weight-bold">Bad Request Error!</h1>
                                <p class="h5 font-weight-normal mb-7 leading-normal">You may have mistyped the address or the page may have moved.</p>
                                <a class="btn btn-primary" href="index.html"><i class="fe fe-arrow-left-circle mr-1"></i>Back to Home</a>
                            </div>
                        </div>
                    </div>

                    @include('layouts.main-footer')                   
@include('layouts.header')

<body class="h-100vh page-style1 light-mode">
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-md-7 col-lg-5">
                                <div class="card card-group mb-0">
                                    <div class="card p-4">

                                        @if (session('success'))
                                            <div class="alert alert-success" role="alert"><button type="button"
                                                    class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if (session('error'))
                                            <div class="alert alert-danger" role="alert"><button type="button"
                                                    class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger" role="alert"><button type="button"
                                                    class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>
                                                @foreach ($errors->all() as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="card-body">
                                            <div class="text-center title-style mb-6">
                                                <h1 class="mb-2">Reset Password</h1>
                                                <hr>
                                            </div>


                                            <form class="form-horizontal" action="{{ route('user.save') }}"
                                                method="post">
                                                @csrf
                                                <div class="input-group mb-4">
                                                    <span class="input-group-addon" ><i class="fa fa-hashtag" data-toggle="tooltip" title="" data-original-title="fa fa-hashtag"></i></span>
                                                    <input type="text" class="form-control" name="token"
                                                        id="token" placeholder="TOKEN">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <span class="input-group-addon"><svg class="svg-icon"
                                                            xmlns="http://www.w3.org/2000/svg" height="24"
                                                            viewBox="0 0 24 24" width="24">
                                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                                            <path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z"
                                                                opacity=".3" />
                                                            <circle cx="12" cy="8" opacity=".3"
                                                                r="2" />
                                                            <path
                                                            d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" />
                                                        </svg></span>
                                                    <input type="text" name="password" id="password"
                                                        class="form-control" placeholder="New Password">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <span class="input-group-addon"><svg class="svg-icon"
                                                            xmlns="http://www.w3.org/2000/svg" height="24"
                                                            viewBox="0 0 24 24" width="24">
                                                            <path d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                            d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" />

                                                        </svg></span>
                                                    <input type="text" class="form-control" name="repeatPassword"
                                                        id="repeatPassword" placeholder="Repeat New Password">
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit"
                                                            class="btn  btn-lg btn-primary btn-block px-4"><i
                                                                class="fe fe-arrow-right"></i> Reset Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@include('layouts.footer')

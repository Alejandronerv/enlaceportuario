@include('layouts.header')


	<body class="h-100vh page-style1 light-mode">
		<div class="page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col mx-auto">
							<div class="row justify-content-center">
								<div class="col-md-5">
									<div class="card card-group mb-0">
										<div class="card p-4">
											<div class="card-body">
												<div class="text-center title-style mb-6">
													<h1 class="mb-2">Forgot Password</h1>
													<hr>
												</div>
												<div class="input-group mb-4">
													<span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg></span>
													<input type="text" class="form-control" placeholder="Enetr Email">
												</div>
												<div class="row">
													<div class="col-12">
														<button type="button" class="btn  btn-lg btn-primary btn-block px-4"><i class="fe fe-arrow-right"></i> Send</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="text-center pt-4">
										<div class="font-weight-normal fs-16">Forget it <a class="btn-link font-weight-normal" href="{{ route('login') }}">Send me back</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Jquery js-->
		<script src="../../assets/js/vendors/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="../../assets/plugins/bootstrap/popper.min.js"></script>
		<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Othercharts js-->
		<script src="../../assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!-- Circle-progress js-->
		<script src="../../assets/js/vendors/circle-progress.min.js"></script>

		<!-- Jquery-rating js-->
		<script src="../../assets/plugins/rating/jquery.rating-stars.js"></script>

	</body>

@include('layouts.footer')

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
								<h4 class="page-title">Dashboard</h4>
							</div>
						</div>
						<!--End Page header-->
		

	<!-- Announcements List -->
	@include('announcements.list')
	<!--Announcements End List-->




					</div>
				</div><!-- end app-content-->
			</div>

@include('layouts.main-footer')
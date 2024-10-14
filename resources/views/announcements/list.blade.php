	<!-- Announcements Row -->
	@section('content')
	<div class="row">

		{{-- Star here --}}
		@foreach($announcements as $announcement)
		<div class="col-xl-4 col-lg-6 col-md-12">
			<div class="card overflow-hidden">
				<div class="card-body">
					<div class="item7-card-desc d-flex mb-5">
						<a class="d-flex"><svg class="svg-icon mr-2" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"/><path d="M4 5.01h16V8H4z" opacity=".3"/></svg><div class="mt-0">{{ $announcement->availableDateTime }}</div></a>
					</div>
					<a href="{{ route('announcements.post',['anncsID' => $announcement->anncsID]) }}" class="mt-4"><h5 class="font-weight-semibold">{{ $announcement->anncsTitle }}</h5></a>
					{{-- <p>{{ $announcement->anncsBody }} </p> --}}
				</div>
				<div class="card-body">
					<div class="d-flex align-items-center mt-auto">
						{{-- <div class="avatar brround avatar-md mr-3" style="background-image: url(../../assets/images/users/16.jpg)"></div> --}}
						<div>
							<a class="font-weight-semibold">Operation Department</a>
							{{-- <small class="d-block text-muted">2 days ago</small> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		{{-- End Here --}}

		
	</div>
	<!--Announcements End Row-->
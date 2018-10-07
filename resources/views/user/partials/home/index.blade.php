@extends('user.layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div class="mr-2">
								<img src="{{ ($user->avatar) ? asset($user->avatar) :  'http://unmr-nl.science.uu.nl/sites/default/files/user_placeholder_man_0.jpg' }}" class="profile-pic img-fluid" width="50" alt="">
							</div>
							<div class="">
								<h4>{{ $user->fullName }}</h4>
								<span>{{ $user->cv->occupation }}</span>
							</div>
						</div>
						<hr>
						<div class="">
							<h5>Completa tu perfil</h5>
							<div class="progress">
							  	<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				@include('user.partials.home.searchJob')
				@include('user.partials.home.vacantsRelatedMyProfile')	
			</div>
		</div>
	</div>
@endsection
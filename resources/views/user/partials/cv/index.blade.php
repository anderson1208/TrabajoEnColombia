@extends('user.layouts.app')

@section('css')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				@include('user.partials.cv.personalInformation')
				@include('user.partials.cv.address')
				@include('user.partials.cv.professionalProfile')
				@include('user.partials.cv.formation')
				@include('user.partials.cv.workExperiences')
			</div>
			<div class="col-md-4">
				@include('user.partials.cv.avatar')
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/messages/messages.es-es.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.es.min.js"></script>
	
	<script>
		$('.datepicker').datepicker({
		    language: "es",
		    format: "yyyy-mm-dd"
		});
	</script>
	@yield('personalInformation')
	@yield('address')
	@yield('professionalProfile')
	@yield('education')
	@yield('workExperience')
	@yield('avatar')
@endsection
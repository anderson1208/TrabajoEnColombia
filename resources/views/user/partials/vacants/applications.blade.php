@extends('user.layouts.app')

@section('breadcumb')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Aplicaciones</li>
	    
	  </ol>
	</nav>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h3>Mis aplicaciones</h3>
			@if(count($vacants) > 0)
				@foreach($vacants as $vacant)
					<div class="bg-white p-3 border shadow-sm rounded mb-3">
						<div class="d-flex align-items-center">
							<div class="d-flex flex-column w-50">
								<h4> {{ $vacant->title }} </h4>
								<span> {{ $vacant->company->name }} </span>
								<span class="text-muted">Buenaventura, valle</span>
							</div>
							<div class="" >
								@foreach($vacanStates as $vacantState)
								<span class="p-2 border rounded" style="{{$vacant->pivot->getStyleState($vacantState)}}"> {{ $vacantState->name }}</span>
								@endforeach
							</div>
							<div class="">
								<a href="{{url("/user/vacants/{$vacant->id}")}}" class="btn btn-primary ml-2">
									<span class="d-block" style="font-size: 0.6rem;"> {{ $vacant->totaUsersText() }} </span>
									<span>Ver comparación</span>
								</a>
							</div>
						</div>
					</div>
				@endforeach
			@endif
		</div>
	</div>
@endsection
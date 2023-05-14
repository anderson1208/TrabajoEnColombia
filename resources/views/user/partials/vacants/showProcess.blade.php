@extends('user.layouts.app')

@section('breadcumb')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="#">Vacantes</a></li>
	    <li class="breadcrumb-item"><a href="">{{ $vacant->vacant->areaWork->name }}</a></li>
	    <li class="breadcrumb-item active" aria-current="page">{{ $vacant->vacant->title }}</li>
	  </ol>
	</nav>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="bg-white p-3 shadow-sm border rounded mb-2">
				@foreach($vacantStates as $vacantState)
				<span class="p-2 border rounded" style="{{$vacant->getStyleState($vacantState)}}">{{ $vacantState->name }}</span>
				@endforeach
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div class="bg-white shadow-sm p-3 border rounded">
				<div class="vacant_header mb-2 border-bottom">
					<h3> {{$vacant->vacant->title}} </h3>
					<span>$ {{ number_format($vacant->vacant->salary, 2, ',', '.') }}</span> - 
					<span>{{ $vacant->vacant->created_at->diffForHumans() }}</span>
				</div>
				<div class="vacant_company d-flex flex-row mb-2 pb-2 border-bottom">
					<img src="https://via.placeholder.com/50x50" alt="">
					<div class="ml-3">
						<h5>{{ $vacant->vacant->company->name }} </h5>
						<div class="starts">
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
						</div>
					</div>
				</div>
				<div class="vacant_description mb-2">
					<h6><b>Descripción</b></h6>
					{!! $vacant->vacant->description !!}
				</div>
				<div class="mb-3">
					<div class="">
						<span><b>Cantidad de vacantes: </b></span>
						{{ $vacant->vacant->amount }}
					</div>
				</div>
				<div class="vacant_conditions">
					<h6><b>Condiciones</b></h6>
					<ul class="nav flex-column">
						<li class="ml-3">
							<span><b>Años de experiencia: </b></span>
							{{ $vacant->vacant->year_experiences }}
						</li>
						<li class="ml-3">
							<span><b>Educación minima: </b></span>
							{{ $vacant->vacant->educationLevel->name }}
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="bg-white p-3 border rounded">
				<div class="p-1 border-bottom mb-2">
					<h4>Resumen</h4>
				</div>
				<div class="mb-2">
					<div class="d-flex flex-column">
						<span class=""><b>Cargo</b></span>
						<span>{{ $vacant->vacant->title }}</span>
					</div>
					<div class="d-flex flex-column">
						<span class=""><b>Empresa</b></span>
						<span>{{ $vacant->vacant->company->name }}</span>
					</div>
					<div class="d-flex flex-column">
						<span class=""><b>Jornada</b></span>
						<span>{{ $vacant->vacant->workingDay->name }}</span>
					</div>
					<div class="d-flex flex-column">
						<span class=""><b>Tipo de contrato</b></span>
						<span>{{ $vacant->vacant->contractType->name }}</span>
					</div>
					<div class="d-flex flex-column">
						<span class=""><b>Salario</b></span>
						<span>$ {{ number_format($vacant->vacant->salary, 2, ',', '.') }} ({{ ucfirst($vacant->vacant->paymentInterval->name)}}) </span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		(function(){

		}())
	</script>
@endsection
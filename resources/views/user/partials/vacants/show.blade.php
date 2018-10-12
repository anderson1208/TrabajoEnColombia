@extends('user.layouts.app')

@section('breadcumb')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="#">Vacantes</a></li>
	    <li class="breadcrumb-item"><a href="">{{ $vacant->areaWork->name }}</a></li>
	    <li class="breadcrumb-item active" aria-current="page">{{ $vacant->title }}</li>
	  </ol>
	</nav>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-9">
			<div class="bg-white shadow-sm p-3 border rounded">
				<div class="vacant_header mb-2 border-bottom">
					<h3> {{$vacant->title}} </h3>
					<span>$ {{ number_format($vacant->salary, 2, ',', '.') }}</span> - 
					<span>{{ $vacant->created_at->diffForHumans() }}</span>
				</div>
				<div class="vacant_company d-flex flex-row mb-2 pb-2 border-bottom">
					<img src="https://via.placeholder.com/50x50" alt="">
					<div class="ml-3">
						<h5>{{ $vacant->company->name }} </h5>
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
					{!! $vacant->description !!}
				</div>
				<div class="vacant_conditions">
					<h6><b>Condiciones</b></h6>
					<ul class="nav flex-column">
						<li class="ml-3">Condition 1</li>
						<li class="ml-3">Condition 2</li>
						<li class="ml-3">Condition 3</li>
						<li class="ml-3">Condition 4</li>
						<li class="ml-3">Condition 5</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-3 bg-white p-3 border">
			<div class="p-1 border-bottom mb-2">
				<h4>Resumen</h4>
			</div>
			<div class="mb-2">
				<div class="d-flex flex-column">
					<span class=""><b>Cargo</b></span>
					<span>{{ $vacant->title }}</span>
				</div>
				<div class="d-flex flex-column">
					<span class=""><b>Empresa</b></span>
					<span>{{ $vacant->company->name }}</span>
				</div>
				<div class="d-flex flex-column">
					<span class=""><b>Jornada</b></span>
					<span>{{ $vacant->workingDay->name }}</span>
				</div>
				<div class="d-flex flex-column">
					<span class=""><b>Tipo de contrato</b></span>
					<span>{{ $vacant->contractType->name }}</span>
				</div>
				<div class="d-flex flex-column">
					<span class=""><b>Salario</b></span>
					<span>$ {{ number_format($vacant->salary, 2, ',', '.') }}</span>
				</div>
			</div>
			{!! Form::open(['url' => '/user/vacants', 'method', 'POST', 'id' => 'formApplyOffer']) !!}
				{!! Form::hidden('vacant_id', $vacant->id, []) !!}
				<button class="btn btn-primary btn-block" type="submit">Aplicar</button>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('js')
	<script>
		(function(){

			$("#formApplyOffer").submit(function(e){

				e.preventDefault();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					method: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					beforeSend: function(){
						form.find('button').text('Aplicando').prop('disabled', true);
					},
					success: function(data){
						form.find('button').text('Aplicar').prop('disabled', false);
						window.location.reload();
					},
					error: function(xhr){
						form.find('button').text('Aplicar').prop('disabled', false);
					}
				});
			});

		}())
	</script>
@endsection
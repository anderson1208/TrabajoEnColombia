@extends('user.layouts.app')

@section('breadcumb')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="#">Vacantes</a></li>
	  </ol>
	</nav>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3">
			<div class="">
				<h5>Filtros</h5>
			</div>
			@if(count($filters['filters']) > 0)
			<div class="bg-white p-3 border">
				@foreach($filters['filters'] as $filter)
				<div class="clearfix mb-2">
					<span class="float-left"> {{ $filter['name'] }} </span>
					<a 	href="?{{$filters['url']}}&delete={{ $filter['key']}} " 
						class="float-right btn btn-danger btn-sm">
						<i class="fa fa-trash"></i>
					</a>
				</div>
				@endforeach
			</div>
			@endif
			<div class="bg-white p-3 border">
				<div class="p-2">
					<h5>Palabra clave</h5>
				</div>
				<div class="">
					<form action="/user/vacants?{{substr($filters['url'], 1)}}" method="GET">
						<div class="form-group">
							{!! Form::text('q', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::submit('Buscar', ['class' => 'btn btn-primary btn-block']) !!}
						</div>
					</form>	
				</div>
			</div>
			@if(!has_in_array($filters['filters'], 'ContractType'))
				<div class="bg-white border">
					<div class="p-2">
						<h5>Tipo de contrato</h5>
					</div>
					<div class="boxFilter">
						<ul class="nav flex-column">
							@foreach($contractTypes as $contractType)
							<li class="nav-item">
								<a href="?ContractType={{$contractType->id}}{{($filters['url'] != '') ?$filters['url']:''}}" class="">Contrato {{$contractType->name}} </a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			@endif
			@if(!has_in_array($filters['filters'], 'WorkingDay'))
				<div class="bg-white border">
					<div class="p-2">
						<h5>Jornada</h5>
					</div>
					<div class="boxFilter">
						<ul class="nav flex-column">
							@foreach($workingDays as $workingDay)
							<li class="nav-item">
								<a href="?WorkingDay={{$workingDay->id}}{{($filters['url'] != '') ?$filters['url']:''}}" class="">{{ ucfirst($workingDay->name) }} </a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			@endif
			@if(!has_in_array($filters['filters'], 'AreaWork'))
				<div class="bg-white border">
					<div class="p-2">
						<h5>Categoria</h5>
					</div>
					<div class="boxFilter">
						<ul class="nav flex-column">
							@foreach($areasWorks as $areasWorks)
							<li class="nav-item">
								<a href="?AreaWork={{$areasWorks->id}}{{($filters['url'] != '') ?$filters['url']:''}}" class="">{{ ucfirst($areasWorks->name) }} </a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			@endif
		</div>
		<div class="col-md-9">
		</div>
	</div>
@endsection

@section('js')
	<script>
		(function(){

			// $(".boxFilter a").click(function(e){

			// 	e.preventDefault();

			// 	var filter = $(this);

			// 	$.ajax({
			// 		url: "/user/vacants/search",
			// 		method: 'GET',
			// 		data: filter.attr('href'),
			// 		beforeSend: function(){

			// 		},
			// 		success: function(data){
			// 			console.log(data);
			// 		},
			// 		error: function(xhr){

			// 		}
			// 	});
			// });
		}());
	</script>
@endsection
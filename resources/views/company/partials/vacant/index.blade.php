@extends('company.layout.app')

@section('breadcum')
@endsection

@section('section')
	
	@include('flash::message')
	
	<h4>Vacantes</h4>
	
	<div class="clearfix mb-2">
		<div class="float-right">
			<a href="{{url('company/vacant/create')}}" class="btn btn-sm btn-primary">Nueva vacante</a>
		</div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Titulo</th>
				<th>Jornada</th>
				<th>Tipo de contrato</th>
				<th>Salario</th>
				<th>Fecha limite</th>
				<th>Fecha de creación</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($vacants as $key => $vacant)
			<tr>
				<td> {{ $vacant->id }} </td>
				<td> {{ $vacant->title }} </td>
				<td> {{ $vacant->workingDay->name }} </td>
				<td> {{ $vacant->contractType->name }} </td>
				<td> {{ $vacant->salary }} </td>
				<td> {{ $vacant->expired_date }} </td>
				<td> {{ $vacant->created_at }} </td>
				<td>
					<a href="{{route('vacant.edit', $vacant)}}" class="btn btn-sm btn-primary">Editar</a>
					<a 
						href="" 
						class="btn btn-sm btn-danger"
						onclick="event.preventDefault();
                                document.getElementById('vacantDel{{$vacant->id}}').submit();">Eliminar</a>
					{!! Form::open(['route' => ['vacant.destroy', $vacant], 'method'=>'DELETE', 'id'=>"vacantDel{$vacant->id}"]) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
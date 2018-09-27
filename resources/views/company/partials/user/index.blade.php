@extends('company.layout.app')

@section('breadcum')
@endsection

@section('section')
	
	@include('flash::message')
	
	<h4>Empleados</h4>
	
	<div class="clearfix mb-2">
		<div class="float-right">
			<a href="{{url('company/employee/create')}}" class="btn btn-sm btn-primary">Nuevo empleado</a>
		</div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Correo electronico</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $key => $user)
			<tr>
				<td> {{ $user->id }} </td>
				<td> {{ $user->name }} </td>
				<td> {{ $user->last_name }} </td>
				<td> {{ $user->email }} </td>
				<td>
					<a href="{{route('employee.edit', $user)}}" class="btn btn-sm btn-primary">Editar</a>
					<a 
						href="" 
						class="btn btn-sm btn-danger"
						onclick="event.preventDefault();
                                document.getElementById('employeeDel{{$user->id}}').submit();">Eliminar</a>
					{!! Form::open(['route' => ['employee.destroy', $user], 'method'=>'DELETE', 'id'=>"employeeDel{$user->id}"]) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
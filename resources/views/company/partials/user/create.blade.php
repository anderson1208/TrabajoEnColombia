 @extends('company.layout.app')

@section('breadcum')
@endsection

@section('section')
	<h4>Crear empleados</h4>
	<div class="card">
		<div class="card-body">
			 @include('complements.errors')
			<form action="{{url('company/employee')}}" method="POST">
				{{ csrf_field() }}
				<div class="form-row">
					<div class="col">
						<label for="name">Nombres</label>
						<input type="text" name="name" placeholder="jhon" class="form-control">
					</div>
					<div class="col">
						<label for="last_name">Apellidos</label>
						<input type="text" name="last_name" placeholder="doe" class="form-control">
					</div>
					<div class="col">
						<label for="identification_type_id">Tipo de identificacón</label>
						{!! Form::select('identification_type_id', $identificationTypes, null, ['class'=>'form-control']) !!}
					</div>
					<div class="col">
						<label for="identification_number">Número de identificación</label>
						<input type="text" name="identification_number" placeholder="12221212211" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="col form-group">
						<label for="email">Correo electronico</label>
						<input type="text" name="email" placeholder="jhondoe@mail.com" class="form-control"> 
					</div>
					<div class="col">
						<label for="address">Dirección</label>
						<input type="text" name="address" placeholder="Cra 18b #12-3" class="form-control"> 
					</div>
					<div class="col">
						<label for="phone">Teléfono</label>
						<input type="text" name="phone" placeholder="25 457522" class="form-control"> 
					</div>
					<div class="col">
						<label for="mobil">Celular</label>
						<input type="text" name="mobil" placeholder="+57 32155454" class="form-control"> 
					</div>
				</div>
				<div class="">
					<button type="submit" class="btn btn-primary">Crear empleado</button>
				</div>
			</form>
		</div>
	</div>
@endsection
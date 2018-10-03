<div class="card mb-4">
	<div class="card-header bg-white">
		<h5>Información personal</h5>
	</div>
	<div class="card-body">
		{!! Form::open(['route'=>['cv.update.personalInfo', $user], 'method'=>'PUT']) !!}
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Nombres</label>
				{!! Form::text('name', $user->name, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group col-md-6">
				<label for="">Apellidos</label>
				{!! Form::text('last_name', $user->last_name, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Tipo de identificación</label>
				{!! Form::select('identification_type_id', $identificationTypes, $user->identification_type_id, ['class'=>'form-control', 'placeholder'=>'- Seleccione un tipo de identificación -']) !!}
			</div>
			<div class="form-group col-md-6">
				<label for="">Número de identificación</label>
				{!! Form::text('identification_number', $user->identification_number, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Correo electronico</label>
				{!! Form::text('email', $user->email, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group col-md-6">
				<label for="">Estado civil</label>
				{!! Form::select('identification_type_id', $civilStatuses, $user->civil_status_id, ['class'=>'form-control', 'placeholder'=>'- Seleccione un estado civil -']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary btn-block">Actualizar información personal</button>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
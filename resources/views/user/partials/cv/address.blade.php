<div class="card mb-4">
	<div class="card-header bg-white">
		<h5>Dirección</h5>
	</div>
	<div class="card-body">
		{!! Form::open(['route'=>['cv.update.personalInfo', $user], 'method'=>'PUT']) !!}
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Dirección</label>
				{!! Form::text('address', $user->address->address, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group col-md-6">
				<label for="">Teléfono</label>
				{!! Form::text('phone', $user->address->phone, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Celular</label>
				{!! Form::text('mobil', $user->address->mobil, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary btn-block">Actualizar dirección</button>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
<div class="card mb-4">
	<div class="card-header bg-white clearfix">
		<h5 class="float-left">Información personal</h5>
		<div class="float-right">
			<a data-toggle="collapse" href="#collapsePersonalInformation" role="button" aria-expanded="false" aria-controls="collapsePersonalInformation">
				<i class="fa fa-chevron-down"></i>
			</a>
		</div>
	</div>
	<div class="card-body collapse" id="collapsePersonalInformation">
		{!! Form::open(['route'=> 'cv.update.personalInfo', 'method'=>'PUT', 'id'=>'formPersonalInfoUpdate']) !!}
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
			<div class="form-group col-md-6">
				<label for="">Genero</label>
				{!! Form::select('gender_id', $genders, $user->gender_id, ['class'=>'form-control', 'placeholder'=>'- Seleccione un genero -']) !!}
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

@section('personalInformation')
	<script>
		(function(){

			$("#formPersonalInfoUpdate").submit(function(e){

				e.preventDefault();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					method: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					beforeSend: function(){
						form.find('input').prop('disabled', true);
						form.find('select').prop('disabled', true);
						form.find('button').text('Actualizando información personal').prop('disabled', true);
					},
					success: function(data){
						form.find('input').prop('disabled', false);
						form.find('select').prop('disabled', false);
						form.find('button').text('Actualizar información personal').prop('disabled', false);
					},
					error: function(xhr){
						form.find('input').prop('disabled', false);
						form.find('select').prop('disabled', false);
						form.find('button').text('Actualizar información personal').prop('disabled', false);
					}
				});
			});

		}());
	</script>
@endsection
<div class="card mb-4">
	<div class="card-header bg-white">
		<h5>Formación acádemica</h5>
	</div>
	<div class="card-body">
		<div  class="text-center">
			<a href="" id="AddFormation">
				<i class="fa fa-plus"></i>
				<span>Agregar</span>
			</a>
		</div>
		<div class="" id="formCreateFormation d-none">
			{!! Form::open(['route'=>['cv.update.personalInfo', $user], 'method'=>'PUT']) !!}
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Centro educativo</label>
					{!! Form::text('school_name', null, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Nivel educativo</label>
					{!! Form::select('education_level', $educationLevels, null, ['class'=>'form-control', 'placeholder'=>'- Seleccione un nivel -']) !!}
				</div>
				<div class="form-group col-md-6">
					<label for="">Estado</label>
					{!! Form::select('education_state', $educationStates, null, ['class'=>'form-control', 'placeholder'=>'- Seleccione un estado -']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Fecha de inicio</label>
					{!! Form::text('start_date', null, ['class'=>'form-control datepicker']) !!}
				</div>
				<div class="form-group col-md-6">
					<label for="">Fecha de finalización</label>
					{!! Form::text('end_date', null, ['class'=>'form-control datepicker']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<button class="btn btn-primary btn-block">Agregar</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@section('education')
	<script>
		(function(){

		}());
	</script>
@endsection
 @extends('company.layout.app')

@section('css')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
@endsection
@section('breadcum')
@endsection

@section('section')
	<h4>Crear vacante</h4>
	<div class="card">
		<div class="card-body">
			 @include('complements.errors')
			<form action="{{url('company/vacant')}}" method="POST" id="formCreareVacant">
				{{ csrf_field() }}
				<div class="form-row">
					<div class="col-md-12 form-group">
						<label for="name">Nombre de la vacante</label>
						<input type="text" name="title" placeholder="" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 form-group">
						<label for="contract_type_id">Tipo de contrato</label>
						{!! Form::select('contract_type_id', $contractTypes, null, ['class'=>'form-control']) !!}
					</div>
					<div class="col-md-4 form-group">
						<label for="working_day_id">Jornada</label>
						{!! Form::select('working_day_id', $workingDay, null, ['class'=>'form-control']) !!}
					</div>
					<div class="col-md-4 form-group">
						<label for="salary">Salario</label>
						{!! Form::text('salary', null, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-3 form-group">
						<label for="expired_date">Fecha de culminación</label>
						<input type="text" id="datepicker" name="expired_date" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label for="">Area</label>
						{!! Form::select('area_work_id', $areaWorks, null, ['class' => 'form-control', 'placeholder' => '- Seleccione un area -']) !!}
					</div>
					<div class="form-group col-md-2">
						<label for="">N° de vacantes</label>
						{!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Cantida de vacante(s)']) !!}
					</div>
					<div class="form-group col-md-2">
						<label for="">Años de experiencia</label>
						{!! Form::text('year_experiences', null, ['class' => 'form-control', 'placeholder' => 'Años de experiencia']) !!}
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="">Educación minima</label>
						{!! Form::select('education_level_id', $educationLevels, null, ['class' => 'form-control', 'placeholder' => '- Seleccione un nivel educativo -']) !!}
					</div>
					<div class="form-group col-md-4">
						<label for="">Intervalo de pago</label>
						{!! Form::select('payment_interval_id', $paymentIntervals, null, ['class' => 'form-control', 'placeholder' => '- Seleccione un tipo -']) !!}
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<label for="description">Descripción</label>
						<textarea id="description" class="form-control" name="description"></textarea>
					</div>
				</div>
				<div class="mt-3">
					<button type="submit" class="btn btn-primary">Crear vacante</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('js')
	<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/messages/messages.es-es.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.es.min.js"></script>
	<script>
		 $(document).ready(function () {
		 	
		 	// 
		 	$('#datepicker').datepicker({
			    language: "es",
			    format: "yyyy-mm-dd"
			});

		 	// 
            $("#description").editor({
            	locale:'es-es',
                uiLibrary: 'bootstrap4'
            });
        });
	</script>
@endsection
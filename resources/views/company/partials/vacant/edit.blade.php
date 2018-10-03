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
			<form action='{{url("company/vacant/{$vacant->id}")}}' method="POST" id="formCreareVacant">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-row">
					<div class="col-md-4">
						<label for="title">Nombre de la vacante</label>
						{!! Form::text('title', $vacant->title, ['class'=>'form-control']) !!}
					</div>
					<div class="col-md-2">
						<label for="contract_type_id">Tipo de contrato</label>
						{!! Form::select('contract_type_id', $contractTypes, $vacant->contract_type_id, ['class'=>'form-control']) !!}
					</div>
					<div class="col-md-2">
						<label for="working_day_id">Jornada</label>
						{!! Form::select('working_day_id', $workingDay, $vacant->working_day_id, ['class'=>'form-control']) !!}
					</div>
					<div class="col-md-2">
						<label for="salary">Salario</label>
						{!! Form::text('salary', $vacant->salary, ['class' => 'form-control']) !!}
					</div>
					<div class="col-md-2">
						<label for="expired_date">Fecha de culminación</label>
						{!! Form::text('expired_date', $vacant->expired_date, ['class'=>'form-control']) !!}
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<label for="description">Descripción</label>
						<textarea id="description" class="form-control" name="description">
							{!! $vacant->description !!}
						</textarea>
					</div>
				</div>
				<div class="mt-3">
					<button type="submit" class="btn btn-primary">Actualizar vacante</button>
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
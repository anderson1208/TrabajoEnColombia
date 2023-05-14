@if(count($formations) == 0)
	<div class="text-center">
		<h4>No hay información</h4>
	</div>
@else
	@foreach($formations as $formation)
	<div class="py-2 px-3 border bg-white mb-3">
		<div class="clearfix border-bottom py-2">
			<h5 class="float-left"> {{ $formation->educationLevel->name }} </h5>
			<div class="float-right">
				<button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#collapseFormation{{$formation->id}}" aria-expanded="false" aria-controls="collapseFormation{{$formation->id}}">
					<i class="fa fa-edit"></i>
				</button>
				<button 
					class="btn btn-sm btn-danger formationDel">
					<i class="fa fa-trash-alt"></i>
				</button>
				{!! Form::open(['route' => ['cv.formation.destroy', $formation], 'method'=>'DELETE', 'id'=>"formationDel{$formation->id}"]) !!}
				{!! Form::close() !!}
			</div>
		</div>
		<div class="collapse" id="collapseFormation{{$formation->id}}">
			{!! Form::open(['route'=> ['cv.formation.update', $formation], 'method'=>'PUT', 'class'=> 'formFormationUpdate', 'id'=>"formFormationUpdate{$formation->id}"]) !!}
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Centro educativo</label>
					{!! Form::text('school_name', $formation->school_name, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Nivel educativo</label>
					{!! Form::select('education_level_id', $educationLevels, $formation->education_level_id, ['class'=>'form-control', 'placeholder'=>'- Seleccione un nivel -']) !!}
				</div>
				<div class="form-group col-md-6">
					<label for="">Estado</label>
					{!! Form::select('education_state_id', $educationStates, $formation->education_state_id, ['class'=>'form-control', 'placeholder'=>'- Seleccione un estado -']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Fecha de inicio</label>
					{!! Form::text('start_date', $formation->getStartDate(), ['class'=>'form-control datepicker']) !!}
				</div>
				<div class="form-group col-md-6">
					<label for="">Fecha de finalización</label>
					{!! Form::text('end_date', $formation->getEndDate(), ['class'=>'form-control datepicker']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<button class="btn btn-primary btn-block">Actualizar</button>
					<button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#collapseFormation{{$formation->id}}" aria-expanded="false" aria-controls="collapseFormation{{$formation->id}}">Cancelar</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
		<div class="clearfix py-2">
			<h5 class="float-left text-muted"> {{ $formation->school_name }} </h5>
			<div class="float-right text-muted">
				<h5>{{ $formation->getStartDate() }} - {{ $formation->getEndDate() }}</h5>
			</div>
		</div>
	</div>
	@endforeach
@endif
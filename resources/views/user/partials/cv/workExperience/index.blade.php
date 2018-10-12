@if(count($wExperiences) == 0)
	<div class="text-center">
		<h4>No hay información</h4>
	</div>
@else
	@foreach($wExperiences as $workExperience)
	<div class="py-2 px-3 border bg-white mb-3">
		<div class="clearfix border-bottom py-2">
			<h5 class="float-left"> {{ $workExperience->charge }} </h5>
			<div class="float-right">
				<button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#collapseworkExperience{{$workExperience->id}}" aria-expanded="false" aria-controls="collapseworkExperience{{$workExperience->id}}">
					<i class="fa fa-edit"></i>
				</button>
				<button 
					class="btn btn-sm btn-danger workExperienceDel">
					<i class="fa fa-trash-alt"></i>
				</button>
				{!! Form::open(['route' => ['cv.workExperience.destroy', $workExperience], 'method'=>'DELETE', 'id'=>"workExperienceDel{$workExperience->id}"]) !!}
				{!! Form::close() !!}
			</div>
		</div>
		<div class="collapse" id="collapseworkExperience{{$workExperience->id}}">
			{!! Form::open(['route'=> ['cv.workExperience.update', $workExperience], 'method'=>'PUT', 'class'=> 'formWorkExperienceUpdate', 'id'=>"formworkExperienceUpdate{$workExperience->id}"]) !!}
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Empresa</label>
					{!! Form::text('company', $workExperience->company, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Cargo</label>
					{!! Form::text('charge', $workExperience->charge, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Funciones</label>
					{!! Form::textarea('functions', $workExperience->functions, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Jefe inmediato</label>
					{!! Form::text('boss_name', $workExperience->boss_name, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group col-md-6">
					<label for="">Teléfono</label>
					{!! Form::text('phone', $workExperience->phone, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Fecha de inicio</label>
					{!! Form::text('start_date', $workExperience->getStartDate(), ['class'=>'form-control datepicker']) !!}
				</div>
				<div class="form-group col-md-6">
					<label for="">Fecha de finalización</label>
					{!! Form::text('end_date', $workExperience->getEndDate(), ['class'=>'form-control datepicker']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<button class="btn btn-primary btn-block">Actualizar</button>
					<button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#collapseworkExperience{{$workExperience->id}}" aria-expanded="false" aria-controls="collapseworkExperience{{$workExperience->id}}">Cancelar</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
		<div class="clearfix py-2">
			<h5 class="float-left text-muted"> {{ $workExperience->company }} </h5>
			<div class="float-right text-muted">
				<h5>{{ $workExperience->getStartDate() }} - {{ $workExperience->getEndDate() }}</h5>
			</div>
		</div>
	</div>
	@endforeach
@endif
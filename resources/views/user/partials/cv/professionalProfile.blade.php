<div class="card mb-4">
	<div class="card-header bg-white clearfix">
		<h5 class="float-left">Perfil profesional</h5>
		<div class="float-right">
			<a data-toggle="collapse" href="#collapsePProfessional" role="button" aria-expanded="false" aria-controls="collapsePProfessional">
				<i class="fa fa-chevron-down"></i>
			</a>
		</div>
	</div>
	<div class="card-body collapse" id="collapsePProfessional">
		{!! Form::open(['route'=>['cv.update.personalInfo', $user], 'method'=>'PUT']) !!}
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="">Cargo o titulo</label>
				{!! Form::text('occupation', $user->cv->occupation, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="form-group">
					<label for="">Descripción de su perfil profesional</label>
					{!! Form::textarea('profession_profile', $user->cv->profession_profile, ['class'=>'form-control']) !!}
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<button class="btn btn-primary btn-block">Actualizar perfil</button>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
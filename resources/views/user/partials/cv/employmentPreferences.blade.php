<div class="card mb-4">
	<div class="card-header bg-white clearfix">
		<h5 class="float-left">Preferencias de empleo</h5>
		<div class="float-right">
			<a data-toggle="collapse" href="#collapseEmploymentPreference" role="button" aria-expanded="false" aria-controls="collapseEmploymentPreference">
				<i class="fa fa-chevron-down"></i>
			</a>
		</div>
	</div>
	<div class="card-body collapse" id="collapseEmploymentPreference">
		{!! Form::open(['url'=> '/user/cv/updateEmploymentPreference', 'method'=>'PUT', 'id' => 'formEmploymentPreferenceUpdate']) !!}
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="">Areas</label>
				{!! Form::select('areas', $areasWork, $user->employmentPreference->areasWork()->get()->pluck('id'), ['class'=>'form-control chosen-select', 'multiple' => true,'name'=>'areas[]']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="form-group">
					<label for="">Salario minimo aceptado</label>
					{!! Form::text('miniun_salary', $user->employmentPreference->miniun_salary, ['class' => 'form-control']) !!}
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

@section('employmentPreferences')
	<script>
		(function(){
			$("#formEmploymentPreferenceUpdate").submit(function(e){

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
						form.find('button').text('Actualizando preferencias').prop('disabled', true);
					},
					success: function(data){
						form.find('input').prop('disabled', false);
						form.find('select').prop('disabled', false);
						form.find('button').text('Actualizar preferencias').prop('disabled', false);
					},
					error: function(xhr){
						form.find('input').prop('disabled', false);
						form.find('select').prop('disabled', false);
						form.find('button').text('Actualizar preferencias').prop('disabled', false);
					}
				});
			});
		}())
	</script>
@endsection
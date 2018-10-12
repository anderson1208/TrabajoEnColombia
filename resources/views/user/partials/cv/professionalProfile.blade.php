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
		{!! Form::open(['url'=> '/user/cv/updateProfessionalProfile', 'method'=>'PUT', 'id' => 'formProfessionalProfileUpdate']) !!}
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

@section('professionalProfile')
	<script>
		(function(){

			$("#formProfessionalProfileUpdate").submit(function(e){

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
						form.find('button').text('Actualizando perfil').prop('disabled', true);
					},
					success: function(data){
						form.find('input').prop('disabled', false);
						form.find('select').prop('disabled', false);
						form.find('button').text('Actualizar perfil').prop('disabled', false);
					},
					error: function(xhr){
						form.find('input').prop('disabled', false);
						form.find('select').prop('disabled', false);
						form.find('button').text('Actualizar perfil').prop('disabled', false);
					}
				});
			});

		}());
	</script>
@endsection
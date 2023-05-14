<div class="card mb-4">
	<div class="card-header bg-white clearfix">
		<h5 class="float-left">Experiencia laboral</h5>
		<div class="float-right">
			<a data-toggle="collapse" href="#collapseWExperience" role="button" aria-expanded="false" aria-controls="collapseWExperience">
				<i class="fa fa-chevron-down"></i>
			</a>
		</div>
	</div>
	<div class="card-body collapse" id="collapseWExperience">
		<div  class="text-center mb-3">
			<a data-toggle="collapse" href="#collapseWE" role="button" aria-expanded="false" aria-controls="collapseWE">
				<i class="fa fa-plus"></i>
				<span>Agregar</span>
			</a>
		</div>
		<div class="collapse" id="collapseWE">
			{!! Form::open(['url' => '/user/cv/workExperience', 'method'=>'POST', 'id'=>'formStoreWE']) !!}
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Empresa</label>
					{!! Form::text('company', null, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Cargo</label>
					{!! Form::text('charge', null, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Funciones</label>
					{!! Form::textarea('functions', null, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Jefe inmediato</label>
					{!! Form::text('boss_name', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group col-md-6">
					<label for="">Teléfono</label>
					{!! Form::text('phone', null, ['class'=>'form-control']) !!}
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
					<button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#collapseWE" aria-expanded="false" aria-controls="collapseWE">Cancelar</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
		<div id="wExperiences">
			
		</div>
	</div>
</div>

@section('workExperience')
	<script>
		(function(){

			// 
			var loadWorkExperiences = function(){

				// Obtenemos todas la formciones cuando cargue el document
				$.get("/user/cv/workExperiences", function(data){
					$("#wExperiences").empty().html(data.view);

					crudWorkExperience();

					$("#wExperiences").find('form input.datepicker').datepicker({
						language: "es",
		    			format: "yyyy-mm-dd"
					});	

				}, 'json');
			}

			// 
			var collapseFormWorkExperience = function(){
				$("#collapseWE").collapse('hide');
			}

			// 
			var clearFormWorkExperience = function(form){

				form.find('input').val('');
				form.find('select').val('');
			}

			// 
			loadWorkExperiences();

			// Enviamos el formulario
			$("#formStoreWE").submit(function(e){

				e.preventDefault();

				//
				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					method: form.attr('method'),
					data: form.serialize(),
					dataType:'json',
					beforeSend: function(){
						form.find('input').prop('disabled', true);
						form.find('button').text('Agregando').prop('disabled', true);
					},
					success: function(data){
						form.find('input').prop('disabled', false);
						form.find('button').text('Agregar').prop('disabled', false);

						collapseFormWorkExperience();
						clearFormWorkExperience(form);

						loadWorkExperiences();
					},
					error: function(xhr){
						form.find('input').prop('disabled', false);
						form.find('button').text('Agregar').prop('disabled', false);
					}
				});
			});

			// Activamos los otros metodos curd faltantes
			var crudWorkExperience = function(){
				$(".workExperienceDel").click(function(e){

					e.preventDefault();

					var button 	= $(this),
						form 	= button.next();

					$.ajax({
						url: form.attr('action'),
						method: form.attr('method'),
						data: form.serialize(),
						dataType: 'json',
						beforeSend: function(){
							form.find('button').prop('disabled', true);
						},
						success: function(data){
							loadWorkExperiences();
						},
						error: function(xhr){

						}
					});
				});

				$(".formWorkExperienceUpdate").submit(function(e){

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
							form.find("button").prop('disabled', true);
							form.find(":submit").text('Actualizando');
						},
						success: function(data){
							loadWorkExperiences();
						},
						error: function(xhr){
							form.find('input').prop('disabled', false);
							form.find('select').prop('disabled', false);
							form.find("button").prop('disabled', false);
							form.find(":submit").text('Actualizar');
						}
					});
				});
			}
		}());
	</script>
@endsection
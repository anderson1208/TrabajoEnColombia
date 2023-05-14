<div class="card mb-4">
	<div class="card-header bg-white clearfix">
		<h5 class="float-left">Formación acádemica</h5>
		<div class="float-right">
			<a data-toggle="collapse" href="#collapseFormation" role="button" aria-expanded="false" aria-controls="collapseFormation">
				<i class="fa fa-chevron-down"></i>
			</a>
		</div>
	</div>
	<div class="card-body collapse" id="collapseFormation">
		<div  class="text-center mb-3">
			<a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
				<i class="fa fa-plus"></i>
				<span>Agregar</span>
			</a>
		</div>
		<div class="collapse" id="collapseExample">
			{!! Form::open(['route'=> 'cv.addEducation', 'method'=>'POST', 'id'=>'formCreateFormation']) !!}
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Centro educativo</label>
					{!! Form::text('school_name', null, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Nivel educativo</label>
					{!! Form::select('education_level_id', $educationLevels, null, ['class'=>'form-control', 'placeholder'=>'- Seleccione un nivel -']) !!}
				</div>
				<div class="form-group col-md-6">
					<label for="">Estado</label>
					{!! Form::select('education_state_id', $educationStates, null, ['class'=>'form-control', 'placeholder'=>'- Seleccione un estado -']) !!}
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
					<button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Cancelar</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
		<div id="formations">
			
		</div>
	</div>
</div>

@section('education')
	<script>
		(function(){

			var collapseFormFormation = function(){
				$("#collapseExample").collapse('hide');
			}

			var clearFormFormation = function(form){

				form.find('input').val('');
				form.find('select').val('');
			}

			var loadFormations = function(){

				// Obtenemos todas la formciones cuando cargue el document
				$.get("/user/cv/formations", function(data){
					$("#formations").empty().html(data.view);

					crudFormation();

					$("#formations").find('form input.datepicker').datepicker({
						language: "es",
		    			format: "yyyy-mm-dd"
					});	

				}, 'json');
			}

			// 
			loadFormations();

			// Enviamos el formulario
			$("#formCreateFormation").submit(function(e){

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

						collapseFormFormation();
						clearFormFormation(form);

						loadFormations();
					},
					error: function(xhr){
						form.find('input').prop('disabled', false);
						form.find('button').text('Agregar').prop('disabled', false);
					}
				});
			});

			// Eliminamos la formacion seleccionada
			var crudFormation = function(){
				$(".formationDel").click(function(e){

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
							loadFormations();
						},
						error: function(xhr){

						}
					});
				});

				$(".formFormationUpdate").submit(function(e){

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
							loadFormations();
						},
						error: function(xhr){
							form.find('input').prop('disabled', false);
							form.find('select').prop('disabled', false);
							form.find("button").prop('disabled', false);
							form.find(":submit").text('Actualizar');
						}
					});
					console.log('form', $(this));
				});
			}
		}());
	</script>
@endsection
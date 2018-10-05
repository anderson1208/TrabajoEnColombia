<div class="card mb-4">
	<div class="card-header bg-white clearfix">
		<h5 class="float-left">Dirección</h5>
		<div class="float-right">
			<a data-toggle="collapse" href="#collapseAddress" role="button" aria-expanded="false" aria-controls="collapseAddress">
				<i class="fa fa-chevron-down"></i>
			</a>
		</div>
	</div>
	<div class="card-body collapse" id="collapseAddress">
		{!! Form::open(['url'=> "/user/cv/updateAddress", 'method'=>'PUT', 'id' => 'formAddressUpdate']) !!}
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Dirección</label>
				{!! Form::text('address', $user->address->address, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group col-md-6">
				<label for="">Teléfono</label>
				{!! Form::text('phone', $user->address->phone, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Celular</label>
				{!! Form::text('mobil', $user->address->mobil, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary btn-block">Actualizar dirección</button>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>

@section('address')
	<script>
		(function(){

			$("#formAddressUpdate").submit(function(e){

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
						form.find('button').text('Actualizando dirección').prop('disabled', true);
					},
					success: function(data){
						form.find('input').prop('disabled', false);
						form.find('select').prop('disabled', false);
						form.find('button').text('Actualizar dirección').prop('disabled', false);
					},
					error: function(xhr){
						form.find('input').prop('disabled', false);
						form.find('select').prop('disabled', false);
						form.find('button').text('Actualizar dirección').prop('disabled', false);
					}
				});
			});

		}());
	</script>
@endsection
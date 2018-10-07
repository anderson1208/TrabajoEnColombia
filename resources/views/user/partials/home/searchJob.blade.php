<div class="card mb-2">
	<div class="card-header bg-white">
		<h5>Encuentra el empleo que deseas</h5>
	</div>
	<div class="card-body">
		{!! Form::open(['class'=>'form-inline']) !!}
			<div class="mb-2 mr-2">
				{!! Form::text('ctegory', null, ['class' => 'form-control']) !!}
			</div>
			<div class="mb-2 mr-2">
				{!! Form::select('city', [], null, ['class' => 'form-control', 'placeholder' => '- Selecciona un lugar -']) !!}
			</div>
			<div class="mb-2 mr-2">
				{!! Form::submit('Buscar empleo', ['class' => 'btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>
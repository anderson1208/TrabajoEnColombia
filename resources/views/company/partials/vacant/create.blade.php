 @extends('company.layout.app')

@section('breadcum')
@endsection

@section('section')
	<h4>Crear vacante</h4>
	<div class="card">
		<div class="card-body">
			 @include('complements.errors')
			<form action="{{url('company/vacant')}}" method="POST">
				{{ csrf_field() }}
				<div class="form-row">
					<div class="col">
						<label for="name">Nombre de la vacante</label>
						<input type="text" name="title" placeholder="jhon" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<label for="description">Descripción</label>
						<textarea id="description" class="form-control"></textarea>
					</div>
				</div>
				<div class="mt-3">
					<button type="submit" class="btn btn-primary">Crear empleado</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
@endsection
@if(count($vacants) > 0)
	@foreach($vacants as $vacant)
		<div class="clearfix mb-3 border-bottom">
		<a href="{{ url('/user/vacants', [$vacant->id])}}">
			<h5 class="float-left"> {{ $vacant->title }} </h5>
		</a>
		<span class="text-muted float-right"> {{ $vacant->created_at }} </span>
		</div>
	@endforeach
@else
	<h5>No hay resultados</h5>
@endif
@extends('layouts.app')

@section('navbar')
<li class="nav-item dropdown">
	<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
		{{ Auth::guard('company')->user()->name }} <span class="caret"></span>
	</a>

	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="{{ route('logout') }}"
		onclick="event.preventDefault();
		document.getElementById('logout-form').submit();">
		{{ __('Salir') }}
	</a>

	<form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">
		@csrf
	</form>
</div>
</li>
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				@include('company.layout.sidebar')
			</div>
			<div class="col-md-10">
				@yield('breadcum')
				@yield('section')
			</div>
		</div>
	</div>
@endsection
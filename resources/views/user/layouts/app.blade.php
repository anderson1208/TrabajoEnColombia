<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    <div id="app">
    	<div class="">
		    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
		        <div class="container">
		            <a class="navbar-brand" href="{{ url('/') }}">
		                {{ config('app.name', 'Laravel') }}
		            </a>
		            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
		                <span class="navbar-toggler-icon"></span>
		            </button>

		            <div class="collapse navbar-collapse" id="navbarSupportedContent">
		                <!-- Right Side Of Navbar -->
		                <ul class="navbar-nav ml-auto">
		                    <!-- Authentication Links -->
		                    <li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
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
		                </ul>
		            </div>
		        </div>
		    </nav>
		    <div class="navbar-laravel">
		    	<div class="container">
		    		<div class="nav nav-pills mb-3" id="tabs" role="tablist">
						<a class="{{ (menuActive('home')) ? 'active' : '' }}" href="{{route('user.home')}}">
							<i class="fa fa-home"></i>
							<span>Inicio</span>
						</a>
						<a class="{{ (menuActive('cv')) ? 'active' : '' }}" href="{{route('myCV')}}">
							<i class="far fa-address-book"></i>
							<span>Hoja de vida</span>
						</a>						
						<a class="{{ (menuActive('myApplications')) ? 'active' : '' }}" href="{{route('myApplications')}}">
							<i class="fa fa-clipboard-list"></i>
							<span>Aplicaciones</span>
						</a>
						<a class="{{ (menuActive('vacants')) ? 'active' : '' }}" href="#">
							<i class="fa fa-search"></i>
							<span>Buscar vacantes</span>
						</a>
					</div>
		    	</div>
		    </div>
        </div>
        <main class="container">
        	@yield('breadcumb')
            @yield('content')
        </main>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>

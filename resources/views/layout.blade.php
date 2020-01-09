<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		.pull-left {
		  float: left !important;
					}
		.pull-right {
  			float: right !important;
				}
	</style>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href={{ mix('css/app.css') }}>
	<script>
		window.laravel ={
			csrfToken: "{{ csrf_token() }}"
		}
	</script>
	<title>@yield('title','Mi sitio')</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  	<a class="navbar-brand {{ activeMenu('/') }}" href="{{ route('home') }}">Home</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item {{ activeMenu('mensajes/create') }}" id="contacto-tab">
		      	<a class="nav-link" href="{{ route('mensajes.create') }}">Contactos</a>
		      </li>
		      @if(auth()->check())
		      <li class="nav-item {{ activeMenu('mensajes*') }}">
		        <a class="nav-link" href="{{ route('mensajes.index') }}" id="mensajes-tab">Mensajes</a>
		      </li>
		      @if (auth()->user()->hasRoles(['admin']))
		      <li class="nav-item {{ activeMenu('usuarios*') }}">
		        <a class="nav-link" href="{{ route('usuarios.index') }}" id="usuarios-tab">Usuarios</a>
		      </li>
		     	 @endif
				@endif
				@if(auth()->guest())
				<li class="nav-item {{ activeMenu('login') }}">
					<a class="nav-link" href="/login">Login</a>
				</li>
				@else
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0 pull-xs-md-sm-right pull-right">
				<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          {{ auth()->user()->name }}
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		         <a class="dropdown-item" href="{{ route('usuarios.show',auth()->id()) }}">Mi Cuenta</a>
			     	<a class="dropdown-item" href="/logout">Cerrar Sesión</a>
		        </div>
		      </li>
		      </ul>
		      @endif
		    </ul>
		  </div>
		</nav>
	</header>
	<div class="container d-flex flex-column h-screen justify-content-between" id="app">
		@if( session()->has('info') )
			<div class="alert alert-primary alert-dismissible fade show" role="alert">
						{{ session('info') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			@endif
		@yield('contenido')
		<hr>
	<footer class="bg-white text-center text-black-50 py-3 shadow">Copyright {{ date('Y') }}</footer>

	</div>
	<script src="{{ mix('js/app.js') }}"></script>
	<script type="/js/vue.min"></script>
	<script>
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		   console.log('Esto es un dispositivo móvil');
		}
		else
		{
			console.log('Este es una desktop');
		}
	</script>
</body>
</html>

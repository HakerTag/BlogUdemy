<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/app.css">
	<title>Mi sitio</title>
</head>
<body>
	
	<header>
		<?php function activeMenu($url){
		return request()->is($url) ?  'active' : '';
		}?>
		<h1>{{ request()->is('/') ? 'Estas en el Home' : 'No estas en el home'}}</h1>
		<nav>
			<a class="{{ activeMenu('/') }}" 
				href="{{ route('home') }}">Home</a>
			<a class="{{ activeMenu('saludos*') }}" 
				href="{{ route('saludos', 'Daniel') }}">Saludos</a>
			<a class="{{ activeMenu('mensajes/create') }}" 
				href="{{ route('mensajes.create') }}">Contactos</a>
				@if(auth()->check())
			<a class="{{ activeMenu('mensajes') }}" 
				href="{{ route('mensajes.index') }}">Mensajes</a>
				
			<a href="/logout">Cerrar sesion de {{ auth()->user()->name }}</a>
				@endif
				@if(auth()->guest())
			<a class="{{ activeMenu('login') }}" 
				href="/login">Login</a>
				@endif
		</nav>
	</header>
	@yield('contenido')
	<footer>Copyright {{ date('Y') }}</footer>

</body>
</html>
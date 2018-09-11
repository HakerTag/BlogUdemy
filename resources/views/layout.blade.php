<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		.active{
			text-decoration: none;
			color: green;
		}
		.error{
			color: red;
			font-size: 12px;
		}
	</style>
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
			<a class="{{ activeMenu('saludos/*') }}" 
				href="{{ route('saludos', 'Daniel') }}">Saludos</a>
			<a class="{{ activeMenu('mensajes/create') }}" 
				href="{{ route('messages.create') }}">Contactos</a>
				<a class="{{ activeMenu('mensajes') }}" 
				href="{{ route('messages.index') }}">Mensajes</a>
		</nav>
	</header>
	@yield('contenido')
	<footer>Copyright {{ date('Y') }}</footer>

</body>
</html>
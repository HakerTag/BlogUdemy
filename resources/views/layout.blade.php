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
{{--  --}}
<nav class="navbar navbar-expand-lg navbar navbar-light" >

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #e3f2fd;">
    <ul class="navbar-nav container" id="myTab">
    	<li class="nav-item {{ activeMenu('/') }}" id="home-tab"><a class="nav-link" href="{{ route('home') }}">Home</a>
		</li>
		<li class="nav-item  {{ activeMenu('saludos*') }}" id="saludos-tab"><a class="nav-link" href="{{ route('saludos', 'Daniel') }}">Saludos</a>
		</li>
		<li class="nav-item  {{ activeMenu('mensajes/create') }}" id="contacto-tab"><a class="nav-link" href="{{ route('mensajes.create') }}">Contactos</a>
		</li>
		@if(auth()->check())
		<li class="nav-item  {{ activeMenu('mensajes*') }}">
			<a class="nav-link" href="{{ route('mensajes.index') }}" id="mensajes-tab">Mensajes</a>
		</li>
		@endif

     	
		
    </ul>
    <ul class="navbar-nav my-2 my-lg-0">
        @if(auth()->guest())
    	<li style="float: right;" class="nav-item active {{ activeMenu('login') }}">
			<a class="nav-link" href="/login">Login</a>
		</li>
   		@else
   		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ auth()->user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
        </div>
      </li>
   		@endif
   	</ul>
  </div>
</nav> 



		{{-- <h1>{{ request()->is('/') ? 'Estas en el Home' : 'No estas en el home'}}</h1> --}}
		
	</header>
	<div class="container">
		@yield('contenido')
		<hr>
	<footer>Copyright {{ date('Y') }}</footer>

	</div>
	<script src="/js/app.js"></script>
	

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
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
	<link rel="stylesheet" href="/css/app.css">
	<title>@yield('title','Mi sitio')</title>
</head>
<body>
	
	<header>
		<?php function activeMenu($url){
		return request()->is($url) ?  'active' : '';
		}?>	        
<nav class="navbar navbar-expand-sm navbar navbar-light" >

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #e3f2fd;">
    <ul class="navbar-nav container" id="myTab">
    	<li class="nav-item {{ activeMenu('/') }}" id="home-tab">
    		<a class="nav-link" href="{{ route('home') }}">Home</a>
		</li>
		<li class="nav-item  {{ activeMenu('mensajes/create') }}" id="contacto-tab"><a class="nav-link" href="{{ route('mensajes.create') }}">Contactos</a>
		</li>
		
		@if(auth()->check())
		<li class="nav-item  {{ activeMenu('mensajes*') }}">
			<a class="nav-link" href="{{ route('mensajes.index') }}" id="mensajes-tab">Mensajes</a>
		</li>
		@if (auth()->user()->hasRoles(['admin','estudiante']))
		<li class="nav-item  {{ activeMenu('usuarios*') }}">
			<a class="nav-link" href="{{ route('usuarios.index') }}" id="usuarios-tab">Usuarios</a>
		</li>
		@endif
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
          <a class="dropdown-item" href="/usuarios/{{ auth()->id() }}/edit">Mi Cuenta</a>
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
	<script type="/js/vue.min"></script>
	

</body>
</html>
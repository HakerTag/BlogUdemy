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

<nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav container mr-auto">
    	<li class="nav-item active {{ activeMenu('/') }}"><a class="nav-link" href="{{ route('home') }}">Home</a>
		</li>
		<li class="nav-item active {{ activeMenu('saludos*') }}" ><a class="nav-link" href="{{ route('saludos', 'Daniel') }}">Saludos</a>
		</li>
		<li class="nav-item active {{ activeMenu('mensajes/create') }}" ><a class="nav-link" href="{{ route('mensajes.create') }}">Contactos</a>
		</li>
		@if(auth()->check())
			<a class="{{ activeMenu('mensajes') }}" 
				href="{{ route('mensajes.index') }}">Mensajes</a>
				
			
				@endif
				
		

     {{--   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>--}}
		
    </ul>
    <ul class="navbar-nav">
        @if(auth()->guest())
    	<li class="nav-item active {{ activeMenu('login') }}">
			<a class="nav-link" href="/login">Login</a>
		</li>
   		@else
   		<li>
   			<a href="/logout">Cerrar sesion de {{ auth()->user()->name }}</a>
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
	

</body>
</html>
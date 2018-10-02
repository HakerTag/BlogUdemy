@extends('layout')
@section('contenido')
	<h1>Nuevo Usuario</h1>
	<form method="POST" action="{{ route('usuarios.store') }}">
			
		@include('users.form', ['user' => new App\User])

		<button class="btn btn-primary">Guardar</button>
	</form>
@endsection
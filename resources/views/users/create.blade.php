@extends('layout')
@section('contenido')

	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 mx-auto">
				<form class="shadow bg-white rounded py-3 px-4" method="POST" action="{{ route('usuarios.store') }}">
					<h1 class="display-4">Nuevo Usuario</h1>
					<hr>
					@include('users.form', ['user' => new App\User])

					<button class="btn btn-primary">Guardar</button>
				</form>
			</div>
		</div>
	</div>
@endsection
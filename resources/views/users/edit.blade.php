@extends('layout')
@section('contenido')
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 mx-auto">
				@if( session()->has('info') )
			<div class="alert alert-primary alert-dismissible fade show" role="alert">
						{{ session('info') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		@endif
		<form class="shadow bg-white rounded py-3 px-4"
		method="POST"
		action="{{ route('usuarios.update', $user->id) }}"
		enctype="multipart/form-data">
			<h1 class="display-4">Editar Usuario</h1>
			<hr>
			{!! method_field('PUT') !!}
			<div class="container">
			<img width="100px" src="{{ Storage::url( $user->avatar ) }}" alt="">
			</div>
		@include('users.form')

		<button class="btn btn-primary">Enviar</button>
		</form>
			</div>
		</div>
	</div>
@endsection
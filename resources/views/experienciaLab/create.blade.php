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
				action="{{ route('expLaboral.store') }}"
				enctype="multipart/form-data">
				@csrf
			<h1>Experiencia Laboral</h1>
			<h3>Información de la Empresa</h3>
			<label for="empresa">Empresa</label>
				<input class="form-control shadow-sm bg-light @error('empresa') is-invalid @else border-0 @enderror"
				 type="text" name="empresa" value="{{ $user->empresa ?? old('empresa')}}">
				@error('empresa')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="puesto">Puesto</label>
				<input class="form-control shadow-sm bg-light @error('puesto') is-invalid @else border-0 @enderror"
				 type="text" name="puesto" value="{{ $user->puesto ?? old('puesto')}}">
				@error('puesto')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="departamento">Departamento</label>
				<input class="form-control shadow-sm bg-light @error('departamento') is-invalid @else border-0 @enderror"
				 type="text" name="departamento" value="{{ $user->departamento ?? old('departamento')}}">
				@error('departamento')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="telefono">Telefono</label>
				<input class="form-control shadow-sm bg-light @error('telefono') is-invalid @else border-0 @enderror"
				 type="text" name="telefono" value="{{ $user->telefono ?? old('telefono')}}">
				@error('telefono')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="correo">Correo de la empresa</label>
				<input class="form-control shadow-sm bg-light @error('correo') is-invalid @else border-0 @enderror"
				 type="email" name="correo" value="{{ $user->correo ?? old('correo')}}">
				@error('correo')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="fecha_inicio">Fecha de Inicio</label>
				<input class="form-control shadow-sm bg-light @error('fecha_inicio') is-invalid @else border-0 @enderror"
				 type="date" name="fecha_inicio" value="{{ $user->fecha_inicio ?? old('fecha_inicio')}}">
				@error('fecha_inicio')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="fecha_termino">Fecha de Termino</label>
				<input class="form-control shadow-sm bg-light @error('fecha_termino') is-invalid @else border-0 @enderror"
				 type="date" name="fecha_termino" value="{{ $user->fecha_termino ?? old('fecha_termino')}}">
				@error('fecha_termino')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<hr>
				<button class="btn btn-outline-success">Agregar</button>
			</form>
			</div>
		</div>
</div>
@endsection
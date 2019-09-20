{!! csrf_field() !!}
	@if($showFields)

	<p><label for="nombre">Nombre</label>
		<input id="nombre"
		class="form-control shadow-sm bg-light @error('nombre') is-invalid @else border-0 @enderror"
		type="text" name="nombre" value="{{ $message->nombr1e ?? old('nombre') }}">
		@error('nombre')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	<label for="email">Email</label>
		<input id="email" class="form-control shadow-sm bg-light @error('nombre') is-invalid @else border-0 @enderror" type="email" name="email" value="{{ $message->email ?? old('email') }}">
		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	@endif
	<label for="mensaje">Mensaje </label>
		<textarea id="mensaje" class="form-control shadow-sm bg-light @error('nombre') is-invalid @else border-0 @enderror" name="mensaje">{{ $message->mensaje ?? old('mensaje') }}</textarea>
		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	<input type="submit" class="btn btn-primary btn-lg btn-block" value="{{ $btnText ?? 'Enviar' }}">
	{{-- {{ var_dump($message->mensaje or old('mensaje')) }} --}}
		@csrf
		<p><label for="avatar"></label>
			<input type="file" name="avatar" class="form-control shadow-sm bg-light @error('avatar') is-invalid @else border-0 @enderror" value="{{ $user->name ?? old('name')}}">
				@error('avatar')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
		</p>

		<label for="name">Nombre</label>
		<input class="form-control shadow-sm bg-light @error('nombre') is-invalid @else border-0 @enderror"
		 type="text" name="name" value="{{ $user->name ?? old('name')}}">
		@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	<label for="email"></label>
		Email
		<input class="form-control hadow-sm bg-light @error('nombre') is-invalid @else border-0 @enderror" type="email" name="email" value="{{ $user->email ?? old('email')}}">
		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

	@unless ($user->id)
		<label for="password">Contraseña</label>
		<input class="form-control hadow-sm bg-light @error('nombre') is-invalid @else border-0 @enderror" type="password" name="password">
		@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

	<label for="password_confirmation"></label>
		Contraseña Confirm
		<input class="form-control hadow-sm bg-light @error('nombre') is-invalid @else border-0 @enderror" type="password" name="password_confirmation">
		@error('password_confirmation')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

	@endunless

	<div class="checkbox">
		@foreach ($roles as $id => $name)
			<label>
				<input
					type="checkbox"
					value="{{ $id }}"
					{{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
					name="roles[]">
				{{ $name }} <br>
			</label>
		@endforeach
	</div>
	{!! $errors->first('roles','<span class=error>:message</span>')  !!}
	<hr>


	{!! csrf_field() !!}
	<p><label for="name">
		Nombre
		<input class="form-control" type="text" name="name" value="{{ $user->name ?? old('name')}}">
		{!! $errors->first('name','<span class=error>:message</span>')  !!}
	</label></p>
	<p><label for="email">
		Email
		<input class="form-control" type="email" name="email" value="{{ $user->email ?? old('email')}}">
		{!!  $errors->first('email','<span class=error>:message</span>') !!}
	</label></p>

	@unless ($user->id)
	<p><label for="password">
		Contraseña
		<input class="form-control" type="password" name="password">
		{!! $errors->first('password','<span class=error>:message</span>')  !!}
	</label></p>

	<p><label for="password_confirmation">
		Contraseña Confirm
		<input class="form-control" type="password" name="password_confirmation">
		{!! $errors->first('password_confirmation','<span class=error>:message</span>')  !!}
	</label></p>
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

	
{!! csrf_field() !!}
	@if($showFields)
		
	<p><label for="nombre">
		Nombre
		<input class="form-control"  type="text" name="nombre" value="{{ $message->nombre ?? old('nombre') }}">
		{!! $errors->first('nombre','<span class=error>:message</span>')  !!}
	</label></p>
	<p><label for="email">
		Email
		<input class="form-control" type="email" name="email" value="{{ $message->email ?? old('email') }}">
		{!!  $errors->first('email','<span class=error>:message</span>') !!}
	</label></p>
	@endif
	<p><label for="mensaje">
		Mensaje
		<textarea class="form-control" name="mensaje">{{ $message->mensaje ?? old('mensaje') }}</textarea>
		{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
	</label></p>
	<input type="submit" class="btn btn-primary" value="{{ $btnText ?? 'Enviar' }}"> 
	{{-- {{ var_dump($message->mensaje or old('mensaje')) }} --}}
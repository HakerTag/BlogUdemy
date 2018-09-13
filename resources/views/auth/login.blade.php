@extends('layout')

@section('contenido')
<h1>Login</h1>
<form method="POST" action="/login">
	{!! csrf_field() !!}
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Paswword">
	<input type="submit" value="Entrar">
</form>
<br>

@endsection
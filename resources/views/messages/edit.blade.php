@extends('layout')
@section('contenido')
	<h1>Editar Mensaje</h1>

	<form class="shadow bg-white rounded py-3 px-4" method="POST" action="{{ route('mensajes.update', $message->id) }}">
		{!! method_field('PUT') !!}
	@include('messages.form', [
		'btnText' => 'Actualizar',
		'showFields' => ! $message->user_id
		])
</form>

@endsection
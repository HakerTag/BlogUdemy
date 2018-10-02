@extends('layout')
@section('contenido')
	<h1>Todos los mensajes</h1>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Mensaje</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($messages as $m)
			<tr>
				<td>{{ $m->id }}</td>
				@if ($m->user_id)
					<td><a href="{{ route('usuarios.show',$m->user_id) }}">
						{{ $m->user->name }}
						</a>
					</td>
					<td>{{ $m->user->email }}</td>
				@else
					<td>{{ $m->nombre }}</td>
					<td>{{ $m->email }}</td>
				@endif
				<td><a href="{{ route('mensajes.show', $m->id) }}">
					{{ $m->mensaje }}</a></td>
				<td>
					<button class="btn btn-info btn-sm"><a href="{{ route('mensajes.edit', $m->id) }}">Editar</button> </a>
					<form style="display: inline;" method="POST" action="{{ route('mensajes.destroy', $m->id)}}">
						{!! csrf_field() !!}
						{{ method_field('DELETE') }}

						<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
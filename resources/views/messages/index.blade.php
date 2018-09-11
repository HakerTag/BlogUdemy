@extends('layout')
@section('contenido')
	<h1>Todos los mensajes</h1>
	<table width="100%" border="1">
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
				<td>
					<a href="{{ route('mensajes.show', $m->id) }}">
					{{ $m->nombre }}
				</a>
				</td>
				<td>{{ $m->email }}</td>
				<td>{{ $m->mensaje }}</td>
				<td><a href="{{ route('mensajes.edit', $m->id) }}"><button>Editar</button></a>
					<form style="display: inline;" method="POST" action="{{ route('mensajes.destroy', $m->id)}}">
						{!! csrf_field() !!}
						{{ method_field('DELETE') }}

						<button type="submit">Eliminar</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table><hr>
@endsection
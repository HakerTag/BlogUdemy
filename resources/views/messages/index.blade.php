@extends('layout')
@section('contenido')
	<h1>Todos los mensajes</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Mensaje</th>
				<th>Notas</th>
				<th>Etiquetas</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($messages as $m)
			<tr>
				<td>{{ $m->id }}</td>
				<td>{{ $m->userName() }}</td>
				<td>{{ $m->userEmail() }}</td>
				<td><a href="{{ route('mensajes.show', $m->id) }}">
					{{ $m->mensaje }}</a></td>
<<<<<<< HEAD
				<td>
					<td>Nota de mensaje</td>
					
=======
				
>>>>>>> 788bf5c997c4e10fa43da18c49f0924fb7370610
					<td>{{ optional( $m->note )->body }}</td>
					<td>{{ $m->tags->pluck('name')->implode(', ') }}</td>
					{{-- <button class="btn btn-info btn-sm"><a href="{{ route('mensajes.edit', $m->id) }}">Editar</button> </a> --}}
					<td>
<<<<<<< HEAD
					<a class="btn btn-primary btn-sm" href="{{ route('mensajes.edit', $m->id) }}">Editar</a> 
=======
					<a class="btn btn-primary btn-sm" href="{{ route('mensajes.edit', $m->id) }}">Editar</a>
>>>>>>> 788bf5c997c4e10fa43da18c49f0924fb7370610
					<form style="display: inline;" method="POST" action="{{ route('mensajes.destroy', $m->id)}}">
						{!! csrf_field() !!}
						{{ method_field('DELETE') }}

						<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
					</form>
				</td>
			</tr>
			@endforeach

			{!! $messages->fragment('hash')->appends(request()->query())->links('pagination::bootstrap-4') !!}
		</tbody>
	</table>
@endsection
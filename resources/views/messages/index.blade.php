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
				<td>{!! $m->present()->userName() !!}</td>
				<td>{{ $m->present()->userEmail() }}</td>
				<td>{!! $m->present()->link() !!}</td>
			
				{{-- <td> --}}
					{{-- <td>Nota de mensaje</td> --}}
					<td>{{ $m->present()->notes() }}</td>
					<td>{{ $m->present()->tags()}}</td>
					<td>
					<a class="btn btn-primary btn-sm" href="{{ route('mensajes.edit', $m->id) }}">Editar</a>
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
@extends('layout')
@section('contenido')
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-11 mx-auto">
				<h1 class="display-4">Usuario</h1>
					<a class="btn btn-primary pull-right" href="{{ route('usuarios.create') }}">Crear Nuevo Usuario</a>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Role</th>
							<th>Notas</th>
							<th>Etiquetas</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<td>{{ $user->id }}</a></td>
							<td>{{ $user->present()->link() }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->present()->roles() }}</td>
							<td>{{ $user->present()->notes() }}</td>
							<td>{{ $user->present()->tags() }}</td>
							<td>
								<a class="btn btn-info btn-sm"
									href="{{ route('usuarios.edit', $user->id) }}">Editar</a>
								<form style="display: inline;"
										method="POST"
										action="{{ route('usuarios.destroy', $user->id)}}">
									@csrf
									{{ method_field('DELETE') }}
									<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
								</form>
							</td>
						@endforeach
						 </tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection


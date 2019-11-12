@extends('layout')
@section('contenido')
<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-11 mx-auto">
			@foreach($datos as $data)

	<h1>Perfil de: {{ $data->name }}</h1>
	<table class="table">
					<thead>
						<tr>
							<th>Empresa</th>
							<th>Telefono</th>
							<th>Puesto</th>
							<th>Correo</th>
							<th>Fecha Inicio</th>
							<th>Fecha Termino</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>


						@foreach($data->expLaborales as $expLaboral)
						<tr>
        					<td>{{ $expLaboral->empresa }}</td>
        					<td>{{ $expLaboral->telefono }}</td>
        					<td>{{ $expLaboral->puesto }}</td>
        					<td>{{ $expLaboral->correo }}</td>
        					<td>{{ $expLaboral->fecha_inicio }}</td>
        					<td>{{ $expLaboral->fecha_termino }}</td>
    					</tr>
    				@endforeach
    				@endforeach
					</tbody>

				</table>
			</div>
		</div>
	</div>
@endsection
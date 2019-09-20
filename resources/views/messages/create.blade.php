@extends('layout')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			@if( session()->has('info') )
				<div class="alert alert-primary alert-dismissible fade show" role="alert">
						{{ session('info') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			@else
			<form class="shadow bg-white rounded py-3 px-4" method="POST" action="{{ route('mensajes.store') }}">
				<h2 class="display-4">Escribeme</h2>
				<hr>
				@include('messages.form', [
					'message' => new App\Message,
					'showFields' => auth()->guest()
					])
			</form>
		</div>
	</div>
</div>
@endif
@endsection

require('./bootstrap');

$('form').on('submit', function(){
	$(this).find('input[type=submit]').attr('disabled', true);
})

Echo.channel('messages-chanel')
	.listen('MessageWasReceived', (data) => {
		let message = data.message;
		let html = `<tr>
						<td>${message.id}</td>
						<td>${message.name}</td>
						<td>${message.email}</td>
						<td>${message.mensaje}</td>
						<td></td>
						<td></td>
						<td>
						<a class="btn btn-primary btn-sm" href="/mensajes/${message.id}/edit">Editar</a>
						<form style="display: inline;" method="POST" action="/mensajes/${message.id}">
							<input type="hidden" name="_token" value="${laravel.csrfToken}" />
							<input type="hidden" name="_method" value="DELETE" />
							<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						</form>
					</td>
				</tr>`;
			$(html).hide().prependTo('tbody').fadeIn();
	})
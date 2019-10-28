<!DOCTYPE html>
<html>
<head>
	<title>Mensaje Recibido</title>
</head>
<body>
	<h1>Te responderemos a la brevedad posible</h1>
	<p>
		Nombre: {{ $data->nombre }} <br>
		Email: {{ $data->email }} <br>
		Mensaje: {{ $data->mensaje }}
	</p>
</body>
</html>
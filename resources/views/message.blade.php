<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Demo CHat</title>
</head>
<body>
	<div style="height: 100px; overflow: auto;">
		@if (isset($messages))
			@foreach ($messages as $message)
				<p><strong>{{ $message->author }}</strong>: {{ $message->content }}</p>
			@endforeach
		@endif
	</div>
	<hr>
	<div>
		<form action="" method="post">
			{{ csrf_field() }}
			Name: <input type="text" name="author"><br><br>
			Content: <textarea name="content" id="" cols="30" rows="2"></textarea><br>
			<button type="submit">Send</button>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
	<script>
		var socket = io('http://localhost:6001')
		socket.on('chat:message', function (data) {
			console.log(data)
		})
	</script>
</body>
</html>
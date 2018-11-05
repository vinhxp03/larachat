<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Demo Chat</title>
</head>
<body>
	<div style="height: 300px; overflow: auto;" id="messages" class="messages">
		@if (isset($messages))
			@foreach ($messages as $message)
				<p id="{{ $message->id }}"><strong>{{ $message->author }}</strong>: {{ $message->content }}</p>
			@endforeach
		@endif
	</div>
	<hr>
	<div>
		{{-- <form action="" method="post"> --}}
			{{-- {{ csrf_field() }} --}}
			Name: <input type="text" name="author" id="author"><br><br>
			Content: <input type="text" name="content" id="content"><br>
			<button id="submit">Send</button>
		{{-- </form> --}}
	</div>
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/socket.io.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/socket.js') }}"></script>
	<script>
		
	</script>
</body>
</html>
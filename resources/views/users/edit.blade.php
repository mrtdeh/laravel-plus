<html>
<head>
    <title>Roxo Application</title>
</head>
<body>
<div class="container">


@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div>
	<form method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" name="name" value="{{ $name }}">
		<input type="submit" name="submit" value="save">
	</form>
</div>

</div>
</body>
</html>
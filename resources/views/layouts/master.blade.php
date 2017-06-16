<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title')
	</title>
</head>
<body>
	@section('sidebar')
		
	@show

	<div class="container">
	@yield('content')
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<link rel="stylesheet" text="text/css" href="{{ URL::to('src/css/admin.css') }}">
	@yield('styles')
</head>
<body>
	@include('includes.admin-header')
	@yield('content')
	
	<script type="text/javascript">
		var baseUrl = "{{ URL::to('/') }}";
	</script>
	@yield('scripts')
</body>
</html>
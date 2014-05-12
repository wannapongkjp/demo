<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>{{ title }}</title>
		<link rel="stylesheet" type="text/css" href="{{ static_url("css/auth.min.css") }}" />
    	<link rel="stylesheet" type="text/css" href="{{ static_url("css/base.min.css") }}" />
		<link rel="stylesheet" type="text/css" href="{{ static_url("css/homework.min.css") }}" />
		<link rel="stylesheet" type="text/css" href="{{ static_url("css/news.min.css") }}" />
		<link rel="stylesheet" type="text/css" href="{{ static_url("css/profile.min.css") }}" />
		<link rel="stylesheet" type="text/css" href="{{ static_url("css/settings.min.css") }}" />
	</head>
	<body>
	{{ content() }}
	<script type="text/javascript" src="{{ static_url("js/auth.min.js") }}"></script>
	<script type="text/javascript" src="{{ static_url("js/base.min.js") }}"></script>
	<script type="text/javascript" src="{{ static_url("js/profile.min.js") }}"></script>
	<script type="text/javascript" src="{{ static_url("js/settings.min.js") }}"></script>
	</body>
</html>

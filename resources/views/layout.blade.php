<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ config('app.name', 'Electro Shop') }}</title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>

</head>

<body>


	@include('includes/header')

	@include('includes/navigation')
	
	@yield('main')
	
	@include('includes/footer')


	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/slick.min.js')}}"></script>
	<script src="{{asset('js/nouislider.min.js')}}"></script>
	<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>

</body>

</html>
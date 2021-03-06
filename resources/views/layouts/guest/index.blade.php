<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		{!! SEOMeta::generate() !!}
	    {!! OpenGraph::generate() !!}
	    {!! Twitter::generate() !!}
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	    <meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" href="{{url('/storage/icon/favicon.ico')}}">
		<link rel="stylesheet" type="text/css" href="{{url('/assets/bootstrap/dist/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{url('/assets/roboto/roboto.css')}}">
		@stack('style')
		<style type="text/css">
			body{
				overflow-x: hidden;
			}
		</style>
	</head>
	<body>
		@yield('body')
	</body>
	<footer>
		@yield('footer')
	</footer>
	<script type="text/javascript" src="{{url('/assets/jquery/dist/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('/assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	@stack('script')
</html>
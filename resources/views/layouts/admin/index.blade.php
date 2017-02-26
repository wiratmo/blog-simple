<!DOCTYPE html>
<html>
<head>
	<title>Kaatas Administrator</title>
<link rel="shortcut icon" href="{{url('/storage/icon/favicon.ico')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/nprogress/nprogress.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/summernote/summernote.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/custom.css')}}">

<script>
	UPLOADCARE_PUBLIC_KEY = 'c6812da86a365fbaeb98';
</script>

<script>
	window.Laravel = {!! json_encode([
	    'csrfToken' => csrf_token(),
	]) !!};
</script>
@stack('style')
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				@include('layouts.admin.navigationLeft')
			</div>
			<div class="top_nav">
				@include('layouts.admin.navigationTop')
			</div>
			<div class="right_col" role="main">
				@yield('main')
			</div>
		</div>
	</div>
</body>
<footer>
<div class="pull-right">
Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com" rel="nofollow">Colorlib</a>
Development by <a href="{{url('/')}}">Kaatas </a> 
@yield('footer')
</div>
<div class="clearfix"></div>
</footer>
<script type="text/javascript" src="{{url('/assets/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/summernote/summernote.js')}}"></script>
<script type="text/javascript" src="{{url('assets/summernote/plugin/uploadcare/uploadcare.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/fastclick/lib/fastclick.js')}}"></script>
<!-- <script type="text/javascript" src="{{url('/assets/nprogress/nprogress.js')}}"></script> -->
<script type="text/javascript" src="{{url('/assets/admin/js/custom.js')}}"></script>
<script type="text/javascript">
	$(function() {
          $('#summernote').summernote({
            // unfortunately you can only rewrite
            // all the toolbar contents, on the bright side
            // you can place uploadcare button wherever you want
            height: 350,
            toolbar: [
              ['uploadcare', ['uploadcare']], // here, for example
              ['style', ['style']],
              ['font', ['bold', 'italic', 'underline', 'clear']],
              ['fontname', ['fontname']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['height', ['height']],
              ['table', ['table']],
              ['insert', ['media', 'link', 'hr']],
              ['view', ['fullscreen', 'codeview']]
            ],
            uploadcare: {
              // button name (default is Uploadcare)
              buttonLabel: 'Image / file',
              // font-awesome icon name (you need to include font awesome on the page)
              buttonIcon: 'picture-o',
              // text which will be shown in button tooltip
              tooltipText: 'Upload files or video or something',

              // uploadcare widget options,
              // see https://uploadcare.com/documentation/widget/#configuration
              publicKey: 'c6812da86a365fbaeb98', // set your API key
              crop: 'free',
              tabs: 'all',
              multiple: true
            }
          });
        });
</script>
@stack('script')
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>LARAMIZ - BẤT ĐỘNG SẢN ONLINE</title>
	<meta charset="UTF-8">
	<meta name="description" content="LERAMIZ Landing Page Template">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="client/img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('client/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('client/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('client/css/animate.css')}}"/>
	<link rel="stylesheet" href="{{asset('client/css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('client/css/style.css')}}"/>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	@include('client.header')


  @yield('content')




	<!-- Footer section -->
	@include('client.footer')
	<!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('client/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('client/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('client/js/masonry.pkgd.min.js')}}"></script>
	<script src="{{asset('client/js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('client/js/main.js')}}"></script>
</body>
</html>

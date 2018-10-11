<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="layout/admin/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="layout/admin/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Trang quản trị</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('layout/admin/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('layout/admin/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('layout/admin/css/paper-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('layout/admin/css/demo.css')}}" rel="stylesheet" />

		<!-- Custom css -->
		<link href="{{asset('layout/admin/css/custom.css')}}" rel="stylesheet" />
    <!--  Fonts and icons     -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('layout/admin/css/themify-icons.css')}}" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>

</head>
<body>

<div class="wrapper">
    @include('admin.sidebar')

    <div class="main-panel">
        @include('admin.navbar')


        @yield('content')


        @include('admin.footer')

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{asset('layout/admin/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('layout/admin/js/bootstrap.min.js')}}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{asset('layout/admin/js/bootstrap-checkbox-radio.js')}}"></script>

	<!--  Charts Plugin -->
	<!-- <script src="{{asset('layout/admin/js/chartist.min.js')}}"></script> -->

    <!--  Notifications Plugin    -->
    <script src="{{asset('layout/admin/js/bootstrap-notify.js')}}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
		<script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{asset('layout/admin/js/paper-dashboard.js')}}"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="{{asset('layout/admin/js/demo.js')}}"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>

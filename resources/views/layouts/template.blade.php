<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('title')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- forms CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/form/all-type-forms.css') }}">
	<!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ url('antarmuka/img/favicon.ico') }}">
	<!-- Google Fonts
		============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/bootstrap.min.css') }}">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/font-awesome.min.css') }}">
	<!-- nalika Icon CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/nalika-icon.css') }}">
	<!-- owl.carousel CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ url('antarmuka/css/owl.theme.css') }}">
	<link rel="stylesheet" href="{{ url('antarmuka/css/owl.transitions.css') }}">
	<!-- animate CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/animate.css') }}">
	<!-- normalize CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/normalize.css') }}">
	<!-- meanmenu icon CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/meanmenu.min.css') }}">
	<!-- main CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/main.css') }}">
	<!-- morrisjs CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/morrisjs/morris.css') }}">
	<!-- mCustomScrollbar CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
	<!-- metisMenu CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/metisMenu/metisMenu.min.css') }}">
	<link rel="stylesheet" href="{{ url('antarmuka/css/metisMenu/metisMenu-vertical.css') }}">
	<!-- calendar CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/calendar/fullcalendar.min.css') }}">
	<link rel="stylesheet" href="{{ url('antarmuka/css/calendar/fullcalendar.print.min.css') }}">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('antarmuka/css/form/all-type-forms.css') }}">
	<!-- style CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/style.css') }}">
	<!-- responsive CSS
		============================================ -->
	<link rel="stylesheet" href="{{ url('antarmuka/css/responsive.css') }}">
	<!-- modernizr JS
		============================================ -->
	<script src="{{ url('antarmuka/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>

	<div class="left-sidebar-pro">
		@include('layouts.sidebar')
	</div>

	<!-- Start Welcome area -->
	<div class="all-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="logo-pro">
						<a href="#"><img class="main-logo" src="{{ url('antarmuka/img/logo/logo.png') }}" alt="" /></a>
					</div>
				</div>
			</div>

            <div class="header-advance-area">
                @include('layouts.navbar')
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            @yield('breadcrumb')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
		</div>

		@include('layouts.footer')
	</div>

	<!-- jquery
		============================================ -->
	<script src="{{ url('antarmuka/js/vendor/jquery-1.12.4.min.js') }}"></script>
	<!-- bootstrap JS
		============================================ -->
	<script src="{{ url('antarmuka/js/bootstrap.min.js') }}"></script>
	<!-- wow JS
		============================================ -->
	<script src="{{ url('antarmuka/js/wow.min.js') }}"></script>
	<!-- price-slider JS
		============================================ -->
	<script src="{{ url('antarmuka/js/jquery-price-slider.js') }}"></script>
	<!-- meanmenu JS
		============================================ -->
	<script src="{{ url('antarmuka/js/jquery.meanmenu.js') }}"></script>
	<!-- owl.carousel JS
		============================================ -->
	<script src="{{ url('antarmuka/js/owl.carousel.min.js') }}"></script>
	<!-- sticky JS
		============================================ -->
	<script src="{{ url('antarmuka/js/jquery.sticky.js') }}"></script>
	<!-- scrollUp JS
		============================================ -->
	<script src="{{ url('antarmuka/js/jquery.scrollUp.min.js') }}"></script>
	<!-- mCustomScrollbar JS
		============================================ -->
	<script src="{{ url('antarmuka/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	<script src="{{ url('antarmuka/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
	<!-- metisMenu JS
		============================================ -->
	<script src="{{ url('antarmuka/js/metisMenu/metisMenu.min.js') }}"></script>
	<script src="{{ url('antarmuka/js/metisMenu/metisMenu-active.js') }}"></script>
	<!-- sparkline JS
		============================================ -->
	<script src="{{ url('antarmuka/js/sparkline/jquery.sparkline.min.js') }}"></script>
	<script src="{{ url('antarmuka/js/sparkline/jquery.charts-sparkline.js') }}"></script>
	<!-- calendar JS
		============================================ -->
	<script src="{{ url('antarmuka/js/calendar/moment.min.js') }}"></script>
	<script src="{{ url('antarmuka/js/calendar/fullcalendar.min.js') }}"></script>
	<script src="{{ url('antarmuka/js/calendar/fullcalendar-active.js') }}"></script>
	<!-- float JS
		============================================ -->
	<script src="{{ url('antarmuka/js/flot/jquery.flot.js') }}"></script>
	<script src="{{ url('antarmuka/js/flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ url('antarmuka/js/flot/curvedLines.js') }}"></script>
	<script src="{{ url('antarmuka/js/flot/flot-active.js') }}"></script>
	<!-- plugins JS
		============================================ -->
	<script src="{{ url('antarmuka/js/plugins.js') }}"></script>
	<!-- main JS
		============================================ -->
	<script src="{{ url('antarmuka/js/main.js') }}"></script>
    <!-- data table JS
		============================================ -->
    <script src="{{ url('antarmuka/js/data-table/bootstrap-table.js') }}"></script>
    <script src="{{ url('antarmuka/js/data-table/tableExport.js') }}"></script>
    <script src="{{ url('antarmuka/js/data-table/data-table-active.js') }}"></script>
    <script src="{{ url('antarmuka/js/data-table/bootstrap-table-editable.js') }}"></script>
    <script src="{{ url('antarmuka/js/data-table/bootstrap-editable.js') }}"></script>
    <script src="{{ url('antarmuka/js/data-table/bootstrap-table-resizable.js') }}"></script>
    <script src="{{ url('antarmuka/js/data-table/colResizable-1.5.source.js') }}"></script>
    <script src="{{ url('antarmuka/js/data-table/bootstrap-table-export.js') }}"></script>
    @stack('scripts')
</body>

</html>

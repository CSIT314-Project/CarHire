<!doctype html>
<html lang="en">
<head>

	@include('Partials._header')  <!--call to the header-->

</head>
<body>

	@yield('register')  <!--call to the register page content-->
	@yield('dashboard') <!--call to the dashboard page content-->
	@yield('login') <!--call to the login page content-->
	@yield('search')  <!--call to the search page content-->
	@yield('settings') <!--call to the settings page content-->
	@yield('garage') <!--call to the garage page content-->
	@yield('sorry')
	
	@include('Partials._footer')  <!--call to the footer content-->

	@include('Partials._script')  <!--call to the popper and bootstrap javascript-->
</body>
</html>
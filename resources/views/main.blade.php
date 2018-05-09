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

  @include('Partials._footer')  <!--call to the footer content-->

  @include('Partials._script')  <!--call to the popper and bootstrap javascript-->
</body>
</html>
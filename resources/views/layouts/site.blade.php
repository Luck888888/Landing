<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>LandingPage</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS
  ================================================== -->
@include('layouts.styles')
</head>

<body id="top">
<!-- header
================================================== -->
  @yield('header')


<!-- intro section
================================================== -->
   @yield('content')


<!-- Java Script
================================================== -->
@include('layouts/scripts')
</body>
</html>
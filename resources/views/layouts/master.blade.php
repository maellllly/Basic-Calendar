<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="description" content="Calendar for Appetiser Apps">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta name="author" content="Lance Aranda">

  <title> @yield('title', config('adminlte.php')) </title>


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('public/adminlte/plugins/bootstrap/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/public/vendor/adminlte/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('/public/adminlte/plugins/toastr/toastr.min.css') }}">

  <link rel="stylesheet" href="{{ asset('/public/adminlte/plugins/sweetalert2/sweetalert.min.css') }}">


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @yield('adminlte_css')  
</head>

<body class="hold-transition sidebar-mini @yield('body_class')">

  @yield('body')


<script src="{{ asset('public/adminlte/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- SlimScroll -->
<script src="{{ asset('public/adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('public/adminlte/plugins/sweetalert2/sweetalert.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

@yield('adminlte_js')

<script src="{{ asset('public/adminlte/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('public/vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>

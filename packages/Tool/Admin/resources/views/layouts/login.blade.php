<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <script src="https://kit.fontawesome.com/8742cb18fb.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body class="bg-base">
<div>
    @yield('content')
</div>
<script src="{{asset('/')}}js/common/jquery-3.6.0.min.js"></script>
</body>
</html>

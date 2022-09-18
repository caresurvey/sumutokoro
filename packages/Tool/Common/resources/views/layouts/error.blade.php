<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <script src="https://kit.fontawesome.com/8742cb18fb.js" crossorigin="anonymous"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="drawer">
  <input id="menu-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
    @include('general::layouts.header')
    <div class="shadow shadow-md shadow-inner p-5">
      @yield('content')
    </div>
    @include('general::layouts.footer')
  </div>
  @include('general::layouts.drawer')
</div>

<script src="{{asset('/')}}js/admin/jquery-3.6.0.min.js"></script>
<script src="{{asset('/')}}js/general/general.js"></script>
<script src="{{asset('/')}}js/common/common.js"></script>
</body>
</html>

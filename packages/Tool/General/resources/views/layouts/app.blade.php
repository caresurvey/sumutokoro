<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  @include('general::layouts.analytics')
  @include('general::layouts.captcha')

  <!-- fB-OG -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="@yield('title')">
  <meta property="og:description" content="@yield('description')">
  <meta property="og:site_name" content="sumutokoro.com">
  <meta property="og:url" content="https://sumutokoro.com/">
  <meta property="og:image" content="https://sumutokoro.com/img/og.png">
  <meta property="fb:app_id" content=""></head>

  <script src="https://kit.fontawesome.com/8742cb18fb.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('/')}}css/toastr.min.css">
@vite('resources/css/app.css')

<body class="bg-base {{ $controllerName }} {{ $actionName }}" id="Top">

<div class="drawer">
  <input id="menu-drawer" type="checkbox" class="drawer-toggle">
  <div id="app" class="drawer-content">
    @include('general::layouts.header')
    <div class="pb-20">
      @yield('content')
    </div>
    @include('general::layouts.footer')
  </div>
  @include('general::layouts.drawer')
</div>


<script src="{{asset('/')}}js/common/jquery-3.6.0.min.js"></script>
<script src="{{asset('/')}}js/common/common.js"></script>
<script src="{{asset('/')}}js/general/general_common.js"></script>
@vite('resources/js/app.js')
</body>
</html>

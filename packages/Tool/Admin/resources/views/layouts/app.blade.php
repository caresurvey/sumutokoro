<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <script src="https://kit.fontawesome.com/8742cb18fb.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('/')}}css/admin.css">
  <link rel="stylesheet" href="{{asset('/')}}css/toastr.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
  @vite('resources/css/app.css')
</head>
<body class="bg-base {{ $controllerName }} {{ $actionName }}" id="Top">
@include('admin::layouts.header')
<div id="app" class="hidden sm:block">
  <div class="flex flex-wrap">
    <aside class="w-fill w-1/6 md:2/6 h-screen sticky top-0 bg-side_color text-white">
      @include('admin::layouts.side')
    </aside>
    <main class="w-fill w-5/6 md:4/6 pt-3 px-5 pb-20 tracking-wider">
      @yield('content')
    </main>
  </div>
</div>
<div class="block sm:hidden">
  @include('admin::layouts.mobile')
</div>
@include('general::layouts.footer')

<script src="{{asset('/')}}js/common/jquery-3.6.0.min.js"></script>
<script src="{{asset('/')}}js/common/toastr.min.js"></script>
<script src="{{asset('/')}}js/common/common.js"></script>
@vite('resources/js/app.js')
@include('admin::common.toastr.save')
@include('admin::layouts.extends_script')
<input type="hidden" name="controllerName" value="{{ $controllerName }}">
<input type="hidden" name="actionName" value="{{ $actionName }}">
</body>
</html>

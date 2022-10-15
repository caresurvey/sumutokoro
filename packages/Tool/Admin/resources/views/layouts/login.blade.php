<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  {{-- GoogleAnalyticsタグここから --}}
  @production
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id={{config('myapp.analytics_key')}}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{config('myapp.analytics_key')}}');
  </script>
  @endproduction
  {{-- GoogleAnalyticsタグここまで --}}
  <?php if ($_SERVER['HTTP_HOST'] === 'sumutokoro.com'): ?>
  <?php endif;?>
  {{-- GoogleCAPTCHAタグここから --}}
  @production
  {!! RecaptchaV3::initJs() !!}
  @endproduction
  {{-- GoogleCAPTCHAタグここまで --}}

  <!-- favicon -->
  <meta name="msapplication-square70x70logo" content="{{asset('/')}}site-tile-70x70.png">
  <meta name="msapplication-square150x150logo" content="/{{asset('/')}}site-tile-150x150.png">
  <meta name="msapplication-wide310x150logo" content="{{asset('/')}}site-tile-310x150.png">
  <meta name="msapplication-square310x310logo" content="{{asset('/')}}site-tile-310x310.png">
  <meta name="msapplication-TileColor" content="#0078d7">
  <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="{{asset('/')}}img/favicon/favicon.ico">
  <link rel="icon" type="image/vnd.microsoft.icon" href="{{asset('/')}}img/favicon/favicon.ico">
  <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/')}}img/favicon/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="{{asset('/')}}img/favicon/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('/')}}img/favicon/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/')}}img/favicon/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('/')}}img/favicon/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="{{asset('/')}}img/favicon/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="{{asset('/')}}img/favicon/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('/')}}img/favicon/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/')}}img/favicon/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="36x36" href="{{asset('/')}}img/favicon/android-chrome-36x36.png">
  <link rel="icon" type="image/png" sizes="48x48" href="{{asset('/')}}img/favicon/android-chrome-48x48.png">
  <link rel="icon" type="image/png" sizes="72x72" href="{{asset('/')}}img/favicon/android-chrome-72x72.png">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/')}}img/favicon/android-chrome-96x96.png">
  <link rel="icon" type="image/png" sizes="128x128" href="{{asset('/')}}img/favicon/android-chrome-128x128.png">
  <link rel="icon" type="image/png" sizes="144x144" href="{{asset('/')}}img/favicon/android-chrome-144x144.png">
  <link rel="icon" type="image/png" sizes="152x152" href="{{asset('/')}}img/favicon/android-chrome-152x152.png">
  <link rel="icon" type="image/png" sizes="192x192" href="{{asset('/')}}img/favicon/android-chrome-192x192.png">
  <link rel="icon" type="image/png" sizes="256x256" href="{{asset('/')}}img/favicon/android-chrome-256x256.png">
  <link rel="icon" type="image/png" sizes="384x384" href="{{asset('/')}}img/favicon/android-chrome-384x384.png">
  <link rel="icon" type="image/png" sizes="512x512" href="{{asset('/')}}img/favicon/android-chrome-512x512.png">
  <link rel="icon" type="image/png" sizes="36x36" href="{{asset('/')}}img/favicon/icon-36x36.png">
  <link rel="icon" type="image/png" sizes="48x48" href="{{asset('/')}}img/favicon/icon-48x48.png">
  <link rel="icon" type="image/png" sizes="72x72" href="{{asset('/')}}img/favicon/icon-72x72.png">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/')}}img/favicon/icon-96x96.png">
  <link rel="icon" type="image/png" sizes="128x128" href="{{asset('/')}}img/favicon/icon-128x128.png">
  <link rel="icon" type="image/png" sizes="144x144" href="{{asset('/')}}img/favicon/icon-144x144.png">
  <link rel="icon" type="image/png" sizes="152x152" href="{{asset('/')}}img/favicon/icon-152x152.png">
  <link rel="icon" type="image/png" sizes="160x160" href="{{asset('/')}}img/favicon/icon-160x160.png">
  <link rel="icon" type="image/png" sizes="192x192" href="{{asset('/')}}img/favicon/icon-192x192.png">
  <link rel="icon" type="image/png" sizes="196x196" href="{{asset('/')}}img/favicon/icon-196x196.png">
  <link rel="icon" type="image/png" sizes="256x256" href="{{asset('/')}}img/favicon/icon-256x256.png">
  <link rel="icon" type="image/png" sizes="384x384" href="{{asset('/')}}img/favicon/icon-384x384.png">
  <link rel="icon" type="image/png" sizes="512x512" href="{{asset('/')}}img/favicon/icon-512x512.png">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}img/favicon/icon-16x16.png">
  <link rel="icon" type="image/png" sizes="24x24" href="{{asset('/')}}img/favicon/icon-24x24.png">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}img/favicon/icon-32x32.png">
  <link rel="manifest" href="{{asset('/')}}img/favicon/manifest.json">

  <script src="https://kit.fontawesome.com/8742cb18fb.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  @vite('resources/css/app.css')
</head>
<body class="bg-base">
<div>
    @yield('content')
</div>
<script src="{{asset('/')}}js/common/jquery-3.6.0.min.js"></script>
<script src="{{asset('/')}}js/common/toastr.min.js"></script>
@include('user::common.toastr.save')
@if(!empty($data['isSpotEdit']))
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
          integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
          crossorigin=""></script>
  <script src="https://cdn.geolonia.com/community-geocoder.js"></script>
  <script src="{{asset('/')}}js/admin/admin_spot_map.js"></script>
@endif

@if(!empty($data['isCompanyEdit']))
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
          integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
          crossorigin=""></script>
  <script src="https://cdn.geolonia.com/community-geocoder.js"></script>
  <script src="{{asset('/')}}js/admin/admin_company_map.js"></script>
@endif
@vite('resources/js/app.js')
<input type="hidden" name="controllerName" value="{{ $controllerName }}">
<input type="hidden" name="actionName" value="{{ $actionName }}">
</body>
</html>

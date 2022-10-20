<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  {{-- GoogleAnalyticsタグここから --}}
  @production
    @if($_SERVER['HTTP_HOST'] === 'sumutokoro.com')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{config('myapp.analytics_key')}}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{config('myapp.analytics_key')}}');
    </script>
    @endif
  @endproduction
  {{-- GoogleAnalyticsタグここまで --}}

  {{-- GoogleCAPTCHAタグここから --}}
  @production
    @if($_SERVER['HTTP_HOST'] === 'sumutokoro.com')
    {!! RecaptchaV3::initJs() !!}
    @endif
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
  <link rel="stylesheet" href="{{asset('/')}}css/admin.css">
  <link rel="stylesheet" href="{{asset('/')}}css/toastr.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
  @vite('resources/css/app.css')
</head>
<body class="bg-base {{ $controllerName }} {{ $actionName }}" id="Top">

    {{-- headerここから --}}
    <header class="shadow bg-white p-3 xl:p-4" id="header">
      <div class="w-full xl:container xl:mx-auto lg:w-xl">
        <div class="flex items-center justify-between">
          <div class="flex items-center w-1/2 sm:w-2/6 lg:w-1/6">
            <label for="menu-drawer" class="block mr-4 cursor-pointer hover:text-primary active:text-primary lg:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                   class="inline-block w-8 h-8 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </label>
            <a href="{{asset('/')}}" class="hover:opacity-70">
              <img src="{{asset('/')}}img/general/base/header_logo.png"
                   class="" alt="すむところ〜老人ホーム・介護施設を探すなら"></a>
          </div>
          <div class="hidden sm:inline-block w-3/4 sm:w-4/6 lg:w-5/6">
            <div class="flex items-center justify-end">
              @if(!empty($search['cities']))
              <div class="form-control">
                <form action="{{asset('/')}}spot" method="get">
                  <div class="flex">
                    <select name="search[city]" id="HeaderSearchCity"
                            class="-mr-1 select select-bordered rounded-r-lg rounded-full select-sm text-xs lg:text-md lg:select-md">
                      <option value="1">地域を選択</option>
                      @foreach($search['cities'] as $city)
                        @if($city['spots_count'] > 0)
                          <option value="{{$city['id']}}" id="HeaderSearchCity{{$city['id']}}" 
                              @if($city['id'] === $search['query']['city']) selected @endif>{{$city['name']}}
                            ({{$city['spots_count']}})
                          </option>
                        @endif
                      @endforeach
                    </select>
                    <input type="text" id="HeaderSearchKeyword" name="search[keyword]"
                           value="{{$search['query']['keyword']}}"
                           placeholder="キーワードを入力"
                           class="-mr-1 input rounded-none input-bordered input-sm lg:input-md">
                    <div class="tooltip tooltip-bottom" id="HeaderSearchSubmit" data-tip="事業所を検索する">
                      <button class="btn rounded-l-lg rounded-full btn-sm lg:input-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                        </svg>
                      </button>
                    </div>
                  </div>
                  <input type="hidden" name="search[simple]" value="1">
                </form>
              </div>
              @endif
              <div class="px-2 text-sm">
                @if(Auth::guard('admin')->check())
                  <div class="navbar">
                    <div class="dropdown dropdown-end">
                      <label tabindex="0" class="btn btn-ghost btn-circle">
                        <img src="{{asset('/')}}img/general/base/icon_profile.png" class="w-11/12" alt="{{Auth::guard('admin')->user()->name}}さん">
                      </label>
                      <ul tabindex="0"
                          class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="{{asset('/')}}img/user/profile/">{{Auth::guard('admin')->user()->name}}さん</a></li>
                        <li><a href="{{asset('/')}}img/user/" id="HeaderMenuMypage">マイページ</a></li>
                        <li><a href="{{asset('/')}}img/user/logout" class="logoutBtn" id="HeaderMenuLogout">ログアウト</a></li>
                      </ul>
                    </div>
                  </div>
              </div>
              @else
                <a href="{{asset('/')}}user/login" class="font-bold">ログイン</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </header>
    {{-- headerここまで --}}

    <div id="app" class="hidden sm:block">
      <div class="flex flex-wrap">
        <aside class="w-fill w-1/6 md:2/6 h-screen sticky top-0 bg-side_color text-white">
          <nav class="mt-1 h-fit bg-gray-600">
            <ul class="bg-base-100 text-xs lg:text-sm text-gray-600">
              <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}" class="@if($controllerName==='Home') bg-primary text-white shadow @endif rounded-r-md block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white" id="AdminSideHome">管理画面トップ</a></li>
              <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/spot" class="@if($controllerName==='Spot') bg-primary text-white shadow @endif hover:shadow rounded-r-md block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white" id="AdminSideSpot">事業所管理</a></li>
              <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/company" class="@if($controllerName==='Company') bg-primary text-white shadow @endif rounded-r-md block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white" id="AdminSideCompany">法人管理</a></li>
              <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/news" class="@if($controllerName==='News') bg-primary text-white shadow @endif rounded-r-md block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white" id="AdminSideNews">お知らせ管理</a></li>
              <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/user" class="@if($controllerName==='User') bg-primary text-white shadow @endif rounded-r-md block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white" id="AdminSideUser">ユーザー管理</a></li>
              <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/fax" class="@if($controllerName==='FAX') bg-primary text-white shadow @endif rounded-r-md block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white" id="AdminSideFax">FAX用紙作成</a></li>
              <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/download" class="@if($controllerName==='Download') bg-primary text-white shadow @endif rounded-r-md block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white" id="AdminSideDownload">データダウンロード</a></li>
              <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/contact" class="@if($controllerName==='Contact') bg-primary text-white shadow @endif rounded-r-md block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white" id="AdminSideContact">お問い合わせ履歴</a></li>
              <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/log" class="@if($controllerName==='Log') bg-primary text-white shadow @endif rounded-r-md block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white" id="AdminSideLog">操作履歴</a></li>
              <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/logout" class="logoutBtn rounded-r-md block p-2 md:p-2 hover:bg-primary hover:text-white hover:shadow" id="AdminSideLogout">ログアウト</a></li>
            </ul>
          </nav>
        </aside>
        <main class="w-fill w-5/6 md:4/6 pt-3 px-5 pb-20 tracking-wider">
          @yield('content')
        </main>
      </div>
    </div>
    <div class="block sm:hidden">
      @include('admin::layouts.mobile')
    </div>

    {{-- footerここから --}}
    <footer class="btm-nav bg-base-100 text-xs tracking-wider visible border border-t-1 border-gray-300 sm:invisible">
      <a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        <span class="btm-nav-label">トップ</span>
      </a>
      <a class="active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="w-5 h-5 mr-1">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
        </svg>
        <span class="btm-nav-label">さがす</span>
      </a>
      <a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
        </svg>
        <span class="btm-nav-label">一覧</span>
      </a>
    </footer>


    <footer class="invisible bg-base-200 px-6 py-10 border border-t-1 border-gray-300 sm:visible">
      <div class="mx-auto container">
        <div class="mb-10 justify-center lg:flex lg:justify-between">
          <div class="w-full text-center w-1/3 mb-10 lg:justify-start lg:w-1/5">
            <a href="{{asset('/')}}" class="text-center" id="FooterMenuLogo">
              <img src="{{asset('/')}}img/general/base/footer_logo.png" alt="すむところ.com｜老人ホーム・介護施設をさがすなら">
            </a>
          </div>
          <div class="grid grid-cols-3 gap-8 text-base lg:w-3/5">
            <div>
              <h2 class="mb-4 font-semibold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5 mr-1">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                </svg>
                事業所をさがす
              </h2>
              <ul class="space-y-4 text-sm">
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}search" class="hover:underline" id="FooterMenuSearch">条件でさがす</a>
                </li>
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}spot" class="hover:underline" id="FooterMenuSpot">一覧を見る</a>
                </li>
              </ul>
            </div>
            <div class="mr-8">
              <h2 class="mb-4 font-semibold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5 mr-1">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                </svg>
                登録・修正する
              </h2>
              <ul class="space-y-4 text-sm">
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}user/login" class="hover:underline" id="FooterMenuUserLogin">ユーザーログイン</a>
                </li>
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}user/regist" class="hover:underline" id="FooterMenuRegister">ユーザー登録する</a>
                </li>
              </ul>
            </div>
            <div>
              <h2 class="mb-4 font-semibold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5 mr-1">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z"/>
                </svg>
                コンテンツ
              </h2>
              <ul class="space-y-4 text-sm">
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}img/" class="hover:underline" id="FooterMenuHome">ホーム</a>
                </li>
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}img/service" class="hover:underline" id="FooterMenuService">サービス案内</a>
                </li>
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}img/qa" class="hover:underline" id="FooterMenuQa">よくある質問</a>
                </li>
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}img/contact" class="hover:underline" id="FooterMenuContact">お問い合わせ</a>
                </li>
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}img/company" class="hover:underline" id="FooterMenuCompany">運営会社</a>
                </li>
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}img/privacy" class="link link-hover" id="FooterMenuPrivacy">プライバシーポリシー</a>
                </li>
                <li class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                  </svg>
                  <a href="{{asset('/')}}img/sitemap" class="hover:underline" id="FooterMenuSitemap">サイトマップ</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-xs text-gray-400 tracking-wider sm:text-center">© sumutokoro.com
            </span>
        </div>
      </div>
    </footer>
    {{-- footerここまで --}}
<script src="{{asset('/')}}js/common/jquery-3.6.0.min.js"></script>
<script src="{{asset('/')}}js/common/toastr.min.js"></script>
<script src="{{asset('/')}}js/common/common.js"></script>
@vite('resources/js/app.js')
@include('admin::common.toastr.save')
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
<input type="hidden" name="controllerName" value="{{ $controllerName }}">
<input type="hidden" name="actionName" value="{{ $actionName }}">
</body>
</html>

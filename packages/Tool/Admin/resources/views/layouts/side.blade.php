<nav class="mt-1 h-fit bg-gray-600">
  <ul class="bg-base-100 text-xs lg:text-sm text-gray-600">
    <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}" class="@if($controllerName==='Home') bg-primary text-white @endif hover:shadow rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">管理画面トップ</a></li>
    <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/spot" class="@if($controllerName==='Spot') bg-primary text-white shadow @endif hover:shadow rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">事業所管理</a></li>
    <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/company" class="@if($controllerName==='Company') bg-primary text-white @endif hover:shadow rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">法人管理</a></li>
    <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/news" class="@if($controllerName==='News') bg-primary text-white @endif hover:shadow rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">お知らせ管理</a></li>
    <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/user" class="@if($controllerName==='User') bg-primary text-white @endif hover:shadow rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">ユーザー管理</a></li>
    <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/fax" class="@if($controllerName==='FAX') bg-primary text-white @endif hover:shadow rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">FAX用紙作成</a></li>
    <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/download" class="@if($controllerName==='Download') bg-primary text-white @endif hover:shadow rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">データダウンロード</a></li>
    <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/contact" class="@if($controllerName==='Contact') bg-primary text-white @endif hover:shadow rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">お問い合わせ履歴</a></li>
    <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/log" class="@if($controllerName==='Log') bg-primary text-white @endif hover:shadow rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">操作履歴</a></li>
    <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/logout" class="logoutBtn rounded-r-full block p-2 md:p-2 hover:bg-primary hover:text-white hover:shadow">ログアウト</a></li>
  </ul>
</nav>
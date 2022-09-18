<nav class="mt-1 h-fit bg-gray-600">
  <ul class="bg-base-100 text-xs lg:text-sm text-gray-600">
    <li><a href="{{asset('/')}}user" class="@if($controllerName==='Home') bg-primary text-white @endif rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">マイページトップ</a></li>
    @if(Auth::user()->is_authenticated !== 0)
    <li><a href="{{asset('/')}}user/spot" class="@if($controllerName==='Spot') bg-primary text-white @endif rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">事業所管理</a></li>
    <li><a href="{{asset('/')}}user/company" class="@if($controllerName==='Company') bg-primary text-white @endif rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">法人管理</a></li>
    @endif
    <li><a href="{{asset('/')}}user/profile" class="@if($controllerName==='User') bg-primary text-white @endif rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">プロフィール編集</a></li>
    <li><a href="{{asset('/')}}user/password" class="@if($controllerName==='Password') bg-primary text-white @endif rounded-r-full block mb-1 p-1 md:p-2 hover:bg-primary hover:text-white">パスワード変更</a></li>
    <li><a href="{{asset('/')}}user/logout" class="logoutBtn rounded-r-full block p-2 md:p-2 hover:bg-primary hover:text-white">ログアウト</a></li>
  </ul>
</nav>

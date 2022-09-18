<header class="shadow bg-white p-3 xl:p-4" id="header">
  <div class="flex justify-between items-center w-full">
    <div class="w-1/2">
      <a href="{{asset('/')}}">
        <img src="{{asset('/')}}img/general/base/header_logo.png" class="w-48" alt="すむところ〜老人ホーム・介護施設を探すなら"></a>
    </div>
    <div class="w-1/2">
      @if(Auth::guard('admin')->check())
        <div class="dropdown dropdown-end w-full">
          <div class="flex items-center justify-end">
            <div>
              <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="text-primary w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </label>
            </div>
            <div class="text-xs tracking-wider">
              {{Auth::guard('admin')->user()->name}}<small>さん</small>
            </div>
          </div>
          <ul tabindex="0"
              class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
            <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/">管理画面トップ</a></li>
            <li><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/logout" class="logoutBtn">ログアウト</a></li>
          </ul>
        </div>
      @else
        <a href="{{asset('/')}}user/login" class="font-bold">ログイン</a>
      @endif
    </div>
  </div>
</header>



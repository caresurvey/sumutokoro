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
          <div class="dropdown text-sm space-x-1">
            <ul class="menu menu-horizontal p-0 text-xs md:text-sm">
              <li tabindex="0" class="hidden lg:block">
                <a href="{{asset('/')}}search" class="font-bold">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                  </svg>
                  条件でさがす
                </a>
              </li>
              <li tabindex="1" class="hidden lg:block">
                <a href="{{asset('/')}}spot" class="font-bold">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                  </svg>
                  全件表示
                </a>
              </li>
              <li tabindex="2" class="hidden md:block">
                <a class="font-bold">
                  コンテンツ
                  <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                       viewBox="0 0 24 24">
                    <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/>
                  </svg>
                </a>
                <ul class="p-2 bg-white shadow z-30">
                  <li><a href="{{asset('/')}}">ホーム</a></li>
                  <li><a href="{{asset('/')}}search">条件でさがす</a></li>
                  <li><a href="{{asset('/')}}spot">一覧を見る</a></li>
                  <li><a href="{{asset('/')}}news">お知らせ</a></li>
                  <li><a href="{{asset('/')}}service">サービス案内</a></li>
                  <li><a href="{{asset('/')}}qa">よくある質問</a></li>
                  <li><a href="{{asset('/')}}contact">お問い合わせ</a></li>
                  <li><a href="{{asset('/')}}company">運営会社</a></li>
                  <li><a href="{{asset('/')}}privacy">プライバシーポリシー</a></li>
                  <li><a href="{{asset('/')}}sitemap">サイトマップ</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="form-control">
            <form action="{{asset('/')}}spot" method="get">
              <div class="flex">
                <select name="search[city]" id="HeaderSearchCity"
                        class="-mr-1 select select-bordered rounded-r-lg rounded-full select-sm text-xs lg:text-md lg:select-md">
                  <option value="1">地域を選択</option>
                  @foreach($search['cities'] as $city)
                    @if($city['spots_count'] > 0)
                      <option value="{{$city['id']}}"
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
                <div class="tooltip tooltip-bottom" data-tip="事業所を検索する">
                  <button class="btn rounded-l-lg rounded-full btn-sm lg:btn-md">
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
          <div class="px-2 text-sm">
            @if(Auth::guard('user')->check())
              <div class="navbar">
                <div class="dropdown dropdown-end">
                  @if(Auth::guard('user')->user()->is_authenticated === 1)
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <img src="{{asset('/')}}img/general/base/icon_profile_authenticated.png" class="w-11/12" alt="{{Auth::guard('user')->user()->name}}さん（認証済み）">
                  </label>
                  @else
                  <label tabindex="0" class="btn btn-ghost btn-circle">
                    <img src="{{asset('/')}}img/general/base/icon_profile.png" class="w-11/12" alt="{{Auth::guard('user')->user()->name}}さん">
                  </label>
                  @endif
                  <ul tabindex="0"
                      class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="{{asset('/')}}user/profile/">{{Auth::guard('user')->user()->name}}さん</a></li>
                    <li><a href="{{asset('/')}}user/">マイページ</a></li>
                    <li><a href="{{asset('/')}}user/logout" class="logoutBtn">ログアウト</a></li>
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

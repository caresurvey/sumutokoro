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
        <a href="{{asset('/')}}" class="text-center">
          <img src="{{asset('/')}}img/general/base/footer_logo.png" class="" alt="すむところ.com｜老人ホーム・介護施設をさがすなら">
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
              <a href="{{asset('/')}}search" class="hover:underline">条件でさがす</a>
            </li>
            <li class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
              </svg>
              <a href="{{asset('/')}}spot" class="hover:underline">一覧を見る</a>
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
              <a href="{{asset('/')}}user/login" class="hover:underline">ユーザーログイン</a>
            </li>
            <li class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
              </svg>
              <a href="{{asset('/')}}user/regist" class="hover:underline">ユーザー登録する</a>
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
              <a href="{{asset('/')}}" class="hover:underline ">ホーム</a>
            </li>
            <li class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
              </svg>
              <a href="{{asset('/')}}" class="hover:underline ">サービス案内</a>
            </li>
            <li class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
              </svg>
              <a href="{{asset('/')}}qa" class="hover:underline ">よくある質問</a>
            </li>
            <li class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
              </svg>
              <a href="{{asset('/')}}contact" class="hover:underline ">お問い合わせ</a>
            </li>
            <li class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
              </svg>
              <a href="{{asset('/')}}company" class="hover:underline ">運営会社</a>
            </li>
            <li class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
              </svg>
              <a href="{{asset('/')}}privacy" class="link link-hover">プライバシーポリシー</a>
            </li>
            <li class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="text-gray-400 w-4 h-4 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
              </svg>
              <a href="{{asset('/')}}sitemap" class="hover:underline ">サイトマップ</a>
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

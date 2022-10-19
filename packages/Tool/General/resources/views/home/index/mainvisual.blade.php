<div class="border-b border-gray-300 shadow max-w-screen-4xl py-10 md:py-14"
     style="background-image: url('./img/general/pages/home/mainvisual_bg.jpg');">
  <div class="mx-auto container px-8 max-w-2xl md:max-w-4xl">
    <h1 class="mb-4 md:mb-10">
      <a href="{{asset('/')}}search" class="hover:opacity-80"><img
                src="{{asset('/')}}img/general/pages/home/mainvisual_title.png"
                alt="すむところ.com 老人ホーム・介護施設・高齢者の住まい探し"></a>
    </h1>
  </div>

  <div class="mx-auto container px-8 max-w-xl md:max-w-2xl">
    <div class="form-control">
      <div class="mb-4">
        <a href="{{asset('/')}}search" class="hover:opacity-80">
          <img src="{{asset('/')}}img/general/pages/home/mainvisual_photo.jpg" class="mb-6 rounded"
               alt="すむところ.com 老人ホーム・介護施設・高齢者の住まい探し"></a>
      </div>
      <form action="{{asset('/')}}spot/" method="get">
        <div class="flex">
          <select name="search[city]" id="HeaderSearchCity"
                  class="-mr-1 select select-bordered rounded-r-lg rounded-full select-sm text-xs w-2/5 lg:text-md lg:select-lg">
            <option value="1">エリア・地域を選択</option>
            @foreach($search['cities'] as $city)
              @if($city['spots_count'] > 0)
                <option value="{{$city['id']}}"
                        @if($city['id'] === $search['query']['city']) selected @endif>{{$city['name']}}
                  ({{$city['spots_count']}})
                </option>
              @endif
            @endforeach
          </select>
          <select name="search[price_range]" id="HeaderSearchPriceRange"
                  class="-mr-1 select select-bordered select-sm rounded-none text-xs w-2/5 lg:text-md lg:select-md lg:select-lg">
            @foreach($search['price_ranges'] as $price_range)
              @if($price_range['id'] === 1)
                <option value="{{$price_range['id']}}">月額料金を選択</option>
              @else
                <option value="{{$price_range['id']}}"
                        @if($price_range['id'] === $search['query']['city']) selected @endif>{{$price_range['name']}}
                </option>
              @endif
            @endforeach
          </select>
          <button class="btn rounded-l-lg rounded-full btn-sm w-1/5 lg:input-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
            </svg>
          </button>
        </div>
        <input type="hidden" name="search[simple]" value="1">
      </form>
    </div>
  </div>
</div>

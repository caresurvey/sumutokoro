<div class="max-w-screen-2xl px-4 py-20 md:px-8 mx-auto"
     style="background-image: url('./img/general/pages/home/mainvisual_bg.jpg')">
  <h1 class="text-4xl font-bold text-center text-orange-900 pb-8 text-brown">老人ホーム・介護施設・高齢者の住まい探し</h1>
  <div class="flex justify-center mb-6">
    <img src="{{asset('/')}}img/general/pages/home/mainvisual_photo.jpg" class="w-2/5">
  </div>
  <form action="{{asset('/')}}spot/" method="get">
    <div class="mx-auto container flex justify-center">
      <div class="w-2/4 flex">
        <div class="relative w-2/5">
          <select name="search[city]" id="CityId"
                  class="text-brown w-full text-sm appearance-none text-lg bg-gray-100 border border-gray-200 text-gray-700  pt-3 py-4  pr-8 rounded-l-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <option value="">地域を選択</option>
            @foreach($search['cities'] as $city)
              @if($city['spots_count'] > 0)
                <option value="{{$city['id']}}" @if($city['id'] === $search['query']['city']) selected @endif>{{$city['name']}}({{$city['spots_count']}})</option>
              @endif
            @endforeach
          </select>
        </div>

        <div class="relative w-2/5">
          <select name="search[price_range]" id="PriceRangeId"
                  class="text-brown w-full text-sm appearance-none text-lg bg-gray-100 border border-gray-200 text-gray-700 pt-3 py-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @foreach($search['price_ranges'] as $price_range)
                <option value="{{$price_range['id']}}" @if($price_range['id'] === $search['query']['price_range']) selected @endif>{{$price_range['name']}}({{$price_range['spots_count']}})</option>
            @endforeach
          </select>
        </div>

        <div class="relative mr-2 w-1/5">
          <button type="submit" name=""
                  class="w-full rounded-r-lg text-lg px-3 pt-3 pb-3 border-accent bg-accent hover:bg-accent_light text-white cursor-pointer">
            <i class="fa-solid fa-magnifying-glass mr-2"></i>検索
          </button>
        </div>
        <input type="hidden" name="search[simple]" value="1">
      </div>
    </div>
  </form>
</div>

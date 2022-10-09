<div class="block sm:hidden">
  <div class="flex text-sm mb-3 pb-3 sm:mb-3 sm:pb-3">
    <div class="mr-4 w-2/5">
      @if(!empty($spot['spot_main_image']['name']))
        <a href="{{asset('/')}}spot/{{$spot['id']}}" class="hover:opacity-90">
          <img src="{{asset('/')}}photos/spots/{{$spot['spot_main_image']['name']}}/{{$spot['spot_main_image']['name']}}_l.jpg"
               alt="{{$spot['name']}}" class="rounded shadow"></a>
      @else
        <a href="{{asset('/')}}spot/{{$spot['id']}}" class="hover:opacity-90">
          <img src="{{asset('/')}}img/general/base/nophoto.jpg"
               alt="{{$spot['name']}}" class="rounded shadow"></a>
      @endif
    </div>
    <div class="w-3/5">
      @include('general::spot.index.icon', ['spot' => $spot])
    </div>
  </div>

  <div class="bg-gray-50 border border-gray-100 rounded mb-4 p-3">
    <div class="flex items-center mb-3">
      <div class="bg-gray-400 mr-3 px-2 py-1 rounded border border-gray-200 text-white text-xs sm:text-xs">月額料金
      </div>
      <div class="tracking-wider text-sm sm:text-md md:text-xl">
        {{number_format($spot['monthly_price_min'])}}<span class="text-xs pl-1">円</span>
        @if($spot['for_check_monthly'])〜@endif
        {{number_format($spot['monthly_price_max'])}}<span class="text-xs pl-1">円</span>
      </div>
    </div>
    <div class="flex items-center">
      <div class="bg-gray-400 mr-3 px-2 py-1 rounded border border-gray-200 text-white text-xs sm:text-xs">電話番号
      </div>
      <div class="text-lg tracking-wider">
        <a href="tel:{{$spot['tel1']}}{{$spot['tel2']}}{{$spot['tel3']}}"
           class="link link-hover link-primary">{{$spot['tel1']}}-{{$spot['tel2']}}-{{$spot['tel3']}}</a>
      </div>
    </div>
  </div>
  <div class="mb-4">
    {{$spot['heading']}}
  </div>

</div>
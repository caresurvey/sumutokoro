@foreach($prices as $price)
  <div class="mr-4">
    <span class="inline-block leading-6 text-gray-600 text-ms tracking-widest">{{$price['price_genre']['name']}}</span>
    <input id="SpotPrice{{$price['id']}}"
           type="text"
           maxlength="10"
           name="spot[spot_prices][{{$price['id']}}]"
           placeholder="{{$price['price_genre']['name']}}"
           value="{{old('spot.spot_prices.' . $price['id'], $price['name'])}}"
           class="mb-2 appearance-none border bg-gray-100 w-full text-base block text-gray-700 rounded placeholder-gray-300 p-4 leading-normal focus:outline-primary focus:bg-white">
    <span class="inline-block leading-6 text-gray-300 text-xs">{{$price['price_genre']['ps']}}</span>
  </div>
@endforeach

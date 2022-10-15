<?php $i=1;?>
@foreach($prices as $price)
<div class="mr-4">
  <span class="inline-block leading-6 text-gray-600 text-ms tracking-widest">{{$price['price_genre']['name']}}</span>
  <input id="SpotPrice{{$i}}"
         name="spot[spot_prices][{{$price['id']}}]"
         type="text"
         value="{{old('spot.spot_prices.' . $price['id'], $price['name'])}}"
         maxlength="10"
         placeholder="{{$price['price_genre']['name']}}"
         class="mb-2 appearance-none border bg-gray-100 w-full text-base block text-gray-700 rounded placeholder-gray-300 p-4 leading-normal focus:outline-primary focus:bg-white">
  <span class="inline-block leading-6 text-gray-300 text-xs">{{$price['price_genre']['ps']}}</span>
</div>
<?php $i++;?>
@endforeach

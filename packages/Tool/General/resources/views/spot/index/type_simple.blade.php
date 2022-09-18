<div class="rounded p-10 shadow bg-white mb-5 tracking-wider">
  @foreach($data['spots'] as $spot)
    <div class="flex mb-5 pb-5">
      <div class="mr-10 w-1/5">
        @if(!empty($spot['spot_main_image']['name']))
          <a href="{{asset('/')}}spot/{{$spot['id']}}" class="hover:opacity-90">
            <img src="{{asset('/')}}photos/spots/{{$spot['spot_main_image']['name']}}/{{$spot['spot_main_image']['name']}}_l.jpg"
                 alt="{{$spot['name']}}" class="rounded shadow"></a>
        @else
          <a href="{{asset('/')}}spot/{{$spot['id']}}" class="hover:opacity-90">
            <img src="{{asset('/')}}img/general/base/nophoto.jpg"
                 alt="{{$spot['name']}}" class="rounded shadow"></a>
        @endif      </div>
      <div class="w-4/5">
        <div class="flex mb-2">
          <div>
            <h2 class="text-lg">
              <a href="{{asset('/')}}spot/{{$spot['id']}}"
                 class="text-accent hover:text-accent_light font-bold hover:underline">{{$spot['name']}}</a>
            </h2>
            <a href="tel:{{$spot['tel1']}}{{$spot['tel2']}}{{$spot['tel3']}}"
               class="text-accent hover:text-accent_light hover:underline">{{$spot['tel1']}}-{{$spot['tel2']}}
              -{{$spot['tel3']}}</a><br>
            {{$data['cities'][$spot['city_id']]}}{{$spot['address']}} ｜ {{$spot['company']['name']}}
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

{!! $data['linkTag'] !!}


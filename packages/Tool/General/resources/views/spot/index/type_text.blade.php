<div class="rounded p-10 shadow bg-white mb-5 tracking-wider">
  @foreach($data['spots'] as $spot)
    <div class="p-2 border-b border-gray-200">
        <a href="{{asset('/')}}spot/{{$spot['id']}}"
           class="text-accent hover:text-accent_light hover:underline">{{$spot['name']}}</a> ／
        <a href="tel:{{$spot['tel1']}}{{$spot['tel2']}}{{$spot['tel3']}}"
           class="text-accent hover:text-accent_light hover:underline">{{$spot['tel1']}}-{{$spot['tel2']}}
          -{{$spot['tel3']}}</a> ／
      {{$data['cities'][$spot['city_id']]}}{{$spot['address']}}
    </div>
  @endforeach
</div>

{!! $data['linkTag'] !!}


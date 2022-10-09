@foreach($data['spots'] as $spot)
  <div class="shadow bg-white rounded p-4 mb-4 sm:rounded-xl sm:p-6 sm:mb-8 md:px-14 md:py-8">
    <h2 class="font-bold text-md w-full mb-2 sm:mb-4 sm:text-lg md:mb-6 md:text-xl lg:text-2xl">
      <a href="{{asset('/')}}spot/{{$spot['id']}}"
         class="link link-hover link-primary">{{$spot['name']}}</a>
    </h2>

    @include('general::spot.index.type_general_contents')
    @include('general::spot.index.type_general_contents_pc')

    <div class="text-gray-400 text-xs sm:text-sm">
      {{$data['cities'][$spot['city_id']]}}{{$spot['address']}} ｜ {{$spot['company']['name']}}
    </div>
  </div>
@endforeach

{!! $data['linkTag'] !!}

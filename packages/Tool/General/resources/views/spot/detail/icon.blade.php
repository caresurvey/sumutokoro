@if($icons['serial'] !== 'status')
  <h3 class="text-md mb-4 text-md font-bold md:text-xl">
    {{$icons['name']}}
  </h3>
  <div class="mb-5 pb-5">
    <div class="grid grid-cols-3 md:grid-cols-5">
      @foreach($icons['data'] as $icon)
        <div class="flex items-center text-center mb-1 mr-1 px-1 pt-2 pb-1 bg-gray-50 rounded border border-gray-200">
          <div>
            <div class="flex justify-center mb-1 sm:mb-2">
              <div class="tooltip flex justify-center" data-tip="{{$icon['type']['name']}}">
                <img src="{{asset('/')}}img/general/pages/spot/icons/{{$icon['type']['serial']}}.png"
                     alt="{{$icon['name']}}"
                     class="w-1/4 md:w-1/4">
              </div>
            </div>
            <div class="text-xs xl:text-md">{{$icon['name']}}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endif


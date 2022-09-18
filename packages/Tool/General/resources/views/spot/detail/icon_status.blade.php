@if(!empty($icons['status']))
  <div class="grid grid-cols-3 md:grid-cols-6">
    @foreach($icons['status']['data'] as $icon)
      <div class="flex items-center text-center mb-1 mr-1 px-1 pt-2 pb-1 bg-gray-50 rounded border border-gray-200">
        <div>
          <div class="flex justify-center mb-1 sm:mb-2">
            <img src="{{asset('/')}}img/general/pages/spot/icons/{{$icon['type']['serial']}}.png"
                 alt="{{$icon['name']}}"
                 class="w-1/3 md:w-1/3">
          </div>
          <div class="text-xs sm:text-sm">{{$icon['name']}}</div>
        </div>
      </div>
    @endforeach
  </div>
@endif


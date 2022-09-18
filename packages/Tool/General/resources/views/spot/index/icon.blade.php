@if($spot['spot_icon_statuses']->count() > 0)
  <div class="grid grid-cols-3 mb-2 md:mb-5 md:grid-cols-6">
    @foreach($spot['spot_icon_statuses'] as $icon)
      <div class="flex items-center text-center mb-1 mr-1 px-1 pt-2 pb-1 bg-gray-50 rounded border border-gray-200">
        <div>
          <div class="tooltip flex justify-center mb-1 sm:mb-2" data-tip="{{$icon['spot_icon_type']['name']}}">
            <img src="{{asset('/')}}img/general/pages/spot/icons/{{$icon['spot_icon_type']['serial']}}.png"
                 alt="{{$icon['spot_icon_item']['name']}}"
                 class="w-1/3 md:w-1/3">
          </div>
          <div class="text-xs sm:text-sm">{{$icon['spot_icon_item']['name']}}</div>
        </div>
      </div>
    @endforeach
  </div>
@endif


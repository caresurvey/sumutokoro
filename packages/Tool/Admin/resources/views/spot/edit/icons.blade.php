<?php $grid = 'grid-cols-5 gap-x-2';
// ステータス用
if($spot_icon_genre_id===2) $grid = 'grid-cols-6 gap-x-2';
?>
<div class="grid {{$grid}} gap-y-2 mb-4 bg-gray-100 rounded p-2 shadow">
  @foreach($icons as $icon)
    <div class="flex items-end border-gray-200 p-2">
      <div class="w-full">
        <label class="block mb-1 text-xs text-gray-600 text-center">{{$icon['name']}}</label>
        <select name="spot[spot_icon_item][{{$icon['id']}}][spot_icon_type_id]" class="block p-2 pr-9 w-full text-lg text-gray-600 font-bold bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
          @foreach($types as $type)
            <option value="{{$type['id']}}"
                    {{(int)old('spot.spot_icon_item.' . $icon['id'] . '.spot_icon_type_id', $icon['value']) === $type['id'] ? ' selected ' : ''}}>{{$type['icon']}}</option>
          @endforeach
        </select>
        <input type="hidden" name="spot[spot_icon_item][{{$icon['id']}}][spot_icon_genre_id]" value="{{$spot_icon_genre_id}}">
      </div>
    </div>
  @endforeach
</div>
<div class="text-xs border w-3/5 rounded flex block items-center">
  <div class="bg-gray-200 p-2 font-bold mr-2">
    <div class="tooltip" data-tip="各アイコンの説明です">
    <i class="fa-solid fa-circle-question"></i>
    </div>
  </div>
  @foreach($types as $type)
    <div class="tooltip" data-tip="{{$type['name']}}">
    <div class="mr-2 text-sm p-1 border-gray-200 cursor-default">{{$type['icon']}}</div>
    </div>
  @endforeach
</div>

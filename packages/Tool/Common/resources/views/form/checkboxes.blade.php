<?php
  // 登録済みのデータをpluckの形で抽出
  foreach($values as $value) {
    $selected[$value['id']] = $value['name']; 
  }
?>

@foreach($list as $key => $label)
<div class="flex items-center space-x-2 space-y-2 mb-1">

  <input type="checkbox" @if(!empty($selected[$key])) checked="checked" @endif class="checkbox checkbox-primary" id="{{$id}}{{$key}}" name="spot[books][]" value="{{$key}}">
  <label for="{{$id}}{{$key}}">{{$label}}</label>
</div>
@endforeach


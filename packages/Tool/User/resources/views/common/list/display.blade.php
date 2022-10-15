@if($display)
  <div class="tooltip link link-hover link-primary" data-tip="現在表示中です。クリックで非表示">
    <a href="{{asset('/')}}user/{{$model}}/display/{{$id}}"
       class="inline-block bg-accent px-2 py-1 rounded text-xs text-white hover:opacity-80" id="Display{{$id}}">表　示</a>
  </div>
@else
  <div class="tooltip link link-hover link-primary" data-tip="現在表示していません。クリックで表示">
    <a href="{{asset('/')}}user/{{$model}}/display/{{$id}}"
       class="inline-block bg-gray-200 px-2 py-1 rounded text-xs hover:bg-accent_light hover:text-primary hover:opacity-80" id="Display{{$id}}">非表示</a>
  </div>
@endif
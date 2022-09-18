<div class="mb-2">
  @if(config('myapp.default_lat') !== $lat)
  <span class="badge badge-sm">地図設定済み</span>
  @else
  <span class="badge badge-ghost badge-sm">地図未設定</span>
  @endif
</div>



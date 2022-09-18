@if($value > 0)
<i class="fa-solid fa-camera" data-tooltip-target="tooltip-hasImage"></i>
<div id="tooltip-hasImage" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
  画像が登録されています
  <div class="tooltip-arrow" data-popper-arrow></div>
</div>
@endif
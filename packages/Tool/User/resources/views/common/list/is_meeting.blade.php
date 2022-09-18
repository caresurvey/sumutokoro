@if($value)
<i class="fa-solid fa-comments" data-tooltip-target="is_meeting" ></i>
<div id="is_meeting" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
  この事業所とやりとりをしている最中です
  <div class="tooltip-arrow" data-popper-arrow></div>
</div>
@endif
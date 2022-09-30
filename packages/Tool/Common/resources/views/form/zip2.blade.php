<div class="flex items-center space-x-2">

  <input id="{{$id1}}"
         name="{{$name1}}"
         type="number"
         maxlength="3"
         value="{{$value1}}"
         placeholder="{{$placeholder1}}"
         class="mb-2 appearance-none border w-full text-base block text-gray-700 rounded placeholder-gray-300 p-4 leading-normal focus:outline-primary focus:bg-white @if($hasError1) bg-red-100 text-red-700 placeholder-red-300 border-red-500 @else border-gray-200 bg-gray-100 @endif">
  <div>-</div>
  <input id="{{$id2}}"
         name="{{$name2}}"
         type="number"
         maxlength="4"
         value="{{$value2}}"
         placeholder="{{$placeholder2}}"
         class="mb-2 appearance-none border w-full text-base block text-gray-700 rounded placeholder-gray-300 p-4 leading-normal focus:outline-primary focus:bg-white @if($hasError2) bg-red-100 text-red-700 placeholder-red-300 border-red-500 @else border-gray-200 bg-gray-100 @endif">
</div>

@if($hasError1)
  @foreach($errors1 as $error)
    <div class="text-red-700 text-sm flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
           class="w-6 h-6 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
      </svg>
      {{ $error }}
    </div>
  @endforeach
@endif
@if($hasError2)
  @foreach($errors2 as $error)
    <div class="text-red-700 text-sm flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
           class="w-6 h-6 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
      </svg>
      {{ $error }}
    </div>
  @endforeach
@endif
@if($ps !== '')<span class="inline-block leading-6 text-gray-400 text-xs">{!! nl2br(e($ps)) !!}</span>@endif

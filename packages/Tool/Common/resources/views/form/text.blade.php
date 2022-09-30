<input id="{{$id}}"
       name="{{$name}}"
       type="text"
       value="{{$value}}"
       placeholder="{{$placeholder}}"
       class="mb-2 appearance-none border w-full text-base block text-gray-700 rounded placeholder-gray-300 p-4 leading-normal focus:outline-primary focus:bg-white @if($hasError) bg-red-100 text-red-700 placeholder-red-300 border-red-500 @else border-gray-200 bg-gray-100 @endif">
@if($hasError)
  @foreach($errors as $error)
    <div class="text-red-700 text-sm flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
      </svg>
      {{ $error }}
    </div>
  @endforeach
@endif
@if($ps !== '')<span class="inline-block leading-6 text-gray-400 text-xs">{!! nl2br(e($ps)) !!}</span>@endif

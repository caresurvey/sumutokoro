@if ($paginator->hasPages())
  <div class="flex justify-center pt-10">
    <div class="btn-group">
      @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->previousPageUrl() }}" class="btn">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor"
               class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
          </svg>
        </a>
      @else
        <a class="btn btn-disabled">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor"
               class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
          </svg>
        </a>
      @endif

      @foreach ($elements as $element)
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <a href="{{$url}}" class="btn btn-disabled bg-primary-focus/100 text-white rounded-none">{{$page}}</a>
            @else
                <a href="{{$url}}" class="btn rounded-none">{{$page}}</a>
            @endif
          @endforeach
        @endif
      @endforeach

      @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="btn">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor"
               class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
          </svg>
        </a>
      @else
        <a class="btn btn-disabled">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor"
               class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
          </svg>
        </a>
      @endif

    </div>
  </div>
@endif


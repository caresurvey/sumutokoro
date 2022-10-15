<section class="container mx-auto max-w-6xl mb-6 px-6 pt-12 sm:px-8 md:px-12 md:mb-20" id="Area">
  <h2 class="text-center text-2xl sm:text-3xl md:text-4xl font-bold mb-8 md:mb-12">場所で選ぶ</h2>
  <div class="shadow bg-white rounded-xl p-4 md:px-10 md:py-10">

    @foreach($search['areas'] as $area_heading => $areas)
    <h3 class="flex items-center font-bold text-sm mb-2 md:text-base">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
           stroke="currentColor" class="text-gray-400 w-6 h-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25"/>
      </svg>
      {{$area_heading}}
    </h3>
    <div class="bg-gray-50 border border-gray-200 rounded-md mb-4 p-2 md:p-3 md:mb-8">
      <ul class="flex flex-wrap">
        @foreach($areas as $area)
        <li class="p-1 w-1/5">
          <a href="{{asset('/')}}spot/?search[keyword]=中央区" class="link-primary w-full inline-block rounded-full hover:bg-primary hover:text-white text-md py-1 px-4">{{$area['name']}}</a>
        </li>
        @endforeach
      </ul>
    </div>
    @endforeach

  </div>
</section>
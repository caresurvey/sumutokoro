@extends('general::layouts.app')
@section('title', '事業所検索｜' . config('myapp.site_name'))
@section('description', '登録されている事業所を条件を指定して検索することができます。')

@section('content')
  @include('general::search.index.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      どんな条件で検索しますか？
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        様々な条件で事業所の検索が出来ます。
      </p>
    </div>
  </div>


  <section class="container mx-auto max-w-6xl px-4 sm:px-8 md:px-12">
    <form action="{{asset('/')}}spot/" method="get">
      <div class=" flex flex-col items-center px-5 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="text-gray-600 flex flex-col w-full max-w-4xl mx-auto prose text-left prose-blue">
          <div class="w-full mx-auto">
            <?php
            /*
            @if(!empty($search['cities']))
              <div class="rounded shadow bg-white mb-7 tracking-wider p-4 sm:p-10">
                <h2 class="font-bold text-md mb-4 border-l-4 pl-3 sm:text-lg md:text-xl md:mb-8">市町村で検索</h2>

                  @foreach($search['areas'] as $area_heading => $areas)
                  @if($areas['spots_count'] >0)
                  <h3 class="flex items-center font-bold text-sm mb-2 md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="text-gray-400 w-6 h-6 mr-1">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25"/>
                    </svg>
                    {{$area_heading}}（{{$areas['spots_count']}}）
                  </h3>
                  <div class="bg-gray-50 border border-gray-200 rounded-md mb-4 p-2 md:p-3 md:mb-8">
                    <ul class="flex flex-wrap">
                      @foreach($areas['data'] as $area)
                      @if($area['spots_count'] > 0)
                        <?php $link = "search[area]=". e($area['id']) ."&search[simple]=1";?>
                        <?php if($areas['type'] === 'city') $link = "search[city]=". e($area['id']) ."&search[simple]=1";?>
                        <li class="p-1 w-1/4">
                          <div class="flex items-center mb-4">
                            <input id="AreaId{{$area['id']}}" type="checkbox" name="search[area_id][]"
                                   value="{{$area['id']}}"
                                   class="checkbox radio-primary rounded-full checkbox-sm sm:checkbox-md">
                            <label for="AreaId{{$area['id']}}"
                                   class="ml-2 text-sm sm:text-base">{{$area['name']}}（{{$area['spots_count']}}）</label>
                          </div>
                        </li>
                      @endif
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  @endforeach
              </div>
            @endif
            */
            ?>


            @if(!empty($search['areas']))
              <div class="rounded shadow bg-white mb-7 tracking-wider p-4 sm:p-10">
                <h2 class="font-bold text-md mb-4 border-l-4 pl-3 sm:text-lg md:text-xl md:mb-8">エリアで検索</h2>
                @foreach($search['areas'] as $area)
                @if($area['count'] > 0)
                <h3 class="flex items-center font-bold text-sm mb-2 md:text-base">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="text-gray-400 w-6 h-6 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25"/>
                  </svg>
                  {{$area['name']}}（{{$area['count']}}）
                </h3>
                <div class="bg-gray-50 border border-gray-200 rounded-md mb-4 p-2 md:p-3 md:mb-8">
                  <ul class="flex flex-wrap">
                    @foreach($area['data'] as $data)
                    @if($data['spots_count']> 0)
                    <li>
                      <div class="flex items-center">
                        <input id="CityId{{$data['id']}}" type="checkbox" name="search[cities][]"
                               value="{{$data['id']}}"
                               class="checkbox radio-primary rounded-full checkbox-sm sm:checkbox-md">
                        <label for="CityId{{$data['id']}}"
                               class="ml-2 text-sm sm:text-base">{{$data['name']}}（{{$data['spots_count']}}）</label>
                      </div>
                    </li>
                    @endif
                    @endforeach
                  </ul>
                </div>
                @endif
                @endforeach

              </div>
            @endif


            @if(!empty($search['categories']))
              <div class="rounded shadow bg-white mb-7 tracking-wider p-4 sm:p-10">
                <h2 class="font-bold text-md mb-4 border-l-4 pl-3 sm:text-lg md:text-xl md:mb-8">事業所種別で検索</h2>
                <ul class="grid gap-x-8 sm:gap-x-12 sm:grid-cols-2">
                  @foreach($search['categories'] as $category)
                    @if($category['spots_count'] > 0)
                      <li>
                        <div class="flex items-center mb-4">
                          <input id="CategoryId{{$category['id']}}" type="checkbox" name="search[categories][]"
                                 value="{{$category['id']}}"
                                 class="checkbox radio-primary rounded-full checkbox-sm sm:checkbox-md">
                          <label for="CategoryId{{$category['id']}}"
                                 class="ml-2 text-sm sm:text-base">{{$category['name']}}（{{$category['spots_count']}}）</label>
                        </div>
                      </li>
                    @endif
                  @endforeach
                </ul>
              </div>
            @endif

            @if(!empty($search['price_ranges']))
              <div class="rounded shadow bg-white mb-7 tracking-wider p-4 sm:p-10">
                <h2 class="font-bold text-md mb-4 border-l-4 pl-3 sm:text-lg md:text-xl md:mb-8">値段で検索</h2>
                <ul class="grid grid-cols-2">
                  @foreach($search['price_ranges'] as $price_range)
                    <li>
                      <div class="flex items-center mb-4">
                        <input id="PriceRangeId{{$price_range['id']}}" type="radio" name="search[price_range]"
                               class="radio radio-primary radio-sm sm:radio-md" value="{{$price_range['id']}}">
                        <label for="PriceRangeId{{$price_range['id']}}" id="PriceRangeIdLabel{{$price_range['id']}}"
                               class="ml-2 text-sm sm:text-base">{{$price_range['name']}}</label>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="w-full py-4 border-white bg-black bg-opacity-70 fixed left-0 bottom-0 flex text-center justify-center items-center text-white z-40 hidden md:block">
              <input type="submit" id="SearchSubmitBtn" value="上記の条件で検索する"
                     class="btn btn-wide rounded-full btn-md btn-primary tracking-wider">
            </div>

            <div class="text-center md:hidden">
              <input type="submit" id="SearchSubmitBtnMobile" value="上記の条件で検索する"
                class="btn btn-wide rounded-full btn-md btn-primary tracking-wider">
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="search[multiple]" value="1">
    </form>
  </section>

@endsection


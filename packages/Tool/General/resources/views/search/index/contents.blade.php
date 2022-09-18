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

            @if(!empty($search['cities']))
              <div class="rounded shadow bg-white mb-7 tracking-wider p-4 sm:p-10">
                <h2 class="font-bold text-md mb-4 border-l-4 pl-3 sm:text-lg md:text-xl md:mb-8">市町村で検索</h2>
                <ul class="grid grid-cols-3">
                  @foreach($search['cities'] as $city)
                    @if($city['spots_count'] > 0)
                      <li>
                        <div class="flex items-center mb-4">
                          <input id="CityId{{$city['id']}}" type="checkbox" name="search[cities][]"
                                 value="{{$city['id']}}"
                                 class="checkbox radio-primary rounded-full checkbox-sm sm:checkbox-md">
                          <label for="CityId{{$city['id']}}"
                                 class="ml-2 text-sm sm:text-base">{{$city['name']}}（{{$city['spots_count']}}）</label>
                        </div>
                      </li>
                    @endif
                  @endforeach
                </ul>
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
                        <input id="PriceRangeId{{$price_range['id']}}" type="radio" name="search[price_ranges][]"
                               class="radio radio-primary radio-sm sm:radio-md">
                        <label for="PriceRangeId{{$price_range['id']}}"
                               class="ml-2 text-sm sm:text-base">{{$price_range['name']}}</label>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="w-full py-4 border-white bg-black bg-opacity-70 fixed left-0 bottom-0 flex justify-center items-center text-white z-40">
              <input type="submit" id="SearchSubmitBtn" value="上記の条件で検索する"
                     class="btn btn-wide rounded-full btn-md btn-primary tracking-wider">
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="search[multiple]" value="1">
    </form>
  </section>

@endsection


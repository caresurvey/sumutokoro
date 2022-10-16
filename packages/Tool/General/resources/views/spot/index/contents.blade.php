@extends('general::layouts.app')
@section('title', '事業所一覧 - ' . config('myapp.site_name'))
@section('description', '条件を指定して各事業所を検索することができます。')

@section('content')
  @include('general::spot.index.breadcrumb')

  <div class="container mx-auto px-3 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      事業所一覧
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        {{$data['totalCount']}}件が見つかりました（{{$data['current']}}/{{$data['fullPage']}}ページ）
      </p>
    </div>
  </div>

  <section class="container mx-auto max-w-6xl px-6 sm:px-8 md:px-12">
    <div class="mb-5 text-sm font-medium text-center text-gray-500 border-b border-gray-200">
      <ul class="flex flex-wrap -mb-px">
        <li class="mr-2">
          <a href="#" id="ListTypeGeneralBtn"
             class="list-type-buttons inline-block p-4 border-b-2 border-primary text-primary">通常表示</a>
        </li>
        <li class="mr-2">
          <a href="#" id="ListTypeSimpleBtn" class="list-type-buttons inline-block p-4">シンプル表示</a>
        </li>
        <li class="mr-2">
          <a href="#" id="ListTypeTextBtn" class="list-type-buttons inline-block p-4">テキスト表示</a>
        </li>
      </ul>
    </div>
  </section>

  @if(!empty($data['spots'][0]))
    <section class="container mx-auto max-w-6xl px-4 sm:px-8 md:px-12">

      <!-- 通常表示ここから -->
      <div id="ListTypeGeneral" class="list-type-tab">
        @foreach($data['spots'] as $spot)
          <div class="shadow bg-white rounded p-4 mb-4 sm:rounded-xl sm:p-6 sm:mb-8 md:px-14 md:py-8">
            <h2 class="font-bold text-md w-full mb-2 sm:mb-4 sm:text-lg md:mb-6 md:text-xl lg:text-2xl">
              <a href="{{asset('/')}}spot/{{$spot['id']}}"
                 class="link link-hover link-primary spotName" id="SpotNameGeneral{{$spot['id']}}">{{$spot['name']}}</a>
            </h2>

            <!-- PC表示ここから -->
            <div class="hidden sm:block">
              <div class="flex border-b border-gray-200 text-sm mb-3 pb-3 sm:mb-3 sm:pb-3">
                <div class="mr-4 w-2/5">
                  @if(!empty($spot['spot_main_image']['name']))
                    <a href="{{asset('/')}}spot/{{$spot['id']}}" class="hover:opacity-90 spotPhoto">
                      <img src="{{asset('/')}}photos/spots/{{$spot['spot_main_image']['name']}}/{{$spot['spot_main_image']['name']}}_l.jpg"
                           alt="{{$spot['name']}}" class="rounded shadow spotPhoto" id="SpotPhotoGeneral{{$spot['id']}}"></a>
                  @else
                    <a href="{{asset('/')}}spot/{{$spot['id']}}" class="hover:opacity-90 spotPhoto">
                      <img src="{{asset('/')}}img/general/base/nophoto.jpg"
                           alt="{{$spot['name']}}" class="rounded shadow spotPhoto" id="SpotPhotoGeneral{$spot['id']}}"></a>
                  @endif
                </div>
                <div class="w-3/5">

                  <!-- iconここから -->
                  @if($spot['spot_icon_statuses']->count() > 0)
                    <div class="grid grid-cols-3 mb-2 md:mb-5 md:grid-cols-6">
                      @foreach($spot['spot_icon_statuses'] as $icon)
                        <div class="flex items-center text-center mb-1 mr-1 px-1 pt-2 pb-1 bg-gray-50 rounded border border-gray-200">
                          <div>
                            <div class="tooltip flex justify-center mb-1 sm:mb-2" data-tip="{{$icon['spot_icon_type']['name']}}">
                              <img src="{{asset('/')}}img/general/pages/spot/icons/{{$icon['spot_icon_type']['serial']}}.png"
                                   alt="{{$icon['spot_icon_item']['name']}}"
                                   class="w-1/3 md:w-1/3">
                            </div>
                            <div class="text-xs sm:text-sm">{{$icon['spot_icon_item']['name']}}</div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @endif
                  <!-- iconここまで -->

                  <div class="bg-gray-50 border border-gray-100 rounded mb-4 p-3 hidden md:block">
                    <div class="flex items-center mb-3">
                      <div class="bg-gray-400 mr-3 px-2 py-1 rounded border border-gray-200 text-white text-xs sm:text-xs">月額料金
                      </div>
                      <div class="tracking-wider text-sm sm:text-md md:text-xl">
                        {{number_format($spot['monthly_price_min'])}}<span class="text-xs pl-1">円</span>
                        @if($spot['for_check_monthly'])〜@endif
                        {{number_format($spot['monthly_price_max'])}}<span class="text-xs pl-1">円</span>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <div class="bg-gray-400 mr-3 px-2 py-1 rounded border border-gray-200 text-white text-xs sm:text-xs">電話番号
                      </div>
                      <div class="text-lg tracking-wider">
                        <a href="tel:{{$spot['tel1']}}{{$spot['tel2']}}{{$spot['tel3']}}"
                           class="link link-hover link-primary">{{$spot['tel1']}}-{{$spot['tel2']}}-{{$spot['tel3']}}</a>
                      </div>
                    </div>
                  </div>
                  <div class="mb-2">
                    {{$spot['heading']}}
                  </div>
                </div>
              </div>
            </div>
            <!-- PC表示ここまで -->


            <!-- Mobile表示ここから -->
            <div class="block sm:hidden">
              <div class="flex text-sm mb-3 pb-3 sm:mb-3 sm:pb-3">
                <div class="mr-4 w-2/5">
                  @if(!empty($spot['spot_main_image']['name']))
                    <a href="{{asset('/')}}spot/{{$spot['id']}}" class="hover:opacity-90 spotPhoto" id="SpotPhotoGeneralMobile{{$spot['id']}}">
                      <img src="{{asset('/')}}photos/spots/{{$spot['spot_main_image']['name']}}/{{$spot['spot_main_image']['name']}}_l.jpg"
                           alt="{{$spot['name']}}" class="rounded shadow"></a>
                  @else
                    <a href="{{asset('/')}}spot/{{$spot['id']}}" class="hover:opacity-90 spotPhoto" id="SpotPhotoGeneralMobile{{$spot['id']}}">
                      <img src="{{asset('/')}}img/general/base/nophoto.jpg"
                           alt="{{$spot['name']}}" class="rounded shadow"></a>
                  @endif
                </div>
                <div class="w-3/5">
                  <!-- iconここから -->
                  @if($spot['spot_icon_statuses']->count() > 0)
                    <div class="grid grid-cols-3 mb-2 md:mb-5 md:grid-cols-6">
                      @foreach($spot['spot_icon_statuses'] as $icon)
                        <div class="flex items-center text-center mb-1 mr-1 px-1 pt-2 pb-1 bg-gray-50 rounded border border-gray-200">
                          <div>
                            <div class="tooltip flex justify-center mb-1 sm:mb-2" data-tip="{{$icon['spot_icon_type']['name']}}">
                              <img src="{{asset('/')}}img/general/pages/spot/icons/{{$icon['spot_icon_type']['serial']}}.png"
                                   alt="{{$icon['spot_icon_item']['name']}}"
                                   class="w-1/3 md:w-1/3">
                            </div>
                            <div class="text-xs sm:text-sm">{{$icon['spot_icon_item']['name']}}</div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @endif
                  <!-- iconここまで -->
                </div>
              </div>

              <div class="bg-gray-50 border border-gray-100 rounded mb-4 p-3">
                <div class="flex items-center mb-3">
                  <div class="bg-gray-400 mr-3 px-2 py-1 rounded border border-gray-200 text-white text-xs sm:text-xs">月額料金
                  </div>
                  <div class="tracking-wider text-sm sm:text-md md:text-xl">
                    {{number_format($spot['monthly_price_min'])}}<span class="text-xs pl-1">円</span>
                    @if($spot['for_check_monthly'])〜@endif
                    {{number_format($spot['monthly_price_max'])}}<span class="text-xs pl-1">円</span>
                  </div>
                </div>
                <div class="flex items-center">
                  <div class="bg-gray-400 mr-3 px-2 py-1 rounded border border-gray-200 text-white text-xs sm:text-xs">電話番号
                  </div>
                  <div class="text-lg tracking-wider">
                    <a href="tel:{{$spot['tel1']}}{{$spot['tel2']}}{{$spot['tel3']}}"
                       class="link link-hover link-primary">{{$spot['tel1']}}-{{$spot['tel2']}}-{{$spot['tel3']}}</a>
                  </div>
                </div>
              </div>
              <div class="mb-4">
                {{$spot['heading']}}
              </div>
            </div>
            <!-- Mobile表示ここまで -->


            <div class="text-gray-400 text-xs sm:text-sm">
              @if($spot['city_id'] > 1){{$data['cities'][$spot['city_id']]}}@endif{{$spot['address']}} ｜ {{$spot['company']['name']}}
            </div>
          </div>
        @endforeach

        {!! $data['linkTag'] !!}
      </div>
      <!-- 通常表示ここまで -->

      <!-- Simple表示ここから -->
      <div id="ListTypeSimple" class="list-type-tab hidden">
        <div class="rounded p-10 shadow bg-white mb-5 tracking-wider">
          @foreach($data['spots'] as $spot)
            <div class="flex mb-5 pb-5">
              <div class="mr-10 w-1/5">
                @if(!empty($spot['spot_main_image']['name']))
                  <a href="{{asset('/')}}spot/{{$spot['id']}}" class="hover:opacity-90">
                    <img src="{{asset('/')}}photos/spots/{{$spot['spot_main_image']['name']}}/{{$spot['spot_main_image']['name']}}_l.jpg"
                         alt="{{$spot['name']}}" class="rounded shadow spotPhoto" id="SpotPhotoSimple{{$spot['id']}}"></a>
                @else
                  <a href="{{asset('/')}}spot/{{$spot['id']}}" class="hover:opacity-90">
                    <img src="{{asset('/')}}img/general/base/nophoto.jpg"
                         alt="{{$spot['name']}}" class="rounded shadow spotPhoto" id="SpotPhotoSimple{{$spot['id']}}"></a>
                @endif      </div>
              <div class="w-4/5">
                <div class="flex mb-2">
                  <div>
                    <h2 class="text-lg">
                      <a href="{{asset('/')}}spot/{{$spot['id']}}"
                         class="text-accent hover:text-accent_light font-bold hover:underline spotName" id="SpotNameSimple{{$spot['id']}}">{{$spot['name']}}</a>
                    </h2>
                    <a href="tel:{{$spot['tel1']}}{{$spot['tel2']}}{{$spot['tel3']}}"
                       class="text-accent hover:text-accent_light hover:underline">{{$spot['tel1']}}-{{$spot['tel2']}}
                      -{{$spot['tel3']}}</a><br>
                    @if($spot['city_id'] > 1) {{$data['cities'][$spot['city_id']]}} @endif {{$spot['address']}} ｜ {{$spot['company']['name']}}
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        {!! $data['linkTag'] !!}
      </div>
      <!-- Simple表示ここまで -->


      <!-- Text表示ここから -->
      <div id="ListTypeText" class="list-type-tab hidden">
        <div class="rounded p-10 shadow bg-white mb-5 tracking-wider">
          @foreach($data['spots'] as $spot)
            <div class="p-2 border-b border-gray-200">
                <a href="{{asset('/')}}spot/{{$spot['id']}}"
                   class="text-accent hover:text-accent_light hover:underline" id="SpotNameText{{$spot['id']}}">{{$spot['name']}}</a> ／
                <a href="tel:{{$spot['tel1']}}{{$spot['tel2']}}{{$spot['tel3']}}"
                   class="text-accent hover:text-accent_light hover:underline">{{$spot['tel1']}}-{{$spot['tel2']}}
                  -{{$spot['tel3']}}</a> ／
              @if($spot['city_id'] > 1) {{$data['cities'][$spot['city_id']]}} @endif {{$spot['address']}} ｜ {{$spot['company']['name']}}
            </div>
          @endforeach
        </div>
        {!! $data['linkTag'] !!}
      </div>
      <!-- Text表示ここまで -->

    </section>
  @else
    <section class="container mx-auto max-w-6xl px-6 sm:px-8 md:px-12">
      <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
        <p class="mb-5 text-center leading-7">
          事業所が見つかりませんでした。<br>
          検索条件を変えてもう一度お試しください
        </p>
        <p class="text-center">
          <a href="{{asset('/')}}search" class="link link-hover link-primary">条件を変えて探し直す</a>
        </p>
      </div>
    </section>
  @endif


@endsection

@extends('general::layouts.app')
@section('title', $data['spot']['name'].'｜' . config('myapp.site_name'))
@section('description', $data['spot']['name'].'の概要や料金、看護対応、介護対応など細かい情報をご覧いただけます。')

@section('content')
  @include('general::spot.detail.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      {{$data['spot']['name']}}
    </h1>
    <div class="py-2 text-center text-base lg:text-2xl md:leading-8">
      <p>
        {{$data['spot']['heading']}}
      </p>
    </div>
  </div>

  <section class="container mx-auto max-w-6xl px-4 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded p-6 mb-4 sm:rounded-xl sm:p-6 sm:mb-8 md:px-14 md:py-14">
      <h2 class="mb-4 text-md ms:text-lg font-bold">
        <span class="text-xl font-bold border-l-4 pl-3 tracking-wider md:text-2xl">事業所概要</span>
      </h2>
      <div class="flex mb-2 pb-2 space-x-6">
        <div class="w-2/5 mb-2">
          <img src="{{asset('/')}}photos/spots/{{$data['spot']['spot_main_image']['name']}}/{{$data['spot']['spot_main_image']['name']}}_l.jpg"
               alt="{{$data['spot']['name']}}" class="rounded shadow">
        </div>
        <div class="w-3/5">
          @if(!empty($data['icons']['status']))
            <div class="grid grid-cols-3 md:grid-cols-6">
              @foreach($data['icons']['status']['data'] as $icon)
                <div class="flex items-center text-center mb-1 mr-1 px-1 pt-2 pb-1 bg-gray-50 rounded border border-gray-200">
                  <div>
                    <div class="flex justify-center mb-1 sm:mb-2">
                      <div class="tooltip flex justify-center" data-tip="{{$icon['type']['name']}}">
                      <img src="{{asset('/')}}img/general/pages/spot/icons/{{$icon['type']['serial']}}.png"
                           alt="{{$icon['name']}}"
                           class="w-1/3 md:w-1/3">
                      </div>
                    </div>
                    <div class="text-xs sm:text-sm">{{$icon['name']}}</div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
          <div class="pt-2 pb-1 text-xl block hidden tracking-wider font-bold md:block">{{$data['spot']['heading']}}</div>
          <div class="block hidden tracking-widest md:block">{{$data['spot']['message']}}</div>
        </div>
      </div>

      <div class="bg-gray-50 border text-sm border-gray-200 p-4 rounded mb-5 block md:hidden">{{$data['spot']['heading']}}</div>

      <table class="w-full text-left text-sm sm:text-base tracking-wider">
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            空き状況
          </th>
          <td class="p-4 w-3/4">
            @if($data['spot']['vacancy'] === 2)
              空きあり
            @elseif($data['spot']['vacancy'] === 3)
              空きなし
            @else
              要問合せ
            @endif
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            施設見学
          </th>
          <td class="p-4 w-3/4">
            @if($data['spot']['viewing'] === 2)
              見学予約可能
            @elseif($data['spot']['viewing'] === 3)
              見学対応不可
            @else
              要問合せ
            @endif
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            月額料金
          </th>
          <td class="p-4 w-3/4 tracking-wider">
            <span class="text-base pr-1">{{number_format($data['spot']['monthly_price_min'])}}</span>円
            @if($data['spot']['for_check_monthly'])〜@endif
            @if($data['spot']['monthly_price_max'] > 0)<span class="text-base pr-1">{{number_format($data['spot']['monthly_price_max'])}}</span>
            円@endif
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            入居時費用
          </th>
          <td class="p-4 w-3/4">
            <span class="text-base pr-1">{{number_format($data['spot']['movein_price_min'])}}円</span>
            @if($data['spot']['for_check_movein'])〜@endif
            @if($data['spot']['movein_price_max'] > 0)<span class="text-base pr-1">{{number_format($data['spot']['movein_price_max'])}}</span>円@endif
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            電話番号
          </th>
          <td class="p-4 w-3/4">
            <div><a href="tel:{{$data['spot']['tel1']}}{{$data['spot']['tel2']}}{{$data['spot']['tel3']}}"
                    class="text-accent hover:text-accent_light hover:underline">{{$data['spot']['tel1']}}-{{$data['spot']['tel2']}}-{{$data['spot']['tel3']}}</a></div>
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            所在地
          </th>
          <td class="p-4 w-3/4">
            @if($data['spot']['zip1'] !=='' && $data['spot']['zip2']!=='')
            〒{{$data['spot']['zip1']}}-{{$data['spot']['zip2']}}<br>
            @endif
            {{$data['cities'][$data['spot']['city_id']]}}{{$data['spot']['address']}} <a href="#SpotMap" class="text-accent hover:text-accent_light cursor-pointer"><i
                      class="fa-solid fa-location-dot"></i></a>
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            施設種別
          </th>
          <td class="p-4 w-3/4">
            <a href="{{asset('/')}}spot/?search[category]={{$data['spot']['category_id']}}&search[simple]=1" class="text-accent hover:text-accent_light hover:underline">{{$data['categories'][$data['spot']['category_id']]}}</a>
          </td>
        </tr>
      </table>
    </div>

    <div class="shadow bg-white rounded p-6 mb-4 sm:rounded-xl sm:p-6 sm:mb-8 md:px-14 md:py-14">
      @if($data['icons'])
        @foreach($data['icons'] as $icons)
          @if($icons['serial'] !== 'status')
            <h3 class="text-md mb-4 text-md font-bold tracking-wider md:text-xl">
              {{$icons['name']}}
            </h3>
            <div class="mb-5 pb-5">
              <div class="grid grid-cols-3 md:grid-cols-5">
                @foreach($icons['data'] as $icon)
                  <div class="flex items-center text-center mb-1 mr-1 px-1 pt-2 pb-1 bg-gray-50 rounded border border-gray-200">
                    <div>
                      <div class="flex justify-center mb-1 sm:mb-2">
                        <div class="tooltip flex justify-center" data-tip="{{$icon['type']['name']}}">
                          <img src="{{asset('/')}}img/general/pages/spot/icons/{{$icon['type']['serial']}}.png"
                               alt="{{$icon['name']}}"
                               class="w-1/4 md:w-1/4">
                        </div>
                      </div>
                      <div class="text-xs xl:text-md">{{$icon['name']}}</div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endif
        @endforeach
      @endif
    </div>

    <div class="shadow bg-white rounded p-6 mb-4 sm:rounded-xl sm:p-6 sm:mb-8 md:px-14 md:py-14">
      <h3 class="text-lg mb-4 text-md font-bold tracking-wider">
        基本情報
      </h3>
      <table class="w-full text-left text-sm sm:text-base">
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            事業所名
          </th>
          <td class="p-4 w-3/4">
            {{$data['spot']['name']}}
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            住　所
          </th>
          <td class="p-4 w-3/4">
            {{$data['cities'][$data['spot']['city_id']]}}{{$data['spot']['address']}}
            <a href="#SpotMap" class="text-accent hover:text-accent_light cursor-pointer"><i
                      class="fa-solid fa-location-dot"></i></a>
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            電話番号
          </th>
          <td class="p-4 w-3/4">
            <a href="tel:{{$data['spot']['tel1']}}{{$data['spot']['tel2']}}{{$data['spot']['tel3']}}"
               class="text-accent hover:text-accent_light cursor-pointer hover:underline">
              {{$data['spot']['tel1']}}-{{$data['spot']['tel2']}}-{{$data['spot']['tel3']}}</a>
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            運営会社
          </th>
          <td class="p-4 w-3/4">
            {{$data['spot']['spot_detail']['company_name']}}
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            居室数
          </th>
          <td class="p-4 w-3/4">
            {{$data['spot']['spot_detail']['rooms']}}
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            スタッフ数
          </th>
          <td class="p-4 w-3/4">
            {{$data['spot']['spot_detail']['staffs']}}
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            スタッフ平均年齢
          </th>
          <td class="p-4 w-3/4">
            {{$data['spot']['spot_detail']['staff_age']}}
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            看護師在籍人数
          </th>
          <td class="p-4 w-3/4">
            {{$data['spot']['spot_detail']['nurses']}}
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            看護師在勤時間
          </th>
          <td class="p-4 w-3/4">
            {{$data['spot']['spot_detail']['nurse_time']}}
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            建築（リフォーム）年月日
          </th>
          <td class="p-4 w-3/4">
            {{$data['spot']['spot_detail']['build_start']}}
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            営業年月日
          </th>
          <td class="p-4 w-3/4">
            {{$data['spot']['spot_detail']['open_start']}}
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            Webサイト
          </th>
          <td class="p-4 w-3/4">
            {!! GeneralTextHelper::makeLink($data['spot']['spot_detail']['website']) !!}
          </td>
        </tr>
        <tr class="border">
          <th class="p-4 border border-gray-200 bg-gray-100 w-1/4">
            提携医療機関
          </th>
          <td class="p-4 w-3/4">
          </td>
        </tr>
      </table>
    </div>

    <div class="shadow bg-white rounded p-6 mb-4 sm:rounded-xl sm:p-6 sm:mb-8 md:px-14 md:py-14" id="SpotMap">
      <iframe class="w-full h-96" src="https://maps.google.co.jp/maps?&output=embed&q={{$data['spot']['lat']}},{{$data['spot']['lng']}}"></iframe>
    </div>

  </section>
@endsection


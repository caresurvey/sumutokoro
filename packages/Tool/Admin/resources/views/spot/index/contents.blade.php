@extends('admin::layouts.app')
@section('title', '事業所管理｜' . config('myapp.site_name'))

@section('content')
  @include('admin::spot.index.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      事業所管理
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        @if($data['totalCount'] > 0)
          {{$data['totalCount']}}件がみつかりました（{{$data['current']}}ページ目を表示）
        @endif
      </p>
    </div>
  </div>

  @include('common::form.errors')

  <div class="flex justify-between">
    <div class="mb-5">
      <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/spot" method="get">
        <div class="flex">
          <div class="mr-2">
            <div class="tooltip tooltip-top link link-hover link-primary" data-tip="事業所を全件一覧で表示する">
              <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/spot"
                 class="btn btn-sm btn-primary btn-hover rounded-full"><i
                        class="fa-solid fa-list-ol mr-2"></i>全件表示</a>
            </div>
          </div>
          <select name="search[city]" id="HeaderSearchCity"
                  class="-mr-1 select select-bordered rounded-r-lg rounded-full select-sm text-xs">
            <option value="1">地域を選択</option>
            @foreach($data['cities'] as $city)
              @if($city['spots_count'] > 0)
                <option value="{{$city['id']}}"
                        @if($city['id'] === $data['query']['city']) selected @endif>{{$city['name']}}
                  ({{$city['spots_count']}})
                </option>
              @endif
            @endforeach
          </select>
          <input type="text" id="HeaderSearchKeyword" name="search[keyword]" value="{{$data['query']['keyword']}}"
                 placeholder="キーワードを入力"
                 class="-mr-1 input rounded-none input-bordered input-sm">
          <div class="tooltip tooltip-top" data-tip="事業所を検索する">
            <button class="btn rounded-l-lg rounded-full btn-sm">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
              </svg>
            </button>
          </div>
        </div>
        <input type="hidden" name="search[simple]" value="1">
      </form>
    </div>
    <div class="tooltip tooltip-left link link-hover link-primary" id="SpotAddBtn" data-tip="事業所追加パネルを表示">
      <label for="add-modal-open" class="btn modal-button rounded-full btn-sm"><i
                class="fa-solid fa-circle-plus mr-2"></i>追加</label>
    </div>
  </div>

  @if(!empty($data['spots'][0]))
    <div class="bg-white shadow-sm rounded p-4">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
        <tr>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="IDを基準に並び替えます">
              @sortablelink('id','ID')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="表示／非表示を基準に並び替えます">
              @sortablelink('display','表 示')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="市町村を基準に並び替えます">
              @sortablelink('city_id','市町村')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="地域包括支援センターを基準に並び替えます">
              @sortablelink('area_center_id','地域包括')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="種別を基準に並び替えます">
              @sortablelink('category_id','種別')
            </div>
          </th>
          <th class="py-2 px-2 w-5/12">
            <div class="tooltip sortable-link" data-tip="事業所名を基準に並び替えます">
              @sortablelink('name','事業所名')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="写真があるかどうかを基準に並び替えます">
              @sortablelink('spot_main_image_count','写真')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12 text-center">確認</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['spots'] as $value)
          <tr class="bg-white border-b even:bg-gray-50">
            <td class="py-2 px-2">{{$value['id']}}</td>
            <td class="py-2 px-2">
              @include('admin::common.list.display', ['model' => 'spot', 'id' => $value['id'], 'display' => $value['display']])
            </td>
            <td class="py-2 px-2 text-xs">{{$data['data_cities'][$value['city_id']]}}</td>
            <td class="py-2 px-2 text-xs">{{$data['data_area_centers'][$value['area_center_id']]}}</td>
            <td class="py-2 px-2 text-xs">{{$data['data_categories'][$value['category_id']]}}</td>
            <td class="w-4/12 py-4 px-2">
              <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/spot/{{$value['id']}}/edit"
                 class="tooltip link link-hover link-primary"
                 data-tip="クリックで{{$value['name']}}のデータを編集" id="SpotName{{$value['id']}}">{{$value['name']}}</a><br>
              <span class="text-xs">{{$data['data_prefectures'][$value['prefecture_id']]}}{{$data['data_cities'][$value['city_id']]}}{{$value['address']}}</span>
            </td>
            <td class="py-2 px-2">
              @if(!empty($value['spot_main_image']['name']))
                @include('admin::common.list.image', ['spot_id' => $value['id'], 'name' => $value['spot_main_image']['name']])
              @endif
            </td>
            <td class="py-2 px-2 text-center">
              <div class="tooltip" data-tip="冊子確認">
                <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/book/preview/{{$value['id']}}/@include('common::spot.make_token', ['id' =>$value['id'], 'name' => $value['name']])"
                   class="text-accent hover:text-accent_light mr-1" target="_blank"><i
                          class="fa-solid fa-book"></i></a>
              </div>
              <div class="tooltip" data-tip="公開ページへ">
                <a href="{{asset('/')}}spot/{{$value['id']}}" class="text-accent hover:text-accent_light"
                   target="_blank" id="SpotMore{{$value['id']}}"><i
                          class="fa-solid fa-window-maximize"></i></a>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>

      {!! $data['linkTag'] !!}

    </div>
  @else
    <div class="bg-white shadow-sm rounded px-4 py-40 text-center">
      条件に合う事業所が見つかりませんでした。<br>
      再度検索をするか、<a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/spot"
                  class="text-accent hover:text-accent_light">こちらから全件表示をしてください。</a>
    </div>
  @endif
  @include('admin::spot.index.add')
@endsection


@extends('user::layouts.app')
@section('title', '事業所管理｜' . config('myapp.site_name'))

@section('content')
  @include('user::spot.index.breadcrumb')
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

  @if(!empty($data['spots'][0]))
    <div class="bg-white shadow-sm rounded p-4">
      <table class="w-full text-sm text-left text-gray-500 mb-10">
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
            <div class="tooltip sortable-link" data-tip="投稿日を基準に並び替えます">
              @sortablelink('created_at','投稿日')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="市町村を基準に並び替えます">
              @sortablelink('display','市町村')
            </div>
          </th>
          <th class="py-2 px-2 w-6/12">
            <div class="tooltip sortable-link" data-tip="事業所名を基準に並び替えます">
              @sortablelink('name','事業所名')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="写真があるかどうかを基準に並び替えます">
              @sortablelink('spot_main_image_count','写真')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">確認</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['spots'] as $value)
          <tr class="bg-white border-b even:bg-gray-50">
            <td class="py-2 px-2">{{$value['id']}}</td>
            <td class="py-2 px-2">
              @include('user::common.list.display', ['model' => 'spot', 'id' => $value['id'], 'display' => $value['display']])
            </td>
            <td class="py-2 px-2">{{$value['created_at']->format("y/m/d")}}</td>
            <td class="py-2 px-2">{{$data['cities'][$value['city_id']]}}</td>
            <td class="w-4/12 py-4 px-2">
              <a href="{{asset('/')}}user/spot/{{$value['id']}}/edit"
                 class="tooltip link link-hover link-primary"
                 data-tip="クリックで{{$value['name']}}のデータを編集">{{$value['name']}}</a><br>
              <span class="text-xs">{{$data['prefectures'][$value['prefecture_id']]}}{{$value['address']}}</span>
            </td>
            <td class="py-2 px-2">
              @include('admin::common.list.image', ['spot_id' => $value['id'], 'name' => $value['spot_main_image']['name']])
            </td>
            <td class="py-2 px-2">
              <div class="tooltip" data-tip="冊子確認">
                <a href="{{asset('/')}}user/spot/{{$value['id']}}/edit" class="text-accent hover:text-accent_light mr-1"><i
                          class="fa-solid fa-book"></i></a>
              </div>
              <div class="tooltip" data-tip="公開ページへ">
                <a href="{{asset('/')}}spot/{{$value['id']}}" class="text-accent hover:text-accent_light" target="_blank"><i
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
      管理できる事業所データが見つかりませんでした。
    </div>
  @endif
  @include('user::spot.index.add')
@endsection


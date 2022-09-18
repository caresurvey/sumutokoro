@extends('user::layouts.app')
@section('title', '法人管理｜' . config('myapp.site_name'))

@section('content')
  @include('user::company.index.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      法人管理
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        @if($data['totalCount'] > 0)
          {{$data['totalCount']}}件がみつかりました（{{$data['current']}}ページ目を表示）
        @endif
      </p>
    </div>
  </div>

  @if(!empty($data['companies'][0]))
    <div class="bg-white shadow-sm rounded p-4">
      <table class="w-full text-sm text-left text-gray-500 mb-10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
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
          <th class="py-2 px-2 w-2/12">
            <div class="tooltip sortable-link" data-tip="投稿日を基準に並び替えます">
              @sortablelink('created_at','投稿日')
            </div>
          </th>
          <th class="py-2 px-2 w-6/12">
            <div class="tooltip sortable-link" data-tip="法人名を基準に並び替えます">
              @sortablelink('name','法人名')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">確認</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['companies'] as $value)
          <tr class="bg-white border-b even:bg-gray-50">
            <td class="py-2 px-2">{{$value['id']}}</td>
            <td class="py-2 px-2">
              @include('user::common.list.display', ['model' => 'company', 'id' => $value['id'], 'display' => $value['display']])
            </td>
            <td class="py-2 px-2 text-xs">{{$value['created_at']->format("Y/m/d H:m")}}</td>
            <td class="w-4/12 py-4 px-2">
              <a href="{{asset('/')}}user/company/{{$value['id']}}/edit"
                 class="tooltip link link-hover link-primary"
                 data-tip="クリックで{{$value['name']}}のデータを編集">{{$value['name']}}</a>
            </td>
            <td class="py-2 px-2">
              <div class="tooltip sortable-link" data-tip="公開ページを開く">
                <a href="{{asset('/')}}company/{{$value['id']}}"
                   class="text-accent hover:text-accent_light" target="_blank"><i
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
      管理できる法人データが見つかりませんでした。
    </div>
  @endif
  @include('user::company.index.add')
@endsection


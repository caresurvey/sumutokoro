@extends('admin::layouts.app')
@section('title', '法人管理｜' . config('myapp.site_name'))

@section('content')
  @include('admin::company.index.breadcrumb')
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

  @include('common::form.errors')

  <div class="flex justify-between">
    <div class="mb-5">
      <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/company" method="get">
        <div class="flex">
          <div class="mr-2">
            <div class="tooltip tooltip-top link link-hover link-primary" data-tip="法人を全件一覧で表示する">
              <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/company"
                 class="btn btn-sm btn-primary btn-hover rounded-full"><i
                        class="fa-solid fa-list-ol mr-2"></i>全件表示</a>
            </div>
          </div>
          <select name="search[city]" id="HeaderSearchCity"
                  class="-mr-1 select select-bordered rounded-r-lg rounded-full select-sm text-xs">
            <option value="1">地域を選択</option>
            @foreach($data['cities'] as $city)
              @if($city['companies_count'] > 0)
                <option value="{{$city['id']}}"
                        @if($city['id'] === $data['query']['city']) selected @endif>{{$city['name']}}
                  ({{$city['companies_count']}})
                </option>
              @endif
            @endforeach
          </select>
          <input type="text" id="HeaderSearchKeyword" name="search[keyword]" value="{{$data['query']['keyword']}}"
                 placeholder="キーワードを入力"
                 class="-mr-1 input rounded-none input-bordered input-sm">
          <div class="tooltip tooltip-top" data-tip="法人を検索する">
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
    <div class="tooltip tooltip-left link link-hover link-primary" id="CompanyAddBtn" data-tip="法人追加パネルを表示">
      <label for="add-modal-open" class="btn modal-button rounded-full btn-sm"><i
                class="fa-solid fa-circle-plus mr-2"></i>追加</label>
    </div>
  </div>

  @if(!empty($data['companies'][0]))
    <div class="bg-white shadow-sm rounded p-4">
      <table class="w-full text-sm text-left text-gray-500">
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
              @include('admin::common.list.display', ['model' => 'company', 'id' => $value['id'], 'display' => $value['display']])
            </td>
            <td class="py-2 px-2 text-xs">{{$value['created_at']->format("Y/m/d H:m")}}</td>
            <td class="w-4/12 py-4 px-2">
              <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/company/{{$value['id']}}/edit"
                 class="tooltip link link-hover link-primary" data-tip="クリックで{{$value['name']}}のデータを編集" id="CompanyName{{$value['id']}}">{{$value['name']}}</a><br>
            </td>
            <td class="py-2 px-2">
              <div class="tooltip link link-hover link-primary" data-tip="公開ページを開く">
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
      条件に合う法人が見つかりませんでした。<br>
      再度検索をするか、<a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/company"
                  class="text-accent hover:text-accent_light">こちらから全件表示をしてください。</a>
    </div>
  @endif
  @include('admin::company.index.add')
@endsection


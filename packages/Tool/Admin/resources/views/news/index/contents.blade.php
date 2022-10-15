@extends('admin::layouts.app')
@section('title', 'お知らせ管理｜' . config('myapp.site_name'))

@section('content')
  @include('admin::news.index.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      お知らせ管理
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

  <div class="flex justify-end pb-4">
    <div class="tooltip tooltip-left link link-hover link-primary" id="NewsAddBtn" data-tip="法人追加パネルを表示">
      <label for="add-modal-open" class="btn modal-button rounded-full btn-sm"><i
                class="fa-solid fa-circle-plus mr-2"></i>追加</label>
    </div>
  </div>

  @if(!empty($data['news'][0]))
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
            <div class="tooltip sortable-link" data-tip="記事名を基準に並び替えます">
              @sortablelink('name','記事名')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">確認</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['news'] as $value)
          <tr class="bg-white border-b even:bg-gray-50">
            <td class="py-2 px-2">{{$value['id']}}</td>
            <td class="py-2 px-2">
              @include('admin::common.list.display', ['model' => 'news', 'id' => $value['id'], 'display' => $value['display']])
            </td>
            <td class="py-2 px-2 text-xs">{{$value['created_at']->format("Y/m/d H:m")}}</td>
            <td class="w-4/12 py-4 px-2">
              <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/news/{{$value['id']}}/edit"
                 class="tooltip link link-hover link-primary" data-tip="クリックで{{$value['name']}}のデータを編集" id="NewsName{{$value['id']}}">{{$value['name']}}</a><br>
            </td>
            <td class="py-2 px-2">
              <div class="tooltip link link-hover link-primary" data-tip="公開ページを開く">
                <a href="{{asset('/')}}news/{{$value['id']}}"
                   class="text-accent hover:text-accent_light" target="_blank"><i
                          class="fa-solid fa-window-maximize" id="UserMore{{$value['id']}}"></i></a>
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
      条件に合う記事が見つかりませんでした。<br>
      再度検索をするか、<a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/news" class="text-accent hover:text-accent_light">こちらから全件表示をしてください。</a>
    </div>
  @endif
  @include('admin::news.index.add')
@endsection


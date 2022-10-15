@extends('admin::layouts.app')
@section('title', 'ユーザー管理｜' . config('myapp.site_name'))

@section('content')
  @include('admin::user.index.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      ユーザー管理
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
    <div class="tooltip tooltip-left link link-hover link-primary" id="UserAddBtn" data-tip="ユーザー追加パネルを表示">
      <label for="add-modal-open" class="btn modal-button rounded-full btn-sm"><i
                class="fa-solid fa-circle-plus mr-2"></i>追加</label>
    </div>
  </div>

  @if(!empty($data['users'][0]))
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
            <div class="tooltip sortable-link" data-tip="有効／無効を基準に並び替えます">
              @sortablelink('enabled','表 示')
            </div>
          </th>
          <th class="py-2 px-2 w-2/12">
            <div class="tooltip sortable-link" data-tip="投稿日を基準に並び替えます">
              @sortablelink('created_at','投稿日')
            </div>
          </th>
          <th class="py-2 px-2 w-5/12">
            <div class="tooltip sortable-link" data-tip="ユーザー名を基準に並び替えます">
              @sortablelink('name','ユーザー名')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="確認済みかどうかを基準に並び替えます">
              @sortablelink('is_authenticated','認証')
            </div>
          </th>
          <th class="py-2 px-2 w-1/12">確認</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['users'] as $value)
          <tr class="bg-white border-b even:bg-gray-50">
            <td class="py-2 px-2">{{$value['id']}}</td>
            <td class="py-2 px-2">
              @include('admin::common.list.enabled', ['model' => 'user', 'id' => $value['id'], 'enabled' => $value['enabled']])
            </td>
            <td class="py-2 px-2">{{$value['created_at']->format("y/m/d H:m")}}</td>
            <td class="w-4/12 py-4 px-2">
              <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/user/{{$value['id']}}/edit"
                 class="tooltip link link-hover link-primary" data-tip="クリックで{{$value['name']}}のデータを編集" id="UserName{{$value['id']}}">{{$value['name']}}</a><br>
            </td>
            <td>
              @if($value['is_authenticated'] === 1)
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
                @endif
            </td>
            <td>
              <div class="tooltip" data-tip="公開ページへ">
                <a href="{{asset('/')}}news/detail/{{$value['id']}}" class="text-accent hover:text-accent_light"
                   target="_blank" id="UserMore{{$value['id']}}"><i class="fa-solid fa-window-maximize"></i></a>
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
      条件に合うユーザーが見つかりませんでした。<br>
      再度検索をするか、<a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/user" class="text-accent hover:text-accent_light">こちらから全件表示をしてください。</a>
    </div>
  @endif
  @include('admin::user.index.add')
@endsection


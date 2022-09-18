@extends('admin::layouts.app')
@section('title', '操作履歴｜' . config('myapp.site_name'))

@section('content')
  @include('admin::user.index.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      操作履歴
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        ユーザーの操作履歴一覧を閲覧できます。
      </p>
    </div>
  </div>

  @if(!empty($data['logs'][0]))
    <div class="bg-white shadow-sm rounded p-4">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
        <tr>
          <th class="py-2 px-2 w-1/12">
            <div class="tooltip sortable-link" data-tip="IDを基準に並び替えます">
              @sortablelink('id','ID')
            </div>
          </th>
          <th class="py-2 px-2 w-2/12">
            <div class="tooltip sortable-link" data-tip="記録日を基準に並び替えます">
              @sortablelink('created_at','記録日')
            </div>
          </th>
          <th class="py-2 px-2 w-2/12">
            <div class="tooltip sortable-link" data-tip="操作したユーザー名を基準に並び替えます">
              @sortablelink('name','操作ユーザー')
            </div>
          </th>
          <th class="py-2 px-2 w-2/12">
            <div class="tooltip sortable-link" data-tip="ページタイプを基準に並び替えます">
              @sortablelink('prefix','ページタイプ')
            </div>
          </th>
          <th class="py-2 px-2 w-2/12">
            <div class="tooltip sortable-link" data-tip="操作したページを基準に並び替えます">
              @sortablelink('prefix','ページ')
            </div>
          </th>
          <th class="py-2 px-2 w-2/12">
            <div class="tooltip sortable-link" data-tip="操作した行動の種類を基準に並び替えます">
              @sortablelink('prefix','アクション')
            </div>
          </th>
          <th class="py-2 px-2 w-2/12">
            操作
          </th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['logs'] as $value)
          <tr class="bg-white border-b even:bg-gray-50">
            <td class="py-2 px-2">{{$value['id']}}</td>
            <td class="py-2 px-2">{{$value['created_at']->format("y/m/d H:m")}}</td>
            <td class="py-2 px-2">{{$value['user_name']}}さん</td>
            <td class="py-2 px-2">{{$value['prefix']}}</td>
            <td class="py-2 px-2">{{$value['page']}}</td>
            <td class="py-2 px-2">{{$value['action']}}</td>
            <td><a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/log/{{$value['id']}}" class="btn btn-hover btn-xs rounded-full">確認</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>

      {!! $data['linkTag'] !!}

    </div>
  @else
    <div class="bg-white shadow-sm rounded px-4 py-40 text-center">
      ログが見つかりませんでした。
    </div>
  @endif
@endsection


@extends('admin::layouts.app')
@section('title', '操作履歴詳細｜' . config('myapp.site_name'))

@section('content')
  @include('admin::log.show.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      操作履歴詳細
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        登録ユーザーの操作履歴確認ができます
      </p>
    </div>
  </div>

  <div class="bg-white shadow-sm rounded mb-5 p-4">
    <table class="w-full text-sm text-left text-gray-500">
      <tbody>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          操作日時
        </th>
        <td class="py-4 px-4 w-4/5">
          {{date('Y/m/d H:i:s',  strtotime($data['log']['created_at']))}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          操作ユーザー名
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['log']['user_name']}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          操作したページタイプ
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['log']['prefix']}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          操作したページ
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['log']['page']}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          行動種類
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['log']['action']}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          完了メッセージ
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['log']['value']}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          IP
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['log']['ip']}}
        </td>
      </tr>
      <tr class="bg-white">
        <th class="py-4 px-4 w-1/5">
          詳細ログ
        </th>
        <td class="py-4 px-4 w-4/5" style="word-break: break-all;">
          {{$data['log']['log']}}
        </td>
      </tr>
      </tbody>
    </table>
  </div>
  <p class="text-center w-full">
    <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/log/" class="link link-hover link-primary text-sm">ログ一覧に戻る</a>
  </p>

  </div>
@endsection


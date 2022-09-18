@extends('admin::layouts.app')
@section('title', 'お問い合わせ詳細｜' . config('myapp.site_name'))

@section('content')
  @include('admin::contact.show.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      お問い合わせ詳細
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        登録ユーザーのお問い合わせ確認ができます
      </p>
    </div>
  </div>

  <div class="bg-white shadow-sm rounded mb-5 p-4">
    <table class="w-full text-sm text-left text-gray-500">
      <tbody>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          問合せ日
        </th>
        <td class="py-4 px-4 w-4/5">
          {{date('Y/m/d H:i:s',  strtotime($data['contact']['created_at']))}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          お名前
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['contact']['name']}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          ふりがな
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['contact']['kana']}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          メールアドレス
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['contact']['email']}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          電話番号
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['contact']['tel']}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          ご返答方法
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['contact']['reply']}}
        </td>
      </tr>
      <tr class="bg-white border-b">
        <th class="py-4 px-4 w-1/5">
          お問い合わせ内容
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['contact']['msg']}}
        </td>
      </tr>
      <tr class="bg-white">
        <th class="py-4 px-4 w-1/5">
          IP
        </th>
        <td class="py-4 px-4 w-4/5">
          {{$data['contact']['ip']}}
        </td>
      </tr>
      </tbody>
    </table>
  </div>
  <p class="text-center w-full">
    <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/contact/" class="link link-hover link-primary text-sm">お問い合わせ一覧に戻る</a>
  </p>

  </div>
@endsection


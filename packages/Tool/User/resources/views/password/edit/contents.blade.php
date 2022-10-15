@extends('user::layouts.app')
@section('title', 'パスワード変更｜' . config('myapp.site_name'))

@section('content')
  @include('user::user.edit.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      パスワード変更
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        ログイン時のパスワードを変更できます
      </p>
    </div>
  </div>

  @include('common::form.errors')

  <form action="{{asset('/')}}user/password"
        onsubmit="return confirm('パスワードを変更してもよろしいですか？')" method="post" accept-charset="UTF-8"
        id="PasswordEditForm">
    @method('PUT')
    @csrf
    <div class="bg-white shadow-sm rounded mb-5 p-4 lg:p-8">
      <table class="w-full text-sm text-left text-gray-500">
        <tbody>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
            パスワード
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.password', [
              'name' => 'user[password]',
              'id' => 'UserPassword',
              'value' => old('user.password'),
              'placeholder' => 'パスワードを入力してください',
              'ps' => '※数字を混ぜた半角英数字8文字以上を設定してください',
              'hasError' => $errors->has('user.password'),
              'errors' => $errors->get('user.password'),
              ])
          </td>
        </tr>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
            パスワード再入力
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.password', [
              'name' => 'user[password_confirm]',
              'id' => 'UserPasswordConfirm',
              'value' => old('user.password_confirm'),
              'placeholder' => '上記のパスワードを再入力してください',
              'ps' => '上記のパスワードをコピペせずに再入力してください',
              'hasError' => $errors->has('user.password_confirm'),
              'errors' => $errors->get('user.password_confirm'),
              ])
          </td>
        </tr>
        </tbody>
      </table>
    </div>

    <div class="w-full py-4 border-white bg-black bg-opacity-70
          fixed left-0 bottom-0
          flex justify-center items-center
          text-white
          z-200
          ">
      <input type="submit" value="パスワードを変更する"
             class="btn btn-wider px-12 text-lg rounded-full btn-hover tracking-wider" id="UserSubmit">
    </div>
    <input type="hidden" id="UserId" name="user[id]" value="{{$data['user']['id']}}">
  </form>

@endsection


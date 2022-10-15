@extends('admin::layouts.app')
@section('title', $data['user']['name'].'さん｜ユーザー管理 - ' . config('myapp.site_name'))

@section('content')
  @include('admin::user.edit.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      ユーザー情報編集
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        {{$data['user']['name']}}さんの編集ができます
      </p>
    </div>
  </div>

  @include('common::form.errors')

  <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/user/{{$data['user']['id']}}"
        onsubmit="return confirm('変更を反映してもよろしいですか？')" method="post" accept-charset="UTF-8"
        id="UserEditForm">
    @method('PUT')
    @csrf
    <div class="bg-white shadow-sm rounded mb-5 p-4">
      <table class="w-full text-sm text-left text-gray-600">
        <tbody>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            登録日
          </th>
          <td class="py-4 px-4 w-4/5">
            {{date('Y/m/d H:i:s',  strtotime($data['user']['created_at']))}}<br>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            有効設定
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex">
              <input type="hidden" name="user[enabled]" value="0">
              <label class="label cursor-pointer">
                <input type="checkbox" name="user[enabled]" value="1" id="UserEnabled" class="toggle toggle-primary mr-2"
                        {{ (int)old('user.enabled', $data['user']['enabled']) === 1 ? 'checked' : '' }}>
                <span class="label-text">このユーザーを有効にする</span>
              </label>
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
            お名前
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'user[name]',
              'id' => 'UserName',
              'value' => old('user.name', $data['user']['name']),
              'placeholder' => 'ユーザー名を入れてください',
              'ps' => '例：介護太郎',
              'hasError' => $errors->has('user.name'),
              'errors' => $errors->get('user.name'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            ふりがな
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'user[kana]',
              'id' => 'UserKana',
              'value' => old('user.kana', $data['user']['kana']),
              'placeholder' => 'ふりがなを入れてください',
              'ps' => '例：かいごたろう',
              'hasError' => $errors->has('user.kana'),
              'errors' => $errors->get('user.kana'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            事業所との関連付け
          </th>
          <td class="py-4 px-4 w-4/5">
            @if($data['user']['role_id'] < 4)
              <user-associate-spots data='@json($data["associatedSpots"])'
                                    :user_id='{{$data["user"]["id"]}}'></user-associate-spots>
            @else
              この権限では事業所との関連付けができません
            @endif
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            法人との関連付け
          </th>
          <td class="py-4 px-4 w-4/5">
            @if($data['user']['role_id'] < 4)
            <user-associate-companies data='@json($data["associatedCompanies"])'
                                      :user_id='{{$data["user"]["id"]}}'></user-associate-companies>
            @else
              この権限では法人との関連付けができません
            @endif
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            事業所郵便番号
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="w-2/5">
              @include('common::form.zip2', [
                'name1' => 'user[zip1]',
                'id1' => 'UserZip1',
                'value1' => old('user.zip1', $data['user']['zip1']),
                'placeholder1' => '番号1',
                'name2' => 'user[zip2]',
                'id2' => 'UserZip2',
                'value2' => old('user.zip2', $data['user']['zip2']),
                'placeholder2' => '番号2',
                'ps' => '例:070-1111',
                'hasError1' => $errors->has('user.zip1'),
                'errors1' => $errors->get('user.zip1'),
                'hasError2' => $errors->has('user.zip2'),
                'errors2' => $errors->get('user.zip2'),
                ])
            </div>
          </td>
        </tr>
        <tr class="bg-gray-50 border-b">
          <th class="py-4 px-4 w-1/5">
            住所
          </th>
          <td class="py-4 px-4 w-4/5">

            <div class="flex mb-2">
              <select name="user[prefecture_id]" id="UserPrefecture"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 rounded-l-md rounded-r-none select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['prefectures'] as $key => $prefecture)
                  <option
                    value="{{$key}}"
                    id="Prefecture{{$key}}"
                    @if($key === (int)old('user.prefecture_id', $data['user']['prefecture_id'])) selected @endif>{{$prefecture}}</option>
                @endforeach
              </select>
              <select name="user[city_id]" id="UserCity"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 rounded-r-md rounded-l-none select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['cities'] as $key => $city)
                  <option
                    value="{{$key}}"
                    id="City{{$key}}"
                    @if($key === (int)old('user.city_id', $data['user']['city_id'])) selected @endif>{{$city}}</option>
                @endforeach
              </select>
            </div>

            @include('common::form.text', [
              'name' => 'user[address]',
              'id' => 'UserAddress',
              'value' => old('user.address', $data['user']['address']),
              'ps' => '例：中央区北1条北1丁目1-1すむところビル1F',
              'placeholder' => '住所を入れてください',
              'hasError' => $errors->has('user.address'),
              'errors' => $errors->get('user.address'),
              ])

            <input type="hidden" id="UserPrefectureLabel"
                   value="{{$data['prefectures'][$data['user']['prefecture_id']]}}">
            <input type="hidden" id="UserCityLabel" value="{{$data['cities'][$data['user']['city_id']]}}">
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            電話番号
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.tel3', [
              'name1' => 'user[tel1]',
              'id1' => 'UserTel1',
              'value1' => old('user.tel1', $data['user']['tel1']),
              'placeholder1' => '番号1',
              'name2' => 'user[tel2]',
              'id2' => 'UserTel2',
              'value2' => old('user.tel2', $data['user']['tel2']),
              'placeholder2' => '番号2',
              'name3' => 'user[tel3]',
              'id3' => 'UserTel3',
              'value3' => old('user.tel3', $data['user']['tel3']),
              'placeholder3' => '番号3',
              'ps' => '例：011-123-4567',
              'hasError1' => $errors->has('user.tel1'),
              'errors1' => $errors->get('user.tel1'),
              'hasError2' => $errors->has('user.tel2'),
              'errors2' => $errors->get('user.tel2'),
              'hasError3' => $errors->has('user.tel3'),
              'errors3' => $errors->get('user.tel3'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            FAX
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'user[fax]',
              'id' => 'UserFax',
              'value' => old('user.fax', $data['user']['fax']),
              'placeholder' => 'FAXを入れてください',
              'ps' => '例：011-123-4567',
              'hasError' => $errors->has('user.fax'),
              'errors' => $errors->get('user.fax'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            メールアドレス
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.email', [
              'name' => 'user[email]',
              'id' => 'UserEmail',
              'value' => old('user.email', $data['user']['email']),
              'placeholder' => 'メールアドレスを入れてください',
              'ps' => '例：test@sumutokoro.com',
              'hasError' => $errors->has('user.email'),
              'errors' => $errors->get('user.email'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            所属法人・事業所
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'user[company]',
              'id' => 'UserCompany',
              'value' => old('user.company', $data['user']['company']),
              'placeholder' => 'FAXを入れてください',
              'ps' => '例：011-123-4567',
              'hasError' => $errors->has('user.company'),
              'errors' => $errors->get('user.company'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            ユーザー認証
          </th>
          <td class="py-4 px-4 w-4/5">
            @if($data['user']['role_id'] === 3)
              <div class="flex mb-4">
                <input type="hidden" name="user[is_authenticated]" value="0">
                <label class="label cursor-pointer">
                  <input type="checkbox" name="user[is_authenticated]" value="1" id="UserIsAuthenticated" class="toggle toggle-primary mr-2"
                          {{ (int)old('user.is_authenticated', $data['user']['is_authenticated']) === 1 ? 'checked' : '' }}>
                  <span class="label-text">ユーザー確認済み</span>
                </label>
              </div>

              @include('common::form.textarea', [
                'name' => 'user[authenticated_msg]',
                'id' => 'UserAuthenticatedMsg',
                'value' => old('user.authenticated_msg', $data['user']['authenticated_msg']),
                'placeholder' => 'ユーザー確認時のメモをを入れてください',
                'ps' => '※ ユーザー確認をとった日付や経緯、その他メモなどがあれば記入して下さい。',
                'rows' => 5,
                'hasError' => $errors->has('user.authenticated_msg'),
                'errors' => $errors->get('user.authenticated_msg'),
                ])
            @else
              ユーザー認証ができるのは登録ユーザーのみです。
              <input type="hidden" name="user[is_authenticated]" value="{{$data['user']['is_authenticated']}}">
              <input type="hidden" name="user[authenticated_msg]" value="{{$data['user']['authenticated_msg']}}">
            @endif
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            ユーザー権限
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="relative mr-2">
              <select name="user[role_id]" id="UserRole"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['roles'] as $key => $role)
                  <option
                    value="{{$key}}"
                    id="UserRole{{$key}}"
                    {{ (int)old('user.role_id', $data['user']['role_id']) === $key ? 'selected' : '' }} >{{$role}}</option>
                @endforeach
              </select>
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            職種
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="relative">
              <select name="user[job_type_id]" id="UserJobType"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['job_types'] as $key => $job_type)
                  <option
                    value="{{$key}}"
                    id="UserJobType{{$key}}"
                    @if($key === (int)old('user.job_type_id', $data['user']['job_type_id'])) selected @endif>{{$job_type}}</option>
                @endforeach
              </select>
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            ユーザータイプ
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="relative">
              <select name="user[user_type_id]" id="UserUserType"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['user_types'] as $key => $user_type)
                  <option
                    value="{{$key}}"
                    id="UserUserType{{$key}}"
                    @if($key === (int)old('user.user_type_id', $data['user']['user_type_id'])) selected @endif>{{$user_type}}</option>
                @endforeach
              </select>
            </div>
          </td>
        </tr>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            備考
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'user[msg]',
              'id' => 'UserMsg',
              'value' => old('user.msg', $data['user']['msg']),
              'placeholder' => '備考があれば入れてください',
              'ps' => '例：メモなどあればここに入れてください',
              'rows' => 5,
              'hasError' => $errors->has('user.msg'),
              'errors' => $errors->get('user.msg'),
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
      <input type="submit" value="ユーザー情報を変更する"
             id="UserSubmit" class="btn btn-wider px-12 text-lg rounded-full btn-hover">
    </div>
    <input type="hidden" id="UserId" name="user[id]" value="{{$data['user']['id']}}">
  </form>

  <div class="bg-white shadow-sm rounded mb-5 p-4">
    <table class="w-full text-sm text-left text-gray-600">
      <tbody>
      <tr class="bg-white">
        <th class="py-4 px-4 w-1/5">
          最終更新
        </th>
        <td class="py-4 px-4 w-4/5">
          <p class="leading-6">
            {{date('Y/m/d H:i:s',  strtotime($data['user']['updated_at']))}}<br>
            {{$data['user']['user']['name']}}さん
          </p>
        </td>
      </tr>
      </tbody>
    </table>
  </div>

  <div class="bg-white shadow-sm rounded mb-10 p-4">
    <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/user/{{$data['user']['id']}}"
          onsubmit="return confirm('本当に{{$data['user']['name']}}を削除してもよろしいですか？（※元には戻せません）')" method="post"
          accept-charset="UTF-8" id="UserDeleteForm">
      @method('DELETE')
      @csrf
      <table class="w-full text-sm text-left text-gray-600">
        <tbody>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            ユーザーの削除
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.delete', [
              'name' => 'ユーザー',
              'model' => 'user',
              'id' => 'UserDelete',
              'dataId' => $data['user']['id'],
              'value' => old('user_delete.code'),
              'ps' => '※半角英数字で入力してください',
              'hasError' => $errors->has('user_delete.code'),
              'errors' => $errors->get('user_delete.code'),
              'hasConfirmationError' => $errors->has('user_delete.confirmation'),
              'confirmationErrors' => $errors->get('user_delete.confirmation'),
              ])
          </td>
        </tr>
        </tbody>
      </table>
    </form>
  </div>
@endsection


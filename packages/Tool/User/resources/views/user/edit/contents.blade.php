@extends('user::layouts.app')
@section('title', 'プロフィール編集｜' . config('myapp.site_name'))

@section('content')
  @include('user::user.edit.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      プロフィール編集
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        {{$data['user']['name']}}さんの編集ができます
      </p>
    </div>
  </div>

  @include('common::form.errors')

  <form action="{{asset('/')}}user/user/{{$data['user']['id']}}"
        onsubmit="return confirm('変更を反映してもよろしいですか？')" method="post" accept-charset="UTF-8"
        id="UserEditForm">
    @method('PUT')
    @csrf
    <div class="bg-white shadow-sm rounded mb-5 p-4 lg:p-8">
      <table class="w-full text-sm text-left text-gray-500">
        <tbody>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            認証
          </th>
          <td class="py-4 px-4 w-4/5">
            @if(Auth::guard('user')->user()->is_authenticated === 1)
              <div class="flex items-center text-base">
                <label tabindex="0" class="mr-4">
                  <img src="{{asset('/')}}img/general/base/icon_profile_authenticated.png" class="w-12"
                       alt="{{Auth::guard('user')->user()->name}}さん（認証済み）">
                </label>
                <div>認証済み</div>
              </div>
            @else
              <div class="flex items-center text-base">
                <label tabindex="0" class="mr-4">
                  <img src="{{asset('/')}}img/general/base/icon_profile.png" class="w-12"
                       alt="{{Auth::guard('user')->user()->name}}さん">
                </label>
                <div>未認証</div>
              </div>
            @endif
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
            編集可能な事業所
          </th>
          <td class="py-4 px-4 w-4/5">
            @if($data['user']['is_authenticated'] !== 0)
              @if(!empty($data['user']['spots'][0]))
                @foreach($data['user']['spots'] as $spot)
                  <a href="{{asset('/')}}user/spot/{{$spot['id']}}/edit"
                     class="text-accent hover:text-accent_light hover:underline">{{$spot['name']}}</a><br>
                @endforeach
              @else
                編集可能な事業所はありません
              @endif
            @else
              編集可能な事業所はありません
            @endif
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            編集可能な法人
          </th>
          <td class="py-4 px-4 w-4/5">
            @if($data['user']['is_authenticated'] !== 0)
              @if(!empty($data['user']['companies'][0]))
                @foreach($data['user']['companies'] as $company)
                  <a href="{{asset('/')}}user/company/{{$company['id']}}/edit"
                     class="text-accent hover:text-accent_light hover:underline">{{$company['name']}}</a><br>
                @endforeach
              @else
                編集可能な法人はありません
              @endif
            @else
              編集可能な法人はありません
            @endif
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            郵便番号
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
        <tr class="bg-white border-b">
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
            <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
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
      <input type="submit" value="ユーザー情報を変更する" id="UserSubmit" 
             class="btn btn-wider px-12 text-lg rounded-full btn-hover tracking-wider">
    </div>
    <input type="hidden" id="UserId" name="user[id]" value="{{$data['user']['id']}}">
  </form>

@endsection


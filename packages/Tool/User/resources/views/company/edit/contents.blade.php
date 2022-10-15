@extends('user::layouts.app')
@section('title', $data['company']['name'].'｜法人管理 - ' . config('myapp.site_name'))

@section('content')
  @include('user::company.edit.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      法人管理
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        {{$data['company']['name']}}の編集ができます
      </p>
    </div>
  </div>

  @include('common::form.errors')

  <form action="{{asset('/')}}user/company/{{$data['company']['id']}}"
        onsubmit="return confirm('変更を反映してもよろしいですか？')" method="post" accept-charset="UTF-8"
        id="CompanyEditForm">
    @method('PUT')
    @csrf
    <div class="bg-white shadow-sm rounded mb-5 p-4 lg:p-8">
      <table class="w-full text-sm text-left text-gray-500">
        <tbody>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            公開設定
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex">
              <input type="hidden" name="company[display]" value="0">
              <div class="form-control mr-6">
                <label class="label cursor-pointer">
                  <input type="checkbox" name="company[display]" value="1" class="toggle toggle-primary mr-2"
                  id="CompanyDisplay"
                          {{ (int)old('company.display', $data['company']['display']) === 1 ? 'checked' : '' }}>
                  <span class="label-text">一般公開</span>
                </label>
              </div>
              <input type="hidden" name="company[preview]" value="0">
              <div class="form-control mr-4">
                <label class="label cursor-pointer">
                  <input type="checkbox" name="company[preview]" value="1" class="toggle toggle-primary mr-2"
                  id="CompanyPreview"
                          {{ (int)old('company.preview', $data['company']['preview']) === 1 ? 'checked' : '' }}>
                  <span class="label-text">プレビュー</span>
                </label>
              </div>
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
            法人名
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'company[name]',
              'id' => 'CompanyName',
              'value' => old('company.name', $data['company']['name']),
              'placeholder' => '法人名を入れてください',
              'ps' => '例：すむところサービス',
              'hasError' => $errors->has('company.name'),
              'errors' => $errors->get('company.name'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            法人フルネーム
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'company[longname]',
              'id' => 'CompanyLongName',
              'value' => old('company.longname', $data['company']['longname']),
              'placeholder' => 'フルネームを入れてください',
              'ps' => '例：株式会社すむところサービス',
              'hasError' => $errors->has('company.longname'),
              'errors' => $errors->get('company.longname'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            ふりがな
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'company[kana]',
              'id' => 'CompanyKana',
              'value' => old('company.kana', $data['company']['kana']),
              'placeholder' => 'ふりがなを入れてください',
              'ps' => '例：スムトコロサービス',
              'hasError' => $errors->has('company.kana'),
              'errors' => $errors->get('company.kana'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            法人電話番号
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.tel3', [
              'name1' => 'company[tel1]',
              'id1' => 'CompanyTel1',
              'value1' => old('company.tel1', $data['company']['tel1']),
              'placeholder1' => '番号1',
              'name2' => 'company[tel2]',
              'id2' => 'CompanyTel2',
              'value2' => old('company.tel2', $data['company']['tel2']),
              'placeholder2' => '番号2',
              'name3' => 'company[tel3]',
              'id3' => 'CompanyTel3',
              'value3' => old('company.tel3', $data['company']['tel3']),
              'placeholder3' => '番号3',
              'ps' => '例：011-123-4567',
              'hasError1' => $errors->has('company.tel1'),
              'errors1' => $errors->get('company.tel1'),
              'hasError2' => $errors->has('rcompanytel2'),
              'errors2' => $errors->get('company.tel2'),
              'hasError3' => $errors->has('company.tel3'),
              'errors3' => $errors->get('company.tel3'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            法人FAX
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'company[fax]',
              'id' => 'CompanyFax',
              'value' => old('company.fax', $data['company']['fax']),
              'placeholder' => 'FAXを入れてください',
              'ps' => '例：011-123-4567',
              'hasError' => $errors->has('company.fax'),
              'errors' => $errors->get('company.fax'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            法人メールアドレス
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.email', [
              'name' => 'company[email]',
              'id' => 'CompanyEmail',
              'value' => old('company.email', $data['company']['email']),
              'placeholder' => 'メールアドレスを入れてください',
              'ps' => '例：test@sumutokoro.com',
              'hasError' => $errors->has('company.email'),
              'errors' => $errors->get('company.email'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            法人郵便番号
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="w-2/5">
              @include('common::form.zip2', [
                'name1' => 'company[zip1]',
                'id1' => 'CompanyZip1',
                'value1' => old('company.zip1', $data['company']['zip1']),
                'placeholder1' => '番号1',
                'name2' => 'company[zip2]',
                'id2' => 'CompanyZip2',
                'value2' => old('company.zip2', $data['company']['zip2']),
                'placeholder2' => '番号2',
                'ps' => '例:070-1111',
                'hasError1' => $errors->has('company.zip1'),
                'errors1' => $errors->get('company.zip1'),
                'hasError2' => $errors->has('company.zip2'),
                'errors2' => $errors->get('company.zip2'),
                ])
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            法人住所
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex mb-2">
              <select name="company[prefecture_id]" id="CompanyPrefecture"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 rounded-l-md rounded-r-none select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['prefectures'] as $key => $prefecture)
                  <option
                    value="{{$key}}"
                    id="CompanyPrefecture{{$key}}"
                    @if($key === (int)old('company.prefecture_id', $data['company']['prefecture_id'])) selected @endif>{{$prefecture}}</option>
                @endforeach
              </select>
              <select name="company[city_id]" id="CompanyCity"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 rounded-r-md rounded-l-none select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['cities'] as $key => $city)
                  <option
                    value="{{$key}}"
                    id="CompanyCity{{$key}}"
                    @if($key === (int)old('company.city_id', $data['company']['city_id'])) selected @endif>{{$city}}</option>
                @endforeach
              </select>
            </div>
            @include('common::form.text', [
              'name' => 'company[address]',
              'id' => 'CompanyAddress',
              'value' => old('company.address', $data['company']['address']),
              'ps' => '例：中央区北1条北1丁目1-1すむところビル1F',
              'placeholder' => '住所を入れてください',
              'hasError' => $errors->has('company.address'),
              'errors' => $errors->get('company.address'),
              ])
            <input type="hidden" id="CompanyPrefectureLabel"
                   value="{{$data['prefectures'][$data['company']['prefecture_id']]}}">
            <input type="hidden" id="CompanyCityLabel" value="{{$data['cities'][$data['company']['city_id']]}}">
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            地図設定
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.map', [
              'name' => 'company',
              'id' => 'Company',
              'lat' => old('company.lat', $data['company']['lat']),
              'lng' => old('company.lng', $data['company']['lng']),
              'hasLatError' => $errors->has('company.lat'),
              'latErrors' => $errors->get('company.lat'),
              'hasLngError' => $errors->has('company.lng'),
              'lngErrors' => $errors->get('company.lng'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            設立日
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'company[start]',
              'id' => 'CompanyStart',
              'value' => old('company.start', $data['company']['start']),
              'placeholder' => '設立日を入れてください',
              'ps' => '例：2015-01-01（←このフォーマットで半角英数字）',
              'hasError' => $errors->has('company.start'),
              'errors' => $errors->get('company.start'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            代表者
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'company[president]',
              'id' => 'CompanyPresident',
              'value' => old('company.president', $data['company']['president']),
              'placeholder' => '代表者名を入れてください',
              'ps' => '例：代表太郎',
              'hasError' => $errors->has('company.president'),
              'errors' => $errors->get('company.president'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            沿革
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'company[history]',
              'id' => 'CompanyHistory',
              'value' => old('company.history', $data['company']['history']),
              'placeholder' => '沿革を入れてください',
              'ps' => '',
              'rows' => 5,
              'hasError' => $errors->has('company.history'),
              'errors' => $errors->get('company.history'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            従業員数
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'company[staff]',
              'id' => 'CompanyStaff',
              'value' => old('company.president', $data['company']['staff']),
              'placeholder' => 'スタッフ数を入れてください',
              'ps' => '例：3人',
              'hasError' => $errors->has('company.staff'),
              'errors' => $errors->get('company.staff'),
              ])
          </td>
        </tr>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            備考
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'company[msg]',
              'id' => 'CompanyMsg',
              'value' => old('company.msg', $data['company']['msg']),
              'placeholder' => '備考があれば入れてください',
              'ps' => '例：メモなどあればここに入れてください',
              'rows' => 5,
              'hasError' => $errors->has('company.msg'),
              'errors' => $errors->get('company.msg'),
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
          z-40
          ">
      <input type="submit" value="法人を変更する"
             class="btn btn-wider px-12 text-lg rounded-full btn-hover tracking-wider" id="CompanySubmit">
    </div>
    <input type="hidden" id="CompanyId" name="company[id]" value="{{$data['company']['id']}}">
  </form>

@endsection


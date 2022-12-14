@extends('admin::layouts.app')
@section('title', $data['spot']['name'].'｜事業所管理 - ' . config('myapp.site_name'))

@section('content')
  @include('admin::spot.edit.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      事業所情報編集
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        {{$data['spot']['name']}}の編集ができます
      </p>
      <p>
        @if($data['spot']['preview'])
        <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/book/preview/{{$data['spot']['id']}}/@include('common::spot.make_token', ['id' =>$data['spot']['id'], 'name' => $data['spot']['name']])"
           class="text-accent hover:text-accent_light mr-1 hover:underline" target="_blank"><i
                  class="fa-solid fa-book"></i> 冊子確認をする</a>｜@endif
        <a href="{{asset('/')}}spot/{{$data['spot']['id']}}/" class="text-accent hover:text-accent_light mr-1 hover:underline" target="_blank">公開ページを見る</a>
      </p>
    </div>
  </div>

  @include('common::form.errors')

  <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/spot/{{$data['spot']['id']}}"
        onsubmit="return confirm('変更を反映してもよろしいですか？')" method="post" accept-charset="UTF-8"
        id="SpotEditForm">
    @method('PUT')
    @csrf
    <div class="bg-white shadow-sm rounded mb-5 p-4">
      <table class="w-full text-sm text-left text-gray-600">
        <tbody>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            地域包括支援エリア
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="relative">
              <select name="spot[area_center_id]" id="SpotAreaCenter"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['area_centers'] as $key => $area_center)
                  <option
                    value="{{$key}}"
                    id="SpotAreaCenter{{$key}}"
                    @if($key === (int)old('spot.category_id', $data['spot']['area_center_id'])) selected @endif>{{$area_center}}</option>
                @endforeach
              </select>
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            種別
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="relative">
              <select name="spot[category_id]" id="SpotCategory"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['categories'] as $key => $category)
                  <option
                    value="{{$key}}"
                    id="SpotCategory{{$key}}"
                    @if($key === (int)old('spot.category_id', $data['spot']['category_id'])) selected @endif>{{$category}}</option>
                @endforeach
              </select>
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
            事業所名
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'spot[name]',
              'id' => 'SpotName',
              'value' => old('spot.name', $data['spot']['name']),
              'placeholder' => '事業所名を入れてください',
              'ps' => '例：住宅型有料老人ホーム すむところ' . "\n" . '※「住宅型有料老人ホーム」などの事業所タイプと「事業所名」との間は「半角スペースを1つ」あけて下さい。',
              'rows' => 5,
              'hasError' => $errors->has('spot.name'),
              'errors' => $errors->get('spot.name'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            事業所郵便番号
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="w-2/5">
              @include('common::form.zip2', [
                'name1' => 'spot[zip1]',
                'id1' => 'SpotZip1',
                'value1' => old('spot.zip1', $data['spot']['zip1']),
                'placeholder1' => '番号1',
                'name2' => 'spot[zip2]',
                'id2' => 'SpotZip2',
                'value2' => old('spot.zip2', $data['spot']['zip2']),
                'placeholder2' => '番号2',
                'ps' => '例:070-1111',
                'hasError1' => $errors->has('spot.zip1'),
                'errors1' => $errors->get('spot.zip1'),
                'hasError2' => $errors->has('spot.zip2'),
                'errors2' => $errors->get('spot.zip2'),
                ])
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            事業所住所
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex mb-2">
              <select name="spot[prefecture_id]" id="SpotPrefecture"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 rounded-l-md rounded-r-none select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['prefectures'] as $key => $prefecture)
                  <option
                    value="{{$key}}"
                    id="SpotPrefecture{{$key}}" 
                    @if($key === (int)old('spot.prefecture_id', $data['spot']['prefecture_id'])) selected @endif>{{$prefecture}}</option>
                @endforeach
              </select>
              <select name="spot[city_id]" id="SpotCity"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 rounded-r-md rounded-l-none select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['cities'] as $key => $city)
                  <option
                    value="{{$key}}"
                    id="SpotCity{{$key}}" 
                    @if($key === (int)old('spot.city_id', $data['spot']['city_id'])) selected @endif>{{$city}}</option>
                @endforeach
              </select>
            </div>
            @include('common::form.text', [
              'name' => 'spot[address]',
              'id' => 'SpotAddress',
              'value' => old('spot.address', $data['spot']['address']),
              'ps' => '例：中央区北1条北1丁目1-1すむところビル1F',
              'placeholder' => '住所を入れてください',
              'hasError' => $errors->has('spot.address'),
              'errors' => $errors->get('spot.address'),
              ])
            <input type="hidden" id="SpotPrefectureLabel"
                   value="{{$data['prefectures'][$data['spot']['prefecture_id']]}}">
            <input type="hidden" id="SpotCityLabel" value="{{$data['cities'][$data['spot']['city_id']]}}">
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            事業所電話番号
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.tel3', [
              'name1' => 'spot[tel1]',
              'id1' => 'SpotTel1',
              'value1' => old('spot.tel1', $data['spot']['tel1']),
              'placeholder1' => '番号1',
              'name2' => 'spot[tel2]',
              'id2' => 'SpotTel2',
              'value2' => old('spot.tel2', $data['spot']['tel2']),
              'placeholder2' => '番号2',
              'name3' => 'spot[tel3]',
              'id3' => 'SpotTel3',
              'value3' => old('spot.tel3', $data['spot']['tel3']),
              'placeholder3' => '番号3',
              'ps' => '例：011-123-4567',
              'hasError1' => $errors->has('spot.tel1'),
              'errors1' => $errors->get('spot.tel1'),
              'hasError2' => $errors->has('spot.tel2'),
              'errors2' => $errors->get('spot.tel2'),
              'hasError3' => $errors->has('spot.tel3'),
              'errors3' => $errors->get('spot.tel3'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            事業所FAX
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'spot[spot_detail][fax]',
              'id' => 'SpotDetailFax',
              'value' => old('spot.spot_detail.fax', $data['spot']['spot_detail']['fax']),
              'placeholder' => 'FAXを入れてください',
              'ps' => '例：011-123-4567',
              'hasError' => $errors->has('spot.spot_detail.fax'),
              'errors' => $errors->get('spot.spot_detail.fax'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            事業所メールアドレス
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.email', [
              'name' => 'spot[spot_detail][email]',
              'id' => 'SpotDetailEmail',
              'value' => old('spot.spot_detail.email', $data['spot']['spot_detail']['email']),
              'placeholder' => 'メールアドレスを入れてください',
              'ps' => '例：test@sumutokoro.com',
              'hasError' => $errors->has('spot.email'),
              'errors' => $errors->get('spot.email'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            施設担当者のお名前
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'spot[spot_detail][staff]',
              'id' => 'SpotDetailStaff',
              'value' => old('spot.spot_detail.staff', $data['spot']['spot_detail']['staff']),
              'placeholder' => '施設担当者のお名前を入れてください',
              'ps' => '例：担当 太郎' . "\n" . '※ 冊子担当が別にいる場合は、下にある「メモ1」の欄にお書き下さい。',
              'hasError' => $errors->has('spot.spot_detail.staff'),
              'errors' => $errors->get('spot.spot_detail.staff'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            運営法人名
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'spot[spot_detail][company_name]',
              'id' => 'SpotDetailCompanyName',
              'value' => old('spot.spot_detail.company_name', $data['spot']['spot_detail']['company_name']),
              'placeholder' => '事業所名を入れてください',
              'ps' => '※「株式会社・有限会社・社会福祉法人」などの会社タイプと「社名」との間は「半角スペースを1つ」あけて下さい。' . "\n" . '例：介護福祉サーベイジャパン 株式会社',
              'rows' => 5,
              'hasError' => $errors->has('spot.spot_detail.company_name'),
              'errors' => $errors->get('spot.spot_detail.company_name'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            法人担当者のお名前
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => old('spot.spot_detail.company_staff', 'spot[spot_detail][company_staff]'),
              'id' => 'SpotDetailCompanyStaff',
              'value' => old('spot.spot_detail.company_staff', $data['spot']['spot_detail']['company_staff']),
              'placeholder' => '法人担当者のお名前を入れてください',
              'ps' => '例：法人 太郎' . "\n" . '※ 冊子担当が別にいる場合は、下にある「メモ1」の欄にお書き下さい',
              'hasError' => $errors->has('spot.spot_detail.company_staff'),
              'errors' => $errors->get('spot.spot_detail.company_staff'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            対応種別
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('admin::spot.edit.icons', ['spot_icon_genre_serial' => 'status', 'spot_icon_genre_id' => 2, 'icons' => $data['icons']['status']['data'], 'types' => $data['spot_icon_types']])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            月額費用
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex items-center">
              <input id="SpotMonthlyPriceMin"
                     type="number"
                     maxlength="10"
                     name="spot[monthly_price_min]"
                     placeholder="最低月額費用"
                     value="{{(int)old('spot.monthly_price_min', $data['spot']['monthly_price_min'])}}"
                     class="mb-3 appearance-none border border-gray-200 w-full text-ms block bg-gray-100 text-gray-700 rounded p-4 leading-normal focus:outline-primary focus:bg-white">
              <div class="px-3">
                〜
                <input type="hidden" value="0" name="spot[for_check_monthly]">
                <input id="SpotForCheckMonthly" type="checkbox" name="spot[for_check_monthly]" value="1"
                       {{ (int)old('spot.for_check_monthly', $data['spot']['for_check_monthly']) === 1 ? 'checked' : '' }}
                       class="checkbox radio-primary rounded-full checkbox-sm sm:checkbox-md">
              </div>
              <input id="SpotMonthlyPriceMax"
                     type="number"
                     maxlength="10"
                     name="spot[monthly_price_max]"
                     placeholder="最低月額費用"
                     value="{{(int)old('spot.monthly_price_max', $data['spot']['monthly_price_max'])}}"
                     class="mb-3 appearance-none border border-gray-200 w-full text-ms block bg-gray-100 text-gray-700 rounded p-4 leading-normal focus:outline-primary focus:bg-white">
            </div>
            <span class="mb-3 inline-block leading-6 text-gray-300 text-xs">月額の最低金額と最高金額を数字で入れてください</span>

            <div class="rounded p-4 bg-gray-100 mb-4">
              <div class="flex items-center">
                <input type="hidden" name="spot[is_selfpay]" value="0">
                <label class="label cursor-pointer">
                  <input type="checkbox" name="spot[is_selfpay]" value="1" class="toggle toggle-primary mr-2" id="SpotIsSelfPay"
                          {{ (int)old('spot.is_selfpay', $data['spot']['is_selfpay']) === 1 ? 'checked' : '' }}>
                  <span class="label-text">介護保険自己負担を月額費用に含む</span>
                </label>
              </div>
            </div>
            <div class="flex items-center">
              <div class="mr-4">
                検索項目に使用する金額幅の指定
              </div>
              <div>
                <select name="spot[price_range_id]" id="SpotPriceRange"
                        class="-mr-1 select select-bordered border-gray-200 bg-gray-100 select-sm text-xs lg:text-md lg:select-md">
                  @foreach($data['price_ranges'] as $key => $price_range)
                    <option
                      value="{{$key}}"
                      id="SpotPriceRange{{$key}}"
                      @if($key === (int)old('spot.price_range_id', $data['spot']['price_range_id'])) selected @endif>{{$price_range}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            入居時費用
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex items-center">
              <input id="SpotMoveinPriceMin"
                     type="number"
                     maxlength="10"
                     name="spot[movein_price_min]"
                     placeholder="最低月額費用"
                     value="{{old('spot.movein_price_min', $data['spot']['movein_price_min'])}}"
                     class="mb-3 appearance-none border border-gray-200 w-full text-ms block bg-gray-100 text-gray-700 rounded p-4 leading-normal focus:outline-primary focus:bg-white">
              <div class="px-3">
                〜
                <input type="hidden" value="0" name="spot[for_check_movein]">
                <input id="SpotForCheckMovein" type="checkbox" name="spot[for_check_movein]" value="1"
                       {{ (int)old('spot.for_check_movein', $data['spot']['for_check_movein']) === 1 ? 'checked' : '' }}
                       class="checkbox radio-primary rounded-full checkbox-sm sm:checkbox-md">
              </div>
              <input id="SpotMoveinPriceMax"
                     type="number"
                     maxlength="10"
                     name="spot[movein_price_max]"
                     placeholder="最低月額費用"
                     value="{{old('spot.movein_price_max', $data['spot']['movein_price_max'])}}"
                     class="mb-3 appearance-none border border-gray-200 w-full text-ms block bg-gray-100 text-gray-700 rounded p-4 leading-normal focus:outline-primary focus:bg-white">
            </div>
            <span class="inline-block leading-6 text-gray-300 text-xs">入居時費用の最低金額と最高金額を数字で入れてください</span>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            費用詳細
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="grid grid-cols-3 gap-4">
              @include('common::spot.edit.prices', ['prices' => $data['spot']['spot_prices']])
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            部屋のサイズ
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'spot[room_size]',
              'id' => 'SpotRoomSize',
              'value' => old('spot.room_size', $data['spot']['room_size']),
              'placeholder' => '部屋のサイズを入れてください',
              'ps' => '例：8〜12畳（最小サイズと最大サイズをお書きください）',
              'hasError' => $errors->has('spot.room_size'),
              'errors' => $errors->get('spot.room_size'),
              ])

          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            部屋数
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'spot[spot_detail][rooms]',
              'id' => 'SpotDetailRooms',
              'value' => old('spot.spot_detail.rooms', $data['spot']['spot_detail']['rooms']),
              'placeholder' => '部屋数を入れてください',
              'ps' => '例：20室',
              'hasError' => $errors->has('spot.spot_detail.rooms'),
              'errors' => $errors->get('spot.spot_detail.rooms'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            個室内状況
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('admin::spot.edit.icons', ['spot_icon_genre_serial' => 'privatespace', 'spot_icon_genre_id' => 5, 'icons' => $data['icons']['privatespace']['data'], 'types' => $data['spot_icon_types']])
            <br>
            @include('common::form.textarea', [
              'name' => 'spot[spot_icon_genre_comment]['.$data['icons_genre_comments']->getId('privatespace').']',
              'id' => 'SpotIconGenreCommentPrivatespace',
              'value' => old('spot.spot_icon_genre_comment', $data['icons_genre_comments']->getComment('privatespace')),
              'placeholder' => 'コメントを入れてください',
              'ps' => '',
              'rows' => 3,
              'hasError' => $errors->has('spot.spot_icon_genre_comment.' . $data['icons_genre_comments']->getId('privatespace')),
              'errors' => $errors->get('spot.spot_icon_genre_comment.' . $data['icons_genre_comments']->getId('privatespace')),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            看護師人数
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'spot[spot_detail][nurses]',
              'id' => 'SpotDetailNurses',
              'value' => old('spot.spot_detail.nurses', $data['spot']['spot_detail']['nurses']),
              'placeholder' => '看護師人数を入れてください',
              'ps' => '例：2人',
              'hasError' => $errors->has('spot.spot_detail.nurses'),
              'errors' => $errors->get('spot.spot_detail.nurses'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            看護師在勤時間
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'spot[spot_detail][nurse_time]',
              'id' => 'SpotDetailNurseTime',
              'value' => old('spot.spot_detail.nurse_time',$data['spot']['spot_detail']['nurse_time']),
              'placeholder' => '看護師在勤時間を入れてください',
              'ps' => '例：月〜金／9:00～18:00 オンコール対応' . "\n" . '※在勤している曜日と時間をご記入下さい。',
              'hasError' => $errors->has('spot.spot_detail.nurse_time'),
              'errors' => $errors->get('spot.spot_detail.nurse_time'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            看護体制
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('admin::spot.edit.icons', ['spot_icon_genre_serial' => 'nurse', 'spot_icon_genre_id' => 3, 'icons' => $data['icons']['nursing']['data'], 'types' => $data['spot_icon_types']])
            <br>
            <br>
            @include('common::form.textarea', [
              'name' => 'spot[spot_icon_genre_comment]['.$data['icons_genre_comments']->getId('nursing').']',
              'id' => 'SpotIconGenreCommentNursing',
              'value' => old('spot.spot_icon_genre_comment', $data['icons_genre_comments']->getComment('nursing')),
              'placeholder' => 'コメントを入れてください',
              'ps' => '',
              'rows' => 3,
              'hasError' => $errors->has('spot.spot_icon_genre_comment.' . $data['icons_genre_comments']->getId('nursing')),
              'errors' => $errors->get('spot.spot_icon_genre_comment.' . $data['icons_genre_comments']->getId('nursing')),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            介護体制
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('admin::spot.edit.icons', ['spot_icon_genre_serial' => 'care', 'spot_icon_genre_id' => 4, 'icons' => $data['icons']['care']['data'], 'types' => $data['spot_icon_types']])
            <br>
            @include('common::form.textarea', [
              'name' => 'spot[spot_icon_genre_comment]['.$data['icons_genre_comments']->getId('care').']',
              'id' => 'SpotIconGenreCommentCare',
              'value' => old('spot.spot_icon_genre_comment', $data['icons_genre_comments']->getComment('care')),
              'placeholder' => 'コメントを入れてください',
              'ps' => '',
              'rows' => 3,
              'hasError' => $errors->has('spot.spot_icon_genre_comment.' . $data['icons_genre_comments']->getId('care')),
              'errors' => $errors->get('spot.spot_icon_genre_comment.' . $data['icons_genre_comments']->getId('care')),
              ])

          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            その他項目
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('admin::spot.edit.icons', ['spot_icon_genre_serial' => 'other', 'spot_icon_genre_id' => 10, 'icons' => $data['icons']['other']['data'], 'types' => $data['spot_icon_types']])
            <br>
            @include('common::form.textarea', [
              'name' => 'spot[spot_icon_genre_comment]['.$data['icons_genre_comments']->getId('other').']',
              'id' => 'SpotIconGenreCommentOther',
              'value' => old('spot.spot_icon_genre_comment', $data['icons_genre_comments']->getComment('other')),
              'placeholder' => 'コメントを入れてください',
              'ps' => '',
              'rows' => 3,
              'hasError' => $errors->has('spot.spot_icon_genre_comment.' . $data['icons_genre_comments']->getId('other')),
              'errors' => $errors->get('spot.spot_icon_genre_comment.' . $data['icons_genre_comments']->getId('other')),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            スタッフ人数
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'spot[spot_detail][staffs]',
              'id' => 'SpotDetailStaffs',
              'value' => old('spot.spot_detail.staffs', $data['spot']['spot_detail']['staffs']),
              'placeholder' => 'スタッフ人数を入れてください',
              'ps' => '例：3人',
              'hasError' => $errors->has('spot.spot_detail.staffs'),
              'errors' => $errors->get('spot.spot_detail.staffs'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            事業所の特徴
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'spot[heading]',
              'id' => 'SpotHeading',
              'value' => old('spot.heading', $data['spot']['heading']),
              'placeholder' => '事業所の特徴を入れてください',
              'ps' => '例：小規模で家庭的な雰囲気です／15文字まで',
              'rows' => 5,
              'hasError' => $errors->has('spot.heading'),
              'errors' => $errors->get('spot.heading'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            事業所に関する説明
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'spot[message]',
              'id' => 'SpotMessage',
              'value' => old('spot.message', $data['spot']['message']),
              'placeholder' => '事業所名を入れてください',
              'ps' => '例：充実した事業所とイベント、おいしい食事で、充実した生活をお過ごし頂けます／75文字まで',
              'rows' => 5,
              'hasError' => $errors->has('spot.message'),
              'errors' => $errors->get('spot.message'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            写真
          </th>
          <td class="py-4 px-4 w-4/5">
            <spot-main-photo data='@json($data['spotMainImage'])'></spot-main-photo>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            紹介者
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'spot[spot_detail][introducer]',
              'id' => 'SpotDetailIntroducer',
              'value' => $data['spot']['spot_detail']['introducer'],
              'placeholder' => '事業所名を入れてください',
              'ps' => 'この「すむところ登録ページ」をどなたからお聞きになりましたか？' . "\n" . '↑上記の欄に紹介された方のお名前をご記入ください。' . "\n" . '例：株式会社介護の山田さん',
              'rows' => 5,
              'hasError' => $errors->has('spot.spot_detail.introducer'),
              'errors' => $errors->get('spot.spot_detail.introducer'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            その他
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'spot[spot_detail][feature]',
              'id' => 'SpotDetailFeature',
              'value' => old('spot.spot_detail.feature', $data['spot']['spot_detail']['feature']),
              'placeholder' => 'その他コメントを入れてください',
              'ps' => '例：充実した事業所とイベント、おいしい食事で、充実した生活をお過ごし頂けます／75文字まで',
              'rows' => 5,
              'hasError' => $errors->has('spot.spot_detail.feature'),
              'errors' => $errors->get('spot.spot_detail.feature'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            メモ1<br>
            他の担当や第2連絡先、冊子担当者、その他
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'spot[spot_detail][comment]',
              'id' => 'SpotDetailComment',
              'value' => old('spot.spot_detail.comment', $data['spot']['spot_detail']['comment']),
              'placeholder' => 'メモ1を入れてください',
              'ps' => '※ 通常の項目にない情報や、変更情報、その他なんでも記載できます。' . "\n" . '※ 冊子担当者名や、複数メールアドレスがある場合もこちらに記載して下さい。' . "\n" . '例：冊子専用担当者 田中さんメールtest@test.co.jp 0166-12-3456 平日9:00〜12:00以外は留守',
              'rows' => 5,
              'hasError' => $errors->has('spot.spot_detail.comment'),
              'errors' => $errors->get('spot.spot_detail.comment'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            メモ2<br>
            冊子に関してのTEL・メールでの確認の履歴等
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.textarea', [
              'name' => 'spot[spot_detail][comment2]',
              'id' => 'SpotDetailComment2',
              'value' => old('spot.spot_detail.comment2', $data['spot']['spot_detail']['comment2']),
              'placeholder' => 'メモ2を入れてください',
              'ps' => '※ 連絡したときの日付や担当者・概要を入れて下さい。' . "\n" . '例：2019.02.07 18:00 FAX校正を変更済み',
              'rows' => 5,
              'hasError' => $errors->has('spot.spot_detail.comment2'),
              'errors' => $errors->get('spot.spot_detail.comment2'),
              ])
          </td>
        </tr>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            やりとり
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex items-center">
              <input type="hidden" name="spot[is_meeting]" value="0">
              <label class="label cursor-pointer">
                <input type="checkbox" name="spot[is_meeting]" value="1" id="SpotIsMeeting" class="toggle toggle-primary mr-2"
                        {{ (int)old('spot.is_meeting', $data['spot']['is_meeting']) === 1 ? 'checked' : '' }} />
                <span class="ml-1 text-sm text-gray-600">やりとり中</span>
              </label>

            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>


    <div class="bg-white shadow-sm rounded mb-5 p-4">
      <table class="w-full text-sm text-left text-gray-600">
        <tbody>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            法人との関連付け
          </th>
          <td class="py-4 px-4 w-4/5">
            <spot-associate-company path='{{asset('/')}}' data='@json($data['associatedCompany'])'></spot-associate-company>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <div class="bg-white shadow-sm rounded mb-5 p-4">
      <table class="w-full text-sm text-left text-gray-600">
        <tbody>
        <tr class="border-b">
          <th class="py-4 px-4 w-1/5">
            冊子掲載
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex justify-start">
              <input type="hidden" name="spot[is_book]" value="0">
              <label class="label cursor-pointer">
                <input type="checkbox" name="spot[is_book]" value="1" id="SpotIsBook" class="toggle toggle-primary mr-2"
                        {{ (int)old('spot.is_book', $data['spot']['is_book']) === 1 ? 'checked' : '' }} />
                <span class="ml-1 text-sm text-gray-600">冊子に掲載する</span>
              </label>
            </div>
          </td>
        </tr>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            冊子との関連付け
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.checkboxes', [
              'name' => 'spot[books]',
              'id' => 'SpotBook',
              'list' => $data['books'],
              'values' => old('spot.book_spot', $data['spot']['book_spot']),
              'ps' => '※',
              ])
          </td>
        </tr>
        </tbody>
      </table>
    </div>

    <div class="bg-white shadow-sm rounded mb-5 p-4 lg:p-8">
      <table class="w-full text-sm text-left text-gray-600">
        <tbody>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            公開設定
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex space-x-10">
              <div>
                <input type="hidden" name="spot[display]" value="0">
                <label class="label cursor-pointer">
                  <input type="checkbox" name="spot[display]" value="1" class="toggle toggle-primary mr-2" id="SpotDisplay"
                          {{ (int)old('spot.display', $data['spot']['display']) === 1 ? 'checked' : '' }} />
                  <span class="ml-1 text-sm text-gray-600">一般公開</span>
                </label>
              </div>
              <div>
                <input type="hidden" name="spot[preview]" value="0">
                <label class="label cursor-pointer">
                  <input type="checkbox" name="spot[preview]" value="1" class="toggle toggle-primary mr-2" id="SpotPreview"
                          {{ (int)old('spot.preview', $data['spot']['preview']) === 1 ? 'checked' : '' }} />
                  <span class="ml-1 text-sm text-gray-600">プレビュー</span>
                </label>
              </div>
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            部屋の空き状況
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex space-x-6">
              <div class="flex items-center">
                <input id="SpotVacancy1" value="1" type="radio" name="spot[vacancy]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.vacancy', $data['spot']['vacancy']) === 1 ? 'checked' : '' }}>
                <label for="SpotVacancy1"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">指定なし</label>
              </div>

              <div class="flex items-center">
                <input id="SpotVacancy2" value="2" type="radio" name="spot[vacancy]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.vacancy', $data['spot']['vacancy']) === 2 ? 'checked' : '' }}>
                <label for="SpotVacancy2"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">空きあり</label>
              </div>

              <div class="flex items-center">
                <input id="SpotVacancy3" value="3" type="radio" name="spot[vacancy]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.vacancy', $data['spot']['vacancy']) === 3 ? 'checked' : '' }}>
                <label for="SpotVacancy3"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">空きなし</label>
              </div>

              <div class="flex items-center">
                <input id="SpotVacancy4" value="4" type="radio" name="spot[vacancy]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.vacancy', $data['spot']['vacancy']) === 4 ? 'checked' : '' }}>
                <label for="SpotVacancy4"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">要問合せ</label>
              </div>
            </div>
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            資料請求
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex space-x-6">
              <div class="flex items-center">
                <input id="SpotDocument1" value="1" type="radio" name="spot[document]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.document', $data['spot']['document']) === 1 ? 'checked' : '' }}>
                <label for="SpotDocument1"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">指定なし</label>
              </div>

              <div class="flex items-center">
                <input id="SpotDocument2" value="2" type="radio" name="spot[document]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.document', $data['spot']['document']) === 2 ? 'checked' : '' }}>
                <label for="SpotDocument2"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">資料あり</label>
              </div>

              <div class="flex items-center">
                <input id="SpotDocument3" value="3" type="radio" name="spot[document]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.document', $data['spot']['document']) === 3 ? 'checked' : '' }}>
                <label for="SpotDocument3"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">資料なし</label>
              </div>

              <div class="flex items-center">
                <input id="SpotDocument4" value="4" type="radio" name="spot[document]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.document', $data['spot']['document']) === 4 ? 'checked' : '' }}>
                <label for="SpotDocument4"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">要問合せ</label>
              </div>
            </div>
          </td>
        </tr>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            見学予約
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex space-x-6">
              <div class="flex items-center">
                <input id="SpotViewing1" value="1" type="radio" name="spot[viewing]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.viewing', $data['spot']['viewing']) === 1 ? 'checked' : '' }}>
                <label for="SpotViewing1"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">指定なし</label>
              </div>

              <div class="flex items-center">
                <input id="SpotViewing2" value="2" type="radio" name="spot[viewing]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.viewing', $data['spot']['viewing']) === 2 ? 'checked' : '' }}>
                <label for="SpotViewing2"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">見学予約可能</label>
              </div>

              <div class="flex items-center">
                <input id="SpotViewing3" value="3" type="radio" name="spot[viewing]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.viewing', $data['spot']['viewing']) === 3 ? 'checked' : '' }}>
                <label for="SpotViewing3"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">見学対応不可</label>
              </div>

              <div class="flex items-center">
                <input id="SpotViewing4" value="4" type="radio" name="spot[viewing]"
                       class="radio radio-primary radio-sm"
                        {{ (int)old('spot.viewing', $data['spot']['viewing']) === 4 ? 'checked' : '' }}>
                <label for="SpotViewing4"
                       class="ml-2 text-sm text-gray-600 cursor-pointer">要問合せ</label>
              </div>
            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>

    <div class="bg-white shadow-sm rounded mb-5 p-4 lg:p-8">
      <table class="w-full text-sm text-left text-gray-600">
        <tbody>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            商圏設定
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="relative">
              <select name="spot[trade_area_id]" id="SpotTradeArea"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['trade_areas'] as $key => $trade_area)
                  <option
                    value="{{$key}}"
                    id="SpotTradeArea{{$key}}"
                    @if($key === (int)old('spot.trade_area_id', $data['spot']['trade_area_id'])) selected @endif>{{$trade_area}}</option>
                @endforeach
              </select>
            </div>
          </td>
        </tr>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            プラン設定
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="relative">
              <select name="spot[spot_plan_id]" id="SpotSpotPlan"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['spot_plans'] as $key => $spot_plan)
                  <option
                    value="{{$key}}"
                    id="SpotSpotPlan{{$key}}"
                    @if($key === (int)old('spot.spot_plan_id', $data['spot']['spot_plan_id'])) selected @endif>{{$spot_plan}}</option>
                @endforeach
              </select>
            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>

    <div class="bg-white shadow-sm rounded mb-5 p-4 lg:p-8">
      <table class="w-full text-sm text-left text-gray-600">
        <tbody>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            地図設定
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.map', [
              'name' => 'spot',
              'id' => 'Spot',
              'lat' => old('spot.lat', $data['spot']['lat']),
              'lng' => old('spot.lng', $data['spot']['lng']),
              'hasLatError' => $errors->has('spot.lat'),
              'latErrors' => $errors->get('spot.lat'),
              'hasLngError' => $errors->has('spot.lng'),
              'lngErrors' => $errors->get('spot.lng'),
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
      <input type="submit" value="事業所内容を変更する"
        id="SpotSubmit"
        class="btn btn-wider px-12 text-lg rounded-full btn-hover tracking-wider">
    </div>
    <input type="hidden" id="SpotId" name="spot[id]" value="{{$data['spot']['id']}}">
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
            {{date('Y/m/d H:i:s',  strtotime($data['spot']['updated_at']))}}<br>
            {{$data['spot']['user']['name']}}さん
          </p>
        </td>
      </tr>
      </tbody>
    </table>
  </div>

  <div class="bg-white shadow-sm rounded mb-10 p-4">
    <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/spot/{{$data['spot']['id']}}"
          onsubmit="return confirm('本当に{{$data['spot']['name']}}を削除してもよろしいですか？（※元には戻せません）')" method="post"
          accept-charset="UTF-8" id="SpotDeleteForm">
      @method('DELETE')
      @csrf
      <table class="w-full text-sm text-left text-gray-600">
        <tbody>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            事業所の削除
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.delete', [
              'name' => '事業所',
              'model' => 'spot',
              'id' => 'SpotDelete',
              'dataId' => $data['spot']['id'],
              'value' => old('spot_delete.code'),
              'ps' => '※半角英数字で入力してください',
              'hasError' => $errors->has('spot_delete.code'),
              'errors' => $errors->get('spot_delete.code'),
              'hasConfirmationError' => $errors->has('spot_delete.confirmation'),
              'confirmationErrors' => $errors->get('spot_delete.confirmation'),
              ])
          </td>
        </tr>
        </tbody>
      </table>
    </form>
  </div>
@endsection


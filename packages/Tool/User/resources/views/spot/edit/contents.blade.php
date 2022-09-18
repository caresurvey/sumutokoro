@extends('user::layouts.app')
@section('title', $data['spot']['name'].'｜事業所管理 - ' . config('myapp.site_name'))

@section('content')
  @include('user::spot.edit.breadcrumb')
  <h1 class="text-center text-xl md:text-3xl font-bold pb-4 tracking-wide">事業所編集</h1>
  <div class="text-center text-xs md:text-lg self-center text-gray-500 tracking-widest mb-20">
    {{$data['spot']['name']}}の編集ができます
  </div>

  @include('common::form.errors')

  <form action="{{asset('/')}}user/spot/{{$data['spot']['id']}}"
        onsubmit="return confirm('変更を反映してもよろしいですか？')" method="post" accept-charset="UTF-8"
        id="SpotEditForm">
    @method('PUT')
    @csrf
    <div class="bg-white shadow-sm rounded mb-5 p-4">
      <table class="w-full text-sm text-left text-gray-600">
        <tbody>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            担当包括エリア
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'spot[spot_detail][proarea]',
              'id' => 'SpotName',
              'value' => old('spot.spot_detail.proarea', $data['spot']['spot_detail']['proarea']),
              'placeholder' => '担当包括エリアを入れてください',
              'ps' => '例：中央区第１、白石第１、豊岡、新旭川・永山、美瑛町、深川市、名寄市など',
              'hasError' => $errors->has('spot.spot_detail.proarea'),
              'errors' => $errors->get('spot.spot_detail.proarea'),
              ])
            <span class="inline-block leading-6 text-gray-300 text-sm">
              ※「地域包括支援センター」という文字は入れないでください。<br>
            </span>
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
                  <option value="{{$key}}"
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
              'ps' => '例：住宅型有料老人ホーム すむところ<br>※「住宅型有料老人ホーム」などの事業所タイプと「事業所名」との間は「半角スペースを1つ」あけて下さい。',
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
                  <option value="{{$key}}"
                          @if($key === (int)old('spot.prefecture_id', $data['spot']['prefecture_id'])) selected @endif>{{$prefecture}}</option>
                @endforeach
              </select>
              <select name="spot[city_id]" id="SpotCity"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 rounded-r-md rounded-l-none select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['cities'] as $key => $city)
                  <option value="{{$key}}"
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
              'ps' => '例：担当 太郎<br>※ 冊子担当が別にいる場合は、下にある「メモ1」の欄にお書き下さい。',
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
              'ps' => '※「株式会社・有限会社・社会福祉法人」などの会社タイプと「社名」との間は「半角スペースを1つ」あけて下さい。<br>例：介護福祉サーベイジャパン 株式会社',
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
              'ps' => '例：法人 太郎<br>※ 冊子担当が別にいる場合は、下にある「メモ1」の欄にお書き下さい',
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
            @include('user::spot.edit.icons', ['spot_icon_genre_serial' => 'status', 'spot_icon_genre_id' => 2, 'icons' => $data['icons']['status']['data'], 'types' => $data['spot_icon_types']])
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
                  <input type="checkbox" name="spot[is_selfpay]" value="1" class="toggle toggle-primary mr-2"
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
                <select name="spot[price_range_id]" id="SpotSpace"
                        class="-mr-1 select select-bordered border-gray-200 bg-gray-100 select-sm text-xs lg:text-md lg:select-md">
                  @foreach($data['price_ranges'] as $key => $price_range)
                    <option value="{{$key}}"
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
              @include('user::spot.edit.prices', ['prices' => $data['spot']['spot_prices']])
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

            <div class="flex items-center pt-3">
              <div class="mr-4">
                選択してください
              </div>
              <select name="spot[space_id]" id="SpotSpace"
                      class="-mr-1 select select-bordered border-gray-200 bg-gray-100 select-sm text-xs lg:text-md lg:select-md">
                @foreach($data['spaces'] as $key => $space)
                  <option value="{{$key}}"
                          @if($key === (int)old('spot.space_id', $data['spot']['space_id'])) selected @endif>{{$space}}</option>
                @endforeach
              </select>
            </div>
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
              'ps' => '例：月〜金／9:00～18:00 オンコール対応<br>※在勤している曜日と時間をご記入下さい。',
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
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            介護体制
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('admin::spot.edit.icons', ['spot_icon_genre_serial' => 'care', 'spot_icon_genre_id' => 4, 'icons' => $data['icons']['care']['data'], 'types' => $data['spot_icon_types']])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            その他項目
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('admin::spot.edit.icons', ['spot_icon_genre_serial' => 'other', 'spot_icon_genre_id' => 10, 'icons' => $data['icons']['other']['data'], 'types' => $data['spot_icon_types']])
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
              'value' => old('spot.spot_detail.introducer', $data['spot']['spot_detail']['introducer']),
              'placeholder' => '事業所名を入れてください',
              'ps' => 'この「すむところ登録ページ」をどなたからお聞きになりましたか？<br>↑上記の欄に紹介された方のお名前をご記入ください。<br>例：株式会社介護の山田さん',
              'rows' => 5,
              'hasError' => $errors->has('spot.spot_detail.introducer'),
              'errors' => $errors->get('spot.spot_detail.introducer'),
              ])
          </td>
        </tr>
        <tr class="bg-white">
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
                  <input type="checkbox" name="spot[display]" value="1" class="toggle toggle-primary mr-2"
                          {{ (int)old('spot.display', $data['spot']['display']) === 1 ? 'checked' : '' }}>
                  <span class="ml-1 text-sm text-gray-600">一般公開</span>
                </label>
              </div>
              <div>
                <input type="hidden" name="spot[preview]" value="0">
                <label class="label cursor-pointer">
                  <input type="checkbox" name="spot[preview]" value="1" class="toggle toggle-primary mr-2"
                          {{ (int)old('spot.preview', $data['spot']['preview']) === 1 ? 'checked' : '' }}>
                  <span class="ml-1 text-sm text-gray-600">プレビュー</span>
                </label>
              </div>
              <div>
                <input type="hidden" name="spot[is_book]" value="0">
                <label class="label cursor-pointer">
                  <input type="checkbox" name="spot[is_book]" value="1" class="toggle toggle-primary mr-2"
                          {{ (int)old('spot.is_book', $data['spot']['is_book']) === 1 ? 'checked' : '' }} />
                  <span class="ml-1 text-sm text-gray-600">冊子に掲載する</span>
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
      <table class="w-full text-sm text-left text-gray-500">
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
             class="btn btn-wider px-12 text-lg rounded-full btn-hover tracking-wider">
    </div>
    <input type="hidden" id="SpotId" name="spot[id]" value="{{$data['spot']['id']}}">
  </form>

@endsection


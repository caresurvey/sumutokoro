@extends('admin::layouts.app')
@section('title', 'FAX送付状作成｜' . config('myapp.site_name'))

@section('content')
  @include('admin::fax.index.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      FAX送付状作成
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        事業所探しのFAX用紙が作成できます
      </p>
    </div>
  </div>


  <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/fax/"
        onsubmit="return confirm('印刷画面を反映してもよろしいですか？')" method="post" accept-charset="UTF-8"
        id="CompanyEditForm">
    @csrf
    <div class="bg-white shadow-sm rounded mb-5 p-4">
      <table class="w-full text-sm text-left text-gray-500">
        <tbody>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            日付
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'fax[date]',
              'id' => 'FaxDate',
              'value' => date("Y/m/d"),
              'placeholder' => '送信する日時を入れてください',
              'ps' => '例：2022/1/1',
              'hasError' => $errors->has('fax.date'),
              'errors' => $errors->get('fax.date'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            宛先会社名
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'fax[company]',
              'id' => 'FaxCompany',
              'value' => '',
              'placeholder' => '送り先の会社名を入れてください',
              'ps' => '例：すむところ株式会社',
              'hasError' => $errors->has('fax.company'),
              'errors' => $errors->get('fax.company'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            ご担当者様
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'fax[staff]',
              'id' => 'FaxStaff',
              'value' => '',
              'placeholder' => '先方の担当者の名前を入れてください',
              'ps' => '例：担当太郎様',
              'hasError' => $errors->has('fax.staff'),
              'errors' => $errors->get('fax.staff'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            電話番号
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'fax[tel_number]',
              'id' => 'FaxTelNumber',
              'value' => '0166-00-0000',
              'placeholder' => '先方の電話番号を入れてください',
              'ps' => '例：011-123-4567',
              'hasError' => $errors->has('fax.tel_number'),
              'errors' => $errors->get('fax.tel_number'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            FAX番号
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'fax[fax_number]',
              'id' => 'FaxFaxNumber',
              'value' => '0166-00-0000',
              'placeholder' => '先方のFAX番号を入れてください',
              'ps' => '例：011-123-4567',
              'hasError' => $errors->has('fax.fax_number'),
              'errors' => $errors->get('fax.fax_number'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            送付枚数
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'fax[num]',
              'id' => 'FaxNum',
              'value' => '1枚（本紙を含む）',
              'placeholder' => '送付枚数を入れてください',
              'ps' => '例：2022/1/1',
              'hasError' => $errors->has('fax.kana'),
              'errors' => $errors->get('fax.kana'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            送信者
          </th>
          <td class="py-4 px-4 w-4/5">
            @include('common::form.text', [
              'name' => 'fax[sender]',
              'id' => 'FaxSender',
              'value' => '',
              'placeholder' => '担当した人の名前を入れてください',
              'ps' => '例：すむところ.com 介護太郎',
              'hasError' => $errors->has('fax.sender'),
              'errors' => $errors->get('fax.sender'),
              ])
          </td>
        </tr>
        <tr class="bg-white border-b">
          <th class="py-4 px-4 w-1/5">
            FAX中段あたりの本文
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex items-center">
            <textarea id="FaxBody"
                      cols="30" rows="10"
                      name="fax[body]"
                      class="mb-3 appearance-none border border-gray-200 w-full text-ms block bg-gray-100 text-gray-700 rounded p-4 leading-normal focus:outline-primary focus:bg-white">すむところ.com（介護福祉サーベイジャパン株式会社）です、いつもご利用ありがとうございます。ご指定の条件に近くて空きのある施設をピックアップ致しましたのでご覧ください。気になる施設がございましたら、こちらまでご連絡頂くか、施設に直接ご連絡ください。

いずれの施設も、「すむところ.com（介護福祉サーベイジャパン）◯◯からの紹介で・・」とお伝え頂くと分かるようになっておりますので、よろしくお願い致します。
</textarea>
            </div>
          </td>
        </tr>
        <tr class="bg-white">
          <th class="py-4 px-4 w-1/5">
            紹介事業所
          </th>
          <td class="py-4 px-4 w-4/5">
            <div class="flex items-center">
            <textarea id="FaxSpot"
                      cols="30" rows="17"
                      name="fax[spot]"
                      class="mb-3 appearance-none border border-gray-200 w-full text-ms block bg-gray-100 text-gray-700 rounded p-4 leading-normal focus:outline-primary focus:bg-white">● 介護付有料老人ホーム サンプル [担当：テスト 様]
旭川市永山1条1丁目1-1／TEL:0166-12-3456
詳細は要面談＆要確認。予算は大体月9万ほど。先に見学予約をして下さい。

● 介護付有料老人ホーム サンプル [担当：テスト 様]
旭川市永山1条1丁目1-1／TEL:0166-12-3456
詳細は要面談＆要確認。予算は大体月9万ほど。先に見学予約をして下さい。

● 介護付有料老人ホーム サンプル [担当：テスト 様]
旭川市永山1条1丁目1-1／TEL:0166-12-3456
詳細は要面談＆要確認。予算は大体月9万ほど。先に見学予約をして下さい。

● 介護付有料老人ホーム サンプル [担当：テスト 様]
旭川市永山1条1丁目1-1／TEL:0166-12-3456
詳細は要面談＆要確認。予算は大体月9万ほど。先に見学予約をして下さい。
</textarea>
            </div>
            <span class="inline-block leading-6 text-gray-400 text-xs">※ 全体の入力は20段まで。<br>
※ 各事業所紹介の入力は5段までです。<br>
※ あまり多すぎると2ページ目にはみ出してしまいますので、印刷時に確認して下さい。</span>
          </td>
        </tr>
        </tbody>
      </table>

      <div class="w-full py-4 border-white bg-black bg-opacity-70
          fixed left-0 bottom-0
          flex justify-center items-center
          text-white
          z-40
          ">
        <input type="submit" value="FAX印刷画面を表示する"
               class="btn btn-wider px-12 text-lg rounded-full btn-hover" id="FaxSubmit">
      </div>
    </div>
  </form>


@endsection


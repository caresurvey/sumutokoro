@extends('admin::layouts.fax')
@section('title', 'FAX用紙印刷｜' . config('myapp.site_name'))

@section('content')
  <article class="main-container">
    <h1 class="title">FAX送付状</h1>
  </article>

  <article class="main-container">
    <div class="outline">
      <table class="table table-outline">
        <tr>
          <th>日　付</th>
          <td>{{$data['fax']['date']}}</td>
        </tr>
        <tr>
          <th>会社名</th>
          <td>{{$data['fax']['company']}}</td>
        </tr>
        <tr>
          <th>ご担当者様</th>
          <td>{{$data['fax']['staff']}}</td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>{{$data['fax']['tel_number']}}</td>
        </tr>
        <tr>
          <th>FAX番号</th>
          <td>{{$data['fax']['fax_number']}}</td>
        </tr>
        <tr>
          <th>送付枚数</th>
          <td>{{$data['fax']['num']}}</td>
        </tr>
        <tr>
          <th>送信者</th>
          <td>{{$data['fax']['sender']}}</td>
        </tr>
      </table>
    </div>
    <div class="company">
      <img src="{{asset('/')}}img/admin/pages/fax/logo.png" class="company-logo">
      <p>
        [本社]<br>
        札幌市中央区大通西4丁目1 道銀ビル7F<br>
        TEL:011-261-0025／FAX:011-261-4422<br>
      </p>
      <p>
        [旭川事務所]<br>
        旭川市春光5条8丁目7-9<br>
        TEL:0166-73-7973／FAX:0166-73-9798<br>
      </p>
      <p>
        [ホームページ]<br>
        https://caresurvey.co.jp
      </p>
    </div>

    <hr class="space">

    <div class="ps">
      {!! nl2br(e($data['fax']['body'])) !!}
    </div>
    <ul class="spotlist">
      <li class="spotlists">
        {!! nl2br(e($data['fax']['spot'])) !!}
      </li>
    </ul>

    <div class="ps">
    </div>
    <div class="sirial">
      識別No.220819-bbf8
    </div>
  </article>



@endsection


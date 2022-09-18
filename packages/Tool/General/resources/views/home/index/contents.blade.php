@extends('general::layouts.app')
@section('title', 'すむところ.com｜北海道で老人ホーム・介護施設を探すなら[札幌・小樽・旭川／道北・道央・道東]')
@section('description', '老人ホーム・介護施設を探すならすむところ.com！入居先を探している人はもちろん、MSW・ケアマネジャー・相談支援員の方にご好評頂いております。')

@section('content')
  @include('general::home.index.mainvisual', ['data' => $data])
  @include('general::home.index.banners', ['data' => $data])
  @include('general::home.index.banners2', ['data' => $data])
  @include('general::home.index.area', ['data' => $data])
  @include('general::home.index.categories', ['data' => $data])
  @include('general::home.index.news', ['data' => $data])

  <div class="flex justify-center py-8">
    <a href="https://caresurvey.co.jp" target="_blank">
    <img src="{{asset('/')}}img/general/pages/home/bnr_caresurvey.png" class="rounded-xl max-w-xl" alt=""></a>
  </div>

@endsection


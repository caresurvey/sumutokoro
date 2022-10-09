@extends('general::layouts.app')
@section('title', '事業所一覧 - ' . config('myapp.site_name'))
@section('description', '条件を指定して各事業所を検索することができます。')

@section('content')
  @include('general::spot.index.breadcrumb')

  <div class="container mx-auto px-3 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      事業所一覧
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        {{$data['totalCount']}}件が見つかりました（{{$data['current']}}/{{$data['fullPage']}}ページ）
      </p>
    </div>
  </div>

  <section class="container mx-auto max-w-6xl px-6 sm:px-8 md:px-12">
    <div class="mb-5 text-sm font-medium text-center text-gray-500 border-b border-gray-200">
      <ul class="flex flex-wrap -mb-px">
        <li class="mr-2">
          <a href="#" id="ListTypeGeneralBtn"
             class="list-type-buttons inline-block p-4 border-b-2 border-primary text-primary">通常表示</a>
        </li>
        <li class="mr-2">
          <a href="#" id="ListTypeSimpleBtn" class="list-type-buttons inline-block p-4">シンプル表示</a>
        </li>
        <li class="mr-2">
          <a href="#" id="ListTypeTextBtn" class="list-type-buttons inline-block p-4">テキスト表示</a>
        </li>
      </ul>
    </div>
  </section>

  @if(!empty($data['spots'][0]))
    <section class="container mx-auto max-w-6xl px-4 sm:px-8 md:px-12">
      <div id="ListTypeGeneral" class="list-type-tab">
        @include('general::spot.index.type_general', ['data' => $data])
      </div>
      <div id="ListTypeSimple" class="list-type-tab hidden">
        @include('general::spot.index.type_simple', ['data' => $data])
      </div>
      <div id="ListTypeText" class="list-type-tab hidden">
        @include('general::spot.index.type_text', ['data' => $data])
      </div>
    </section>
  @else
    <section class="container mx-auto max-w-6xl px-6 sm:px-8 md:px-12">
      <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
        <p class="mb-5 text-center leading-7">
          事業所が見つかりませんでした。<br>
          検索条件を変えてもう一度お試しください
        </p>
        <p class="text-center">
          <a href="{{asset('/')}}search" class="link link-hover link-primary">条件を変えて探し直す</a>
        </p>
      </div>
    </section>
  @endif


@endsection

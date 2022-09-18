@extends('admin::layouts.app')
@section('title', 'データダウンロード｜' . config('myapp.site_name'))

@section('content')
  @include('admin::download.index.breadcrumb')
  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      データダウンロード
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        各種データのダウンロードができます
      </p>
    </div>
  </div>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <h2 class="mb-4 text-base font-bold tracking-wider md:text-xl">
        <i class="fa-solid fa-file-arrow-down mr-2"></i>冊子関係のデータをダウンロード
      </h2>
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <ul class="text-accent">
          <li class="py-1">
            <a href="{{asset('/')}}download/" class="hover:text-accent_light">冊子確認用CSVダウンロード</a>
          </li>
          <li class="py-1">
            <a href="{{asset('/')}}download/" class="hover:text-accent_light">メール一括送信用CSVダウンロード</a>
          </li>
          <li class="py-1">
            <a href="{{asset('/')}}download/" class="hover:text-accent_light">冊子すむところ地図用CSVダウンロード（旭川・道北版のみ）</a>
          </li>
          <li class="py-1">
            <a href="{{asset('/')}}download/" class="hover:text-accent_light">メール一括送信用CSVダウンロード（旭川・道北版のみ）</a>
          </li>
          <li class="py-1">
            <a href="{{asset('/')}}download/" class="hover:text-accent_light">メール一括送信用CSVダウンロード（札幌・小樽版のみ）</a>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <h2 class="mb-4 text-base font-bold tracking-wider md:text-xl">
        <i class="fa-solid fa-file-arrow-down mr-2"></i>各種資料をダウンロード
      </h2>
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <ul class="text-accent">
          <li class="py-1">
            <a href="{{asset('/')}}download/" class="hover:text-accent_light">冊子すむところ 内部資料一式 (PDF／約9MB) <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <h2 class="mb-4 text-base font-bold tracking-wider md:text-xl">
        <i class="fa-solid fa-file-lines mr-2"></i>メール文面テンプレート
      </h2>
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <ul class="text-accent">
          <li class="py-1">
            <a href="{{asset('/')}}download/" class="hover:text-accent_light">冊子やりとり用文面</a>
          </li>
        </ul>
      </div>
    </div>
  </section>




@endsection


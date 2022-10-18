@extends('general::layouts.app')
@section('title', 'サイトマップ｜' . config('myapp.site_name'))

@section('content')
  @include('general::contents.sitemap.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      サイトマップ
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        すむところ.comのコンテンツ一覧です。
      </p>
    </div>
  </div>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <ul class="space-y-4">
        <li>
          <a href="{{asset('/')}}"class="link link-hover link-accent"><i
                    class="fa-solid fa-circle-arrow-right mr-2"></i>ホーム</a>
        </li>
        <li>
          <a href="{{asset('/')}}search"class="link link-hover link-accent"><i
                    class="fa-solid fa-circle-arrow-right mr-2"></i>条件でさがす</a>
        </li>
        <li>
          <a href="{{asset('/')}}spot"class="link link-hover link-accent"><i
                    class="fa-solid fa-circle-arrow-right mr-2"></i>事業所一覧</a>
        </li>
        <li>
          <a href="{{asset('/')}}service"class="link link-hover link-accent"><i
                    class="fa-solid fa-circle-arrow-right mr-2"></i>サービス案内</a>
        </li>
        <li>
          <a href="{{asset('/')}}qa"class="link link-hover link-accent"><i
                    class="fa-solid fa-circle-arrow-right mr-2"></i>よくある質問</a>
        </li>
        <li>
          <a href="{{asset('/')}}contact"class="link link-hover link-accent"><i
                    class="fa-solid fa-circle-arrow-right mr-2"></i>お問い合わせ</a>
        </li>
        <li>
          <a href="{{asset('/')}}company"class="link link-hover link-accent"><i
                    class="fa-solid fa-circle-arrow-right mr-2"></i>運営会社</a>
        </li>
        <li>
          <a href="{{asset('/')}}news"class="link link-hover link-accent"><i
                    class="fa-solid fa-circle-arrow-right mr-2"></i>お知らせ</a>
        </li>
        <li>
          <a href="{{asset('/')}}user/login"class="link link-hover link-accent"><i
                    class="fa-solid fa-circle-arrow-right mr-2"></i>ユーザーログイン</a>
        </li>
        <li>
          <a href="{{asset('/')}}register"class="link link-hover link-accent"><i
                    class="fa-solid fa-circle-arrow-right mr-2"></i>ユーザー登録する</a>
        </li>
      </ul>
    </div>
  </section>

@endsection


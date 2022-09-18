@extends('general::layouts.app')
@section('title', 'サービス案内｜' . config('myapp.site_name'))

@section('content')
  @include('general::contents.service.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      サービス案内
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        すむところ.comでできることをまとめました。
      </p>
    </div>
  </div>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <h2 class="mb-4 text-base font-bold tracking-wider md:text-xl">
        施設長・事務長など施設運営担当者の方へ
      </h2>
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <p>
          すむところ.comは、より多くの施設をご案内することで、社会資源情報として活用いただく事を目的としています。施設の情報登録は無料です。すむところ.comからの問い合わせで入居が決まっても、施設側に紹介手数料がかかることはありません。無料で掲載いただくことで、偏りをなくし網羅的な情報が掲載される社会資源として活用いただくことを目的としています。ぜひ登録にご協力ください。
        </p>
      </div>
      <p class="text-center">
        <a href="{{asset('/')}}" class="btn btn-primary">事業所登録はこちらをクリック</a>
      </p>
    </div>
  </section>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <h2 class="mb-4 text-base font-bold tracking-wider md:text-xl">
        事業所を公正にご紹介
      </h2>
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <p>
          すむところ.comは、完全に独立しています。 どこか特定の病院や介護事業所が運営しているものではありません。 集客目的ではなく、介護事業所探しで困っている人を助けるためのサービスです。
          そのため、特定の事業所のみに紹介を肩入れすることを防止しています。 あくまでも公正な第三者の立場で、皆様の希望を最大限かなえる老人ホームを探すお手伝いをします。紹介する事業所は主に以下のとおりです。
        </p>
      </div>
      <ul class="space-y-2 bg-base-100 p-8 rounded">
        <li class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          有料老人ホーム（介護型、住宅型、健康型）
        </li>
        <li class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          サービス付高齢者住宅
        </li>
        <li class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          グループホーム
        </li>
        <li class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          グループハウス
        </li>
        <li class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          ケアハウス（軽費老人ホーム）
        </li>
      </ul>
    </div>
  </section>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <h2 class="mb-4 text-base font-bold tracking-wider md:text-xl">
        すむところ.comへのお問合わせはこちら
      </h2>
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <p>
          お電話の際には「すむところ.comのホームページを見てお電話したんですが・・」とお伝えください。
        </p>
      </div>
      <ul class="flex justify-center space-x-4">
        <li class="">
          <a href="{{asset('/')}}contact" class="btn btn-primary">お問い合わせはこちら</a>
        </li>
        <li class="">
          <a href="{{asset('/')}}company" class="btn btn-primary">運営会社の概要はこちら</a>
        </li>
      </ul>
    </div>
  </section>

@endsection


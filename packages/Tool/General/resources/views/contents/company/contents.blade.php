@extends('general::layouts.app')
@section('title', '運営会社｜' . config('myapp.site_name'))

@section('content')
  @include('general::contents.company.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      運営会社
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        すむところ.comの運営会社についてのご紹介です
      </p>
    </div>
  </div>

  <section class="container mx-auto max-w-6xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <div class="overflow-x-auto">

        <div class="flex border-b border-gray-200 mb-5 pb-5">
          <div class="w-1/4">
            サービス名
          </div>
          <div class="w-3/4">
            すむところ.com（旧・介護事業所コンシェルジュ）
          </div>
        </div>

        <div class="flex border-b border-gray-200 mb-5 pb-5">
          <div class="w-1/4">
            運営会社名
          </div>
          <div class="w-3/4">
            <a href="{{asset('/')}}contact" class="link link-hover link-primary">介護福祉サーベイジャパン 株式会社</a>
          </div>
        </div>

        <div class="flex border-b border-gray-200 mb-5 pb-5">
          <div class="w-1/4">
            法人設立
          </div>
          <div class="w-3/4">
            2016年2月15日
          </div>
        </div>

        <div class="flex border-b border-gray-200 mb-5 pb-5">
          <div class="w-1/4 mb-2">
            サービス名
          </div>
          <div class="w-3/4 mb-2">
            すむところ.com（旧・介護事業所コンシェルジュ）
          </div>
        </div>

        <div class="flex border-b border-gray-200 mb-5 pb-5">
          <div class="w-1/4 mb-2">
            事業内容
          </div>
          <div class="w-3/4 mb-2">
            介護事業所・福祉事業所への経営支援業務<br>
            介護・福祉分野における求人・採用・雇用支援<br>
            サーチ事業（従業員満足度調査等）
          </div>
        </div>

        <div class="flex border-b border-gray-200 mb-5 pb-5">
          <div class="w-1/4 mb-2">
            住所
          </div>
          <div class="w-3/4 mb-2">
            <div class="font-bold text-md mb-2">●札幌本社</div>
            <div class="rounded-lg border border-gray-200 bg-gray-50 h-60 rounded mb-5" id="Company1MapId">
              <iframe loading="lazy" src="https://maps.google.co.jp/maps?z=14&output=embed&#038;q=43.059715,141.351071" width="100%" height="100%;"></iframe>
            </div>
            <div class="mb-10">
              〒060-0042 札幌市中央区大通西4丁目1 道銀ビル7F<br>
              TEL 011-261-0025<br>
              TEL 011-261-4422
            </div>

            <div class="font-bold text-md mb-2">●旭川本社</div>
            <div class="rounded-lg border border-gray-200 bg-gray-50 h-60 rounded mb-5" id="Company2MapId">
              <iframe loading="lazy" src="https://maps.google.co.jp/maps?z=14&output=embed&#038;q=43.770874,142.363394" width="100%" height="100%;"></iframe>
            </div>
            <div>
              〒070-0036 旭川市6条通8丁目37番地22 68ビル3F<br>
              TEL 0166-73-8880<br>
              FAX 0166-73-8881
            </div>
          </div>
        </div>

        <div class="flex border-b border-gray-200 mb-5 pb-5">
          <div class="w-1/4 mb-2">
            お問い合わせ
          </div>
          <div class="w-3/4 mb-2">
            <a href="{{asset('/')}}contact" class="link link-hover link-primary">お問い合わせはこちら</a>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection


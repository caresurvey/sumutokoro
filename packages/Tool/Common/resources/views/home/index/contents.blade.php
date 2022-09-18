@extends('general::layouts.app')
@section('title', '')

@section('content')
  <!-- Mainvisual -->
  @include('general::home.index.mainvisual')

  <section>
    <div class="flex flex-col items-center px-5 pt-20 pb-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="text-gray-600 flex flex-col w-full max-w-3xl mx-auto prose text-left prose-blue">
        <div class="w-full mx-auto">
          <div class="mb-4">
            <a href="{{asset('/')}}media_sheets.html">
              <img src="{{asset('/')}}img/general/pages/home/bnr_about_book.jpg" alt=""></a>
          </div>
          <div class="flex">
            <div class="mr-2">
              <a href="https://youtu.be/Dt9le-gldvU" target="_blank">
                <img src="{{asset('/')}}img/general/pages/home/bnr_cm.jpg" alt=""></a>
            </div>
            <div class="ml-2">
              <a href="{{asset('/')}}contact">
                <img src="{{asset('/')}}img/general/pages/home/bnr_for_company.jpg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section>
    <div class="flex flex-col items-center px-5 pb-20 pt-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex flex-col w-full max-w-3xl mx-auto prose text-left prose-blue">
        <h2 class="text-brown text-center text-2xl sm:text-3xl md:text-4xl font-bold mb-8 md:mb-12">ご購入はこちら</h2>
        <div class="w-full mx-auto">
          <div class="flex flex-wrap">
            <div class="p-2 w-1/2">
              <a href="https://amzn.to/3vEz8Kt" target="_blank">
                <img src="{{asset('/')}}img/general/pages/home/bnr_sumutokoro2021_sapporo.jpg" alt=""></a>
            </div>
            <div class="p-2 w-1/2">
              <a href="https://amzn.to/3C7Syd0" target="_blank">
                <img src="{{asset('/')}}img/general/pages/home/bnr_sumutokoro2021_asahikawa.jpg" alt=""></a>
            </div>
            <div class="p-2 w-1/2">
              <a href="https://amzn.to/2XKfYGw" target="_blank">
                <img src="{{asset('/')}}img/general/pages/home/bnr_sumutokoro2021_doutou.jpg" alt=""></a>
            </div>
            <div class="p-2 w-1/2">
              <a href="https://amzn.to/3CbNJzz" target="_blank">
                <img src="{{asset('/')}}img/general/pages/home/bnr_sumutokoro2021_dounan.jpg" alt=""></a>
            </div>
          </div>
          <div class="p-2">
            <a href="https://sumutokoro.com/suser/regist/form/" target="_blank">
              <img src="{{asset('/')}}img/general/pages/home/bnr_soudan.jpg" alt=""></a>
          </div>
          <div class="p-2">
            <a href="https://sumutokoro.com/spot/add/" target="_blank">
              <img src="{{asset('/')}}img/general/pages/home/bnr_jigyousyo.jpg" alt=""></a>
          </div>
          <p>↑お電話やFAXでの施設登録案内をご覧になった方はこちらをクリックしてください。</p>
        </div>
      </div>
    </div>
  </section>


  @include('general::home.index.area', ['data' => $data])

  @include('general::home.index.categories', ['data' => $data])

  @include('general::home.index.news', ['data' => $data])


@endsection


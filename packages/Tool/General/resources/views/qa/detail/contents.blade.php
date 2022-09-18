@extends('general::layouts.app')
@section('title', 'よくある質問〜介護保険とは｜' . config('myapp.site_name'))
@section('description', '介護保険制度についてのよくある質問をまとめました。')

@section('content')
  @include('general::qa.detail.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      よくある質問 - 介護保険とは
    </h1>
  </div>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <h2 class="mb-4 text-base font-bold tracking-wider md:text-xl">
        介護保険制度について
      </h2>
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <p class="mb-5">
          介護保険制度は、平成12年4月からスタートしました。 皆様がお住まいの市区町村（保険者といいます。）が制度を運営しています。 私たちは40歳になると、被保険者として介護保険に加入します。
        </p>
        <p class="mb-5">
          65歳以上の方は、市区町村（保険者）が実施する要介護認定において介護が必要と認定された場合、 いつでもサービスを受けることができます。
        </p>
        <p class="mb-5">
          また、40歳から64歳までの人は、介護保険の対象となる特定疾病により介護が必要と認定された場合は、 介護サービスを受けることができます。 ※40歳以上の方は、介護保険料を毎月支払うこととなっており、
          この保険料は、介護保険サービスを運営していくための必要な財源になります。
        </p>
      </div>
    </div>
  </section>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <h2 class="mb-4 text-base font-bold tracking-wider md:text-xl">
        介護保険サービスの対象者について
      </h2>
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <p class="mb-5">
          ■40歳以上の人は、介護保険の被保険者となります。<br>
          ①65歳以上の人（第１号被保険者）<br>
          ②40～64歳までの医療保険に加入している人（第２号被保険者）
        </p>
        <p class="mb-5">
          ■介護保険のサービスを利用できる人は次のとおりです。<br>
          ＜65歳以上の人＞（第１号被保険者）<br>
          → 寝たきりや認知症などにより、介護を必要とする状態（要介護状態）になったり、 家事や身じたく等、日常生活に支援が必要な状態（要支援状態）になった場合。
        </p>
        <p class="mb-5">
          ＜40歳～64歳までの人＞（第２号被保険者）<br>
          → 初老期の認知症、脳血管疾患など老化が原因とされる病気（※特定疾病）により、 要介護状態や要支援状態になった場合。
        </p>
      </div>
    </div>
  </section>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <h2 class="mb-4 text-base font-bold tracking-wider md:text-xl">
        サービスを利用するには要介護（要支援）認定を受ける必要があります
      </h2>
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <p class="mb-5">
          ※特定疾病は次の16種類です。<br>
          筋萎縮性側索硬化症<br>
          脳血管疾患<br>
          後縦靭帯骨化症<br>
          進行性核上性麻痺・大脳皮質基底核変性症およびパーキンソン病<br>
          骨折を伴う骨粗しょう症<br>
          閉塞性動脈硬化症<br>
          系統萎縮症<br>
          慢性関節<br>
          リウマチ<br>
          初老期における認知症<br>
          性閉塞性肺疾患<br>
          脊髄小脳変性症<br>
          脊柱管狭窄症<br>
          糖尿病性神経障害・糖尿病性腎症および糖尿病性網膜症<br>
          両側の膝関節または股関節に著しい変形を伴う変形性関節症<br>
          早老症<br>
          末期がん<br>
          出典：厚生労働省
        </p>
      </div>
    </div>
  </section>

@endsection


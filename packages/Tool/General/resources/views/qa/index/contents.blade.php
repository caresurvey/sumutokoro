@extends('general::layouts.app')
@section('title', 'よくある質問一覧｜' . config('myapp.site_name'))
@section('description', 'すむところ.comよくある質問をまとめました。')

@section('content')
  @include('general::qa.index.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      よくある質問一覧
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        すむところ.comよくある質問をまとめました。
      </p>
    </div>
  </div>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <div class="leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <a href="{{asset('/')}}qa/1" class="text-accent hover:text-accent_light">介護保険とは</a><br>
      </div>
    </div>
  </section>

@endsection

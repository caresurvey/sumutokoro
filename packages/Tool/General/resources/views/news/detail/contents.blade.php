@extends('general::layouts.app')
@section('title', $data['news']['name'] . '｜お知らせ' . config('myapp.site_name'))
@section('description', $data['news']['name'].'　すむところ.comお知らせ詳細情報ページです。')

@section('content')
  @include('general::news.index.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      @if(!empty($data['news']['id']))
        {{$data['news']['name']}}
      @else
        お知らせ
      @endif
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        すむところ.comお知らせの詳細
      </p>
    </div>
  </div>

  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <h2 class="mb-2 text-xl font-bold tracking-wider md:text-2xl">{{$data['news']['name']}}</h2>
      <div class="text-gray-500 text-xs sm:text-sm mb-4 sm:mb-6">
        投稿日：{{$data['news']['created_at']->format('Y年m月d日')}}
      </div>
      <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <p>
          {{$data['news']['body']}}
        </p>
      </div>
      <p class="text-center">
        <a href="{{asset('/')}}news/{{$data['news']['id']}}" class="btn btn-primary">この記事の続きを見る</a>
      </p>
    </div>
  </section>

  <p class="text-center">
    <a href="{{asset('/')}}news" class="link link-primary link-hover">お知らせ一覧に戻る</a>
  </p>

@endsection


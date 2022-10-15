@extends('general::layouts.app')
@section('title', 'お知らせ一覧｜' . config('myapp.site_name'))
@section('description', 'すむところ.comからのお知らせ・プレスリリース等の一覧ページです。')

@section('content')
  @include('general::news.index.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      お知らせ一覧
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        すむところ.comからのお知らせ・プレスリリース等
      </p>
    </div>
  </div>

  @if(!empty($data['news'][0]))
    @foreach($data['news'] as $news)
      <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
        <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
          <h2 class="mb-2 text-xl font-bold tracking-wider md:text-2xl">
            <a href="{{asset('/')}}news/{{$news['id']}}" class="link link-hover link-primary">{{$news['name']}}</a>
          </h2>
          <div class="text-gray-500 text-xs sm:text-sm mb-4 sm:mb-6">
            投稿日：{{$news['created_at']->format('Y年m月d日')}}
          </div>
          <div class="mb-10 leading-7 tracking-wider text-sm md:text-base md:leading-8">
            <p>
              {{$news['body']}}
            </p>
          </div>
          <p class="text-center">
            <a href="{{asset('/')}}news/{{$news['id']}}" class="btn btn-primary btn-more">この記事の続きを見る</a>
          </p>
        </div>
      </section>
    @endforeach

    {!! $data['linkTag'] !!}

  @endif

@endsection


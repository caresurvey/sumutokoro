@extends('common::layouts.error')
@section('title', 'ページがみつかりませんでした｜' . config('myapp.site_name'))

@section('content')

    <div class="container mx-auto px-10 py-10 sm:py-24 md:py-36">
      <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-4xl text-center text-gray-800 font-black leading-7 md:leading-10">
        ページが見つかりませんでした。
      </h1>
      <div class="py-10">
        <p class="sm:text-md md:text-center md:leading-8">
          申し訳ありません、お探しのページが見つかりませんでした。<br class="hidden md:inline-block">
          ページが変更になったか、アドレスが違っている可能性があります。<br class="hidden md:inline-block">
          お手数ですが、<a href="{{asset('/')}}">トップページ</a>から 今一度お求めのページをお探しください。
        </p>
      </div>
      <div class="flex justify-center items-center">
        <a href="{{asset('/')}}" class="btn btn-primary">トップページに戻る</a>
      </div>
    </div>

@endsection

@extends('admin::layouts.app')
@section('title', '管理画面トップ｜' . config('myapp.site_name'))

@section('content')
  @include('admin::home.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-5 sm:py-5 md:mb-8">
    <h1 class="text-lg text-center leading-7 font-bold sm:text-xl md:text-2xl md:leading-10 lg:text-3xl">
      管理画面
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        運営用の管理画面です
      </p>
    </div>
  </div>

  <div class="grid grid-cols-3 gap-8 text-center px-10">
    <div>
      <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/spot" class="block px-4 py-16 hover:bg-accent text-gray-600 rounded-md bg-white shadow-sm hover:text-white">
      <i class="fa-solid fa-building text-6xl pb-5"></i><br>
      事業所管理（{{$data['spot']}}件）</a>
    </div>
    <div>
      <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/company" class="block px-4 py-16 hover:bg-accent text-gray-600 rounded-md bg-white shadow-sm hover:text-white">
        <i class="fa-solid fa-building text-6xl pb-5"></i><br>
        法人管理（{{$data['company']}}件）</a>
    </div>
    <div>
      <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/news" class="block px-4 py-16 hover:bg-accent text-gray-600 rounded-md bg-white shadow-sm hover:text-white">
        <i class="fa-solid fa-newspaper text-6xl pb-5"></i><br>
        お知らせ管理（{{$data['news']}}件）</a>
    </div>
    <div>
      <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/user" class="block px-4 py-16 hover:bg-accent text-gray-600 rounded-md bg-white shadow-sm hover:text-white">
        <i class="fa-solid fa-person text-6xl pb-5"></i><br>
        ユーザー管理（{{$data['user']}}件）</a>
    </div>
    <div>
      <a href="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/fax" class="block px-4 py-16 hover:bg-accent text-gray-600 rounded-md bg-white shadow-sm hover:text-white">
        <i class="fa-solid fa-newspaper text-6xl pb-5"></i><br>
        FAX用紙作成</a>
    </div>
  </div>
@endsection


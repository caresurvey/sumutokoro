@extends('user::layouts.app')
@section('title', 'すむところ.com 老人施設探しなら')

@section('content')
  @include('user::home.breadcrumb')
  <main class="mx-auto container py-20">
    <h1 class="text-center text-2xl md:text-4xl font-bold pb-4 tracking-wide">マイページ</h1>
    <div class="text-center text-xs md:text-lg self-center text-gray-500 tracking-widest mb-20">ようこそ{{Auth::guard('user')->user()->name}}さん</div>


    <div class="grid grid-cols-3 gap-8 text-center px-10">      @if(Auth::user()->is_authenticated !== 0)

      <div>
        <a href="{{asset('/')}}user/spot" class="block px-4 py-16 hover:bg-accent text-gray-600 rounded-md bg-white shadow-sm hover:text-white">
          <i class="fa-solid fa-building text-6xl pb-5"></i><br>
          事業所管理（{{$data['spot']}}件）</a>
      </div>
      <div>
        <a href="{{asset('/')}}user/company" class="block px-4 py-16 hover:bg-accent text-gray-600 rounded-md bg-white shadow-sm hover:text-white">
          <i class="fa-solid fa-building text-6xl pb-5"></i><br>
          法人管理（{{$data['company']}}件）</a>
      </div>
      @endif
      <div>
        <a href="{{asset('/')}}user/profile" class="block px-4 py-16 hover:bg-accent text-gray-600 rounded-md bg-white shadow-sm hover:text-white">
          <i class="fa-solid fa-person text-6xl pb-5"></i><br>
          プロフィール編集</a>
      </div>
    </div>

  </main>
@endsection


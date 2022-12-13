@extends('general::layouts.app')
@section('title', 'パスワード再設定申込完了')

@section('content')

  <section>
    <div class=" flex flex-col items-center px-5 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="text-gray-600 flex flex-col w-full max-w-3xl mx-auto prose text-left prose-blue">
        <div class="w-full mx-auto">

          <h2 class="text-lg mb-16 text-3xl text-gray-800 font-bold text-center">
            {{ session('title') }}
          </h2>

          <div class="rounded-md bg-white px-20 pt-20 py-16 shadow w-full mb-10">

            <div class="mb-10 leading-7">
              <p>
                {!! nl2br(e(session('message'))) !!}
              </p>
            </div>

          </div>
          <div class="text-center">
            <a href="{{asset('/')}}"
               class="text-sm text-accent hover:text-accent_light cursor-pointer">トップページへ戻る</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection




@extends('general::layouts.app')
@section('title', 'ユーザー登録完了｜' . config('myapp.site_name'))

@section('content')

  <section>
    <div class=" flex flex-col items-center px-5 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="text-gray-600 flex flex-col w-full max-w-4xl mx-auto prose text-left prose-blue">
        <div class="w-full mx-auto">

          <h1 class="mb-10 text-center text-xl md:text-3xl font-bold pb-4 tracking-wide">ユーザー登録完了</h1>
          <div class="w-full mx-auto">
              <div class="bg-white shadow-sm rounded mb-5 p-10 text-center leading-7">
                <p class="mb-2">
                  ありがとうございます、ユーザー登録が完了致しました。<br>
                  この後運営が承認許可作業を行います。<br>
                </p>
                <p class="mb-10">
                  承認は管理できる事業所との紐付けなどを行いますので、<br>
                  少々お待ちくださいませ。
                </p>

                <p class="mb-2">
                  <a href="{{asset('/')}}" class="text-accent hover:text-accent_light hover:underline">トップページに戻る</a>
                  ｜
                  <a href="{{asset('/')}}user/login" class="text-accent hover:text-accent_light hover:underline">ログイン画面へ進む</a>
                </p>
              </div>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection


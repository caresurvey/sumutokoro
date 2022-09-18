@extends('general::layouts.app')
@section('title', 'パスワード再設定完了')

@section('content')

  <section>
    <div class=" flex flex-col items-center px-5 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="text-gray-600 flex flex-col w-full max-w-3xl mx-auto prose text-left prose-blue">
        <div class="w-full mx-auto">

          <h2 class="text-lg mb-16 text-3xl text-gray-800 font-bold text-center">
            パスワードリセット申請完了
          </h2>

          <div class="rounded-md bg-white px-20 pt-20 py-16 shadow w-full mb-10">

            <div class="mb-10 leading-7">
              <p>
                パスワードリセットが完了しました。<br>
                入力したメールアドレスにリセット画面のURLをお送りしておりますので、<br>
                メールボックスをご確認ください。
              </p>
            </div>
            <div class="mb-10 leading-7">
              <p class="text-center">
                <a href="{{asset('/')}}user/login" class="text-sm text-accent hover:text-accent_light cursor-pointer">ログイン画面へ進む</a>
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




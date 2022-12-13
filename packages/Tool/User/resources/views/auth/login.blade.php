@extends('user::layouts.login')
@section('title', 'ユーザーページログイン｜' . config('myapp.site_name'))

@section('content')

  <form name="form" method="POST" action="{{ asset('/') }}user/login">
    @csrf
    <div class="w-screen h-screen flex items-center justify-center">
      <div class="w-3/5">

        <div class="flex justify-center mb-5">
          <img src="{{asset('/')}}img/user/pages/login/logo.png" alt="すむところ.com" class="w-2/5">
        </div>

        <div class="rounded-md bg-white p-20 shadow w-full mb-10">
          @if($errors->any())
            <div class="mb-10 bg-red-100 border border-red-400 p-3 rounded text-red-700 text-center" id="ErrorMessages">
              <p>
                ログイン情報が違っているようです。<br>お手数ですがご確認の上もう一度お試しください。
              </p>
            </div>
          @endif

          <div class="mb-3">
            <div class="text-sm text-gray-600 mb-2"><i class="fa-solid fa-envelope mr-2"></i>メールアドレス</div>
            <input type="email" name="email" id="LoginEmail"
                   class="mb-4 w-full border border-gray-300 bg-gray-100 bg-gray-200 px-5 py-4 rounded focus:outline-primary focus:bg-white"
                   value="{{old('email', '')}}" placeholder="メールアドレスを入れてください">
          </div>

          <div class="mb-3">
            <div class="text-sm text-gray-600 mb-2"><i class="fa-solid fa-key mr-2"></i>パスワード</div>
            <input type="password" name="password" id="LoginPassword"
                   class="mb-4 bg-gray-100 bg-gray-200 border border-gray-300 px-5 py-4 w-full rounded focus:outline-primary focus:bg-white" value="{{old('password', '')}}"
                   placeholder="パスワードを入れてください">
          </div>

          <div class="text-center mb-10">
            <input type="submit" name="submit" value="ユーザーページログイン"
                   class="btn btn-wider px-12 rounded-full btn-hover" id="LoginSubmit">
          </div>

          <p class="text-center text-sm text-gray-600">
            <a href="{{asset('/')}}register" class="text-accent hover:text-accent_light cursor-pointer" id="RegisterLink">ユーザー登録</a>
            ｜
            <a href="{{asset('/')}}password/email" class="text-accent hover:text-accent_light cursor-pointer" id="ForgetPasswordLink">パスワードを忘れた方はこちら</a>
          </p>
        </div>
        <div class="text-center">
          <a href="{{asset('/')}}" class="text-sm text-accent hover:text-accent_light cursor-pointer">トップページへ戻る</a>
        </div>
      </div>
    </div>
  </form>

@endsection




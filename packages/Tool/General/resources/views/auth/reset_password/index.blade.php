@extends('general::layouts.app')
@section('title', 'パスワード再設定｜' . config('myapp.site_name'))

@section('content')

  <section>
    <div class=" flex flex-col items-center px-5 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="text-gray-600 flex flex-col w-full max-w-3xl mx-auto prose text-left prose-blue">
        <div class="w-full mx-auto">

          <h2 class="text-lg mb-3 text-4xl text-gray-800 font-bold text-center">
            パスワード再設定
          </h2>
          <p class="text-gray-500 text-center text-xl mb-14">新しいパスワードを再設定する画面です。</p>

          @include('common::form.errors')

          <form name="form" method="POST" action="{{ asset('/') }}password/reset">
            @csrf
            <div class="w-full">

              <div class="rounded-md bg-white px-20 py-16 shadow w-full mb-10">
                <div class="mb-10 leading-7">
                  <p>
                    以下のフォームに新しいパスワードを入力してください。<br>
                    また、以前のパスワードは使用できなくなりますのでご注意ください。
                  </p>
                </div>

                <div class="mb-5">
                  <div class="text-sm text-gray-600 mb-2"><i class="fa-solid fa-key mr-2"></i>新しいパスワードを入力してください</div>
                  @include('common::form.password', [
                    'name' => 'password',
                    'id' => 'ResetPassword',
                    'value' => old('password'),
                    'placeholder' => '新しいパスワードを入れてください',
                    'ps' => '※ 半角英数字8文字以上で入力してください',
                    'hasError' => $errors->has('password'),
                    'errors' => $errors->get('password'),
                    ])
                </div>

                <div class="mb-10">
                  <div class="text-sm text-gray-600 mb-2"><i class="fa-solid fa-key mr-2"></i>上記のパスワードを再入力してください</div>
                  @include('common::form.password', [
                    'name' => 'password_confirm',
                    'id' => 'ResetPasswordConfirm',
                    'value' => old('password_confirm'),
                    'placeholder' => '上記のパスワードを再入力してください',
                    'ps' => '上記のパスワードをコピペせずに再入力してください',
                    'hasError' => $errors->has('password_confirm'),
                    'errors' => $errors->get('password_confirm'),
                    ])
                </div>

                <div class="text-center mb-5">
                  <input type="submit" value="上記のパスワードでリセットする"
                         class="btn btn-primary rounded-full text-base px-12" id="ResetPasswordSubmit">
                </div>


              </div>
              <div class="text-center">
                <a href="{{asset('/')}}"
                   class="text-sm text-accent hover:text-accent_light cursor-pointer">トップページへ戻る</a>
              </div>

              @production
                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                  <div class="col-md-6">
                    {!! RecaptchaV3::field('register') !!}
                    @if ($errors->has('g-recaptcha-response'))
                      <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                    @endif
                  </div>
                </div>
              @endproduction
            </div>
            <input type="hidden" name="token" value="{{$token}}" id="ResetPasswordToken">
            <input type="hidden" name="id" value="{{$user['id']}}" id="ResetPasswordId">
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection




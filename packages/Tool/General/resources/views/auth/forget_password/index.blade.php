@extends('general::layouts.app')
@section('title', 'パスワード再設定申し込み｜' . config('myapp.site_name'))

@section('content')


  <section>
    <div class=" flex flex-col items-center px-5 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="text-gray-600 flex flex-col w-full max-w-3xl mx-auto prose text-left prose-blue">
        <div class="w-full mx-auto">

          <h2 class="text-lg mb-3 text-4xl text-gray-800 font-bold text-center">
            パスワードリセット
          </h2>
          <p class="text-gray-500 text-center text-xl mb-14">パスワードを忘れた方の再設定画面です。</p>

          @include('common::form.errors')

          <form name="form" method="POST" action="{{ asset('/') }}password/email">
            @csrf
            <div class="w-full">

              <div class="rounded-md bg-white px-20 py-16 shadow w-full mb-10">
                <div class="mb-10 leading-7">
                  <p>
                    パスワードを忘れた場合は、リセットをして新しいパスワードを登録し直すことができますので、
                    登録しているメールアドレスを以下に入力してください。再設定用ページの案内を入力したメールアドレスにお送りしますので、
                    そこから新しいパスワードを再設定してください。
                  </p>
                </div>

                <div class="text-gray-600 mb-2"><i class="fa-solid fa-envelope mr-2"></i>登録しているメールアドレスを入力してください</div>
                <div class="mb-10">
                  @include('common::form.email', [
                    'name' => 'email',
                    'id' => 'ForgetPasswordEmail',
                    'value' => old('email'),
                    'placeholder' => 'メールアドレスを入れてください',
                    'ps' => '※ 半角英数字で入力してください',
                    'hasError' => $errors->has('email'),
                    'errors' => $errors->get('email'),
                    ])
                </div>

                <div class="text-center mb-5">
                  <input type="submit" value="パスワードリセットを申請する"
                         class="btn btn-primary rounded-full text-base px-12" id="ForgetPasswordSubmit">
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
              @endproduction            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection




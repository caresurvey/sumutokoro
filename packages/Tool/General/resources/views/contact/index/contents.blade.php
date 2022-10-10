@extends('general::layouts.app')
@section('title', 'お問い合わせ｜' . config('myapp.site_name'))
@section('description', 'すむところへのお問い合わせページです。入居相談すべて無料です！まずはお気軽にお電話ください。')

@section('content')
  @include('general::contact.index.breadcrumb')

  <div class="container mx-auto px-5 mb-2 py-4 sm:px-10 sm:py-10 md:mb-8">
    <h1 class="text-xl text-center leading-7 font-bold sm:text-2xl md:text-3xl md:leading-10 lg:text-4xl xl:text-4xl">
      すむところへのお問い合わせ
    </h1>
    <div class="py-2 text-center tsm md:text-md xl:text-lg md:leading-8">
      <p>
        入居相談すべて無料です！まずはお気軽にお電話ください。
      </p>
    </div>
  </div>


  <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
    @include('common::form.errors')

    <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
      <div class="leading-7 tracking-wider text-sm md:text-base md:leading-8">
        <p>
          施設探しのご依頼があればこちらからお問合わせ下さい。 「◯◯地区で探している」「◯◯円くらいの予算で」 「1週間で探さなくちゃいけない」など専門の相談員が対応致します。
        </p>
        <p>
          また、広告希望の方もこちらからお問い合わせ下さい。 その際は、広告掲載を希望される旨を「6. お問い合わせ内容」の項目にご記入下さい。
        </p>
        <p>
          もちろんそれ以外のお問合わせも受け付けておりますので、お気軽にお送り下さい。
        </p>
      </div>
    </div>
  </section>


  <form action="{{asset('/')}}contact/"
        onsubmit="return confirm('この内容でお問い合わせをしてもよろしいですか？')" method="post" accept-charset="UTF-8"
        id="ContactForm">
    @csrf

    <section class="container mx-auto max-w-4xl px-6 sm:px-8 md:px-12">
      <div class="shadow bg-white rounded-xl px-12 py-8 mb-8 sm:py-12 sm:mb-8 md:px-14 md:py-14 md:mb-14">
        <table class="w-full text-left mb-12">
          <tr class="bg-gray-50">
            <th class="p-4 border-t border-gray-200 bg-gray-50 w-1/4">
              <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
              1. お名前
            </th>
            <td class="p-4 w-3/4 border-t bg-gray-50 ">
              @include('common::form.text', [
                'name' => 'contact[name]',
                'id' => 'ContactName',
                'value' => old('contact.name'),
                'placeholder' => 'お名前を入れてください',
                'ps' => '例：名前太郎',
                'hasError' => $errors->has('contact.name'),
                'errors' => $errors->get('contact.name'),
                ])
            </td>
          </tr>
          <tr>
            <th class="p-4 border-t border-gray-200 w-1/4">
              2. フリガナ
            </th>
            <td class="p-4 border-t border-gray-200 w-3/4">
              @include('common::form.text', [
                'name' => 'contact[kana]',
                'id' => 'ContactKana',
                'value' => old('contact.kana'),
                'placeholder' => 'ふりがなを入れてください',
                'ps' => '例：なまえたろう',
                'hasError' => $errors->has('contact.kana'),
                'errors' => $errors->get('contact.kana'),
                ])
            </td>
          </tr>
          <tr class="">
            <th class="p-4 border-t border-gray-200 bg-gray-50 w-1/4">
              <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
              3. メールアドレス
            </th>
            <td class="p-4 w-3/4 border-t bg-gray-50 ">
              @include('common::form.email', [
                'name' => 'contact[email]',
                'id' => 'ContactEmail',
                'value' => old('contact.email'),
                'placeholder' => 'メールアドレスを入れてください',
                'ps' => '例：test@test.co.jp',
                'hasError' => $errors->has('contact.email'),
                'errors' => $errors->get('contact.email'),
                ])
            </td>
          </tr>
          <tr>
            <th class="p-4 border-t border-gray-200 w-1/4">
              4. お電話番号
            </th>
            <td class="p-4 border-t border-gray-200 w-3/4">
              @include('common::form.text', [
                'name' => 'contact[tel]',
                'id' => 'ContactTel',
                'value' => old('contact.tel'),
                'placeholder' => '電話番号を入れてください',
                'ps' => '例：09012345678',
                'hasError' => $errors->has('contact.tel'),
                'errors' => $errors->get('contact.tel'),
                ])
            </td>
          </tr>
          <tr class="">
            <th class="p-4 border-t border-gray-200 bg-gray-50 w-1/4">
              <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
              5. ご返答方法
            </th>
            <td class="pt-4 pr-4 pl-4 pb-2 w-3/4 border-t bg-gray-50">
              <ul>
                <li class="flex items-center mb-4">
                  <input {{ old('contact.reply') === 'メールでのご返答' ? 'checked' : '' }} id="ContactReply1" value="メールでのご返答" type="radio" name="contact[reply]"
                         class="radio radio-primary radio-sm @if($errors->has('contact.reply')) border-red-700 @endif">
                  <label for="ContactReply1"
                         class="ml-2 text-sm text-gray-600 cursor-pointer">メールでのご返答</label>
                </li>

                <li class="flex items-center mb-4">
                  <input {{ old('contact.reply') === '電話でのご返答' ? 'checked' : '' }} id="ContactReply2" value="電話でのご返答" type="radio" name="contact[reply]"
                         class="radio radio-primary radio-sm @if($errors->has('contact.reply')) border-red-700 @endif">
                  <label for="ContactReply2"
                         class="ml-2 text-sm text-gray-600 cursor-pointer">電話でのご返答</label>
                </li>

                <li class="flex items-center mb-4">
                  <input {{ old('contact.reply') === '上記以外でのご返答' ? 'checked' : '' }} id="ContactReply3" value="上記以外でのご返答" type="radio" name="contact[reply]"
                         class="radio radio-primary radio-sm @if($errors->has('contact.reply')) border-red-700 @endif">
                  <label for="ContactReply3"
                         class="ml-2 text-sm text-gray-600 cursor-pointer">上記以外でのご返答</label>
                </li>

                <li class="flex items-center mb-4">
                  <input {{ old('contact.reply') === '返答を希望しない' ? 'checked' : '' }} id="ContactReply4" value="返答を希望しない" type="radio" name="contact[reply]"
                         class="radio radio-primary radio-sm @if($errors->has('contact.reply')) border-red-700 @endif">
                  <label for="ContactReply4"
                         class="ml-2 text-sm text-gray-600 cursor-pointer">返答を希望しない</label>
                </li>
              </ul>
              @if($errors->has('contact.reply'))
                <div class="flex text-red-700 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                  </svg>
                  {{ $errors->first('contact.reply') }}
                </div>
              @endif

            </td>
          </tr>
          <tr>
            <th class="p-4 border-t border-b border-gray-200 w-1/4">
              <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
              6. お問い合わせ内容
            </th>
            <td class="p-4 border-t border-b border-gray-200 w-3/4">
              @include('common::form.textarea', [
                'name' => 'contact[msg]',
                'id' => 'ContactMsg',
                'value' => old('contact.msg'),
                'placeholder' => 'お問い合わせ内容を入れてください',
                'ps' => '例：施設・事業所の掲載をお願い致します、広告掲載希望致します、等',
                'rows' => 5,
                'hasError' => $errors->has('contact.msg'),
                'errors' => $errors->get('contact.msg'),
                ])
            </td>
          </tr>
        </table>
        <div class="mb-10 pb-10 border-b border-gray-200 text-md leading-7">
          <p>
            プライバシーポリシーをお読み頂き、同意された場合はチェックを入れて下さい。 送信にあたって必須となります。
          </p>
          <p>
            送信後は、数分以内に確認メールが届く仕組みになっております。 もし届かない場合は、メールアドレス入力時にミスタイプされていたりフォームそのものにエラーが発生している可能性があります。
            その場合はお手数ですが再度メール送信するかお電話でお問合せ下さい。 送信にすこし時間がかかる可能性が有りますので、必ず送信ボタンは一度だけ押して下さい。
          </p>
        </div>
        <div class="mb-10 border bg-gray-100 text-gray-700 text-sm p-8 rounded leading-6 h-[250px] overflow-y-auto">
          @include('common::form.privacy_text')
        </div>

        <div class="mb-10">

          <div class="flex items-center justify-center mb-4">
            <input {{ old('contact.privacy') === '1' ? 'checked' : '' }} value="1" id="ContactPrivacy" type="checkbox" name="contact[privacy]"
                   class="checkbox radio-primary rounded-full checkbox-sm sm:checkbox-md @if($errors->has('contact.reply')) border-red-700 @endif">
            <label for="ContactPrivacy" class="ml-2 text-sm sm:text-base cursor-pointer hover:text-primary">同意する</label>
            @if($errors->has('contact.privacy'))
              <div class="flex items-center justify-center text-red-700 text-sm ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
                {{ $errors->first('contact.privacy') }}
              </div>
            @endif
          </div>
        </div>

        {{--
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
        --}}

        <div class="mb-4 text-center">
          <input type="submit" value="上記の内容でお問い合わせをする"
                 class="btn btn-primary rounded-full text-base px-12">
        </div>
      </div>
    </section>
  </form>

@endsection


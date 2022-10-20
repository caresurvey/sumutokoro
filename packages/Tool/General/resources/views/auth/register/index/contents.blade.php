@extends('general::layouts.app')
@section('title', 'ユーザー登録｜' . config('myapp.site_name'))

@section('content')

  <section>
    <div class=" flex flex-col items-center px-5 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="text-gray-600 flex flex-col w-full max-w-4xl mx-auto prose text-left prose-blue">
        <div class="w-full mx-auto">

          <h1 class="text-center text-xl md:text-3xl font-bold pb-4 tracking-wide">ユーザー登録</h1>
          <div class="text-center text-xs md:text-lg self-center text-gray-500 tracking-widest mb-20">
            ユーザー登録ができます
          </div>
          <div class="w-full mx-auto">

            @include('common::form.errors')

            <form action="{{asset('/')}}register"
                  onsubmit="return confirm('この内容で登録をしてもよろしいですか？')" method="post" accept-charset="UTF-8"
                  id="UserEditForm">
              @method('POST')
              @csrf
              <div class="bg-white shadow-sm rounded mb-5 p-10">
                <table class="mb-10 w-full text-sm text-left text-gray-500">
                  <tbody>
                  <tr class="bg-white border-b">
                    <th class="py-4 px-4 w-2/6">
                      <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
                      お名前
                    </th>
                    <td class="py-4 px-4 w-4/6">
                      @include('common::form.text', [
                        'name' => 'user[name]',
                        'id' => 'UserName',
                        'value' => old('user.name'),
                        'placeholder' => 'お名前を入れてください',
                        'ps' => '例：介護太郎',
                        'hasError' => $errors->has('user.name'),
                        'errors' => $errors->get('user.name'),
                        ])
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <th class="py-4 px-4 w-2/6">
                      ふりがな
                    </th>
                    <td class="py-4 px-4 w-4/6">
                      @include('common::form.text', [
                        'name' => 'user[kana]',
                        'id' => 'UserKana',
                        'value' => old('user.kana'),
                        'placeholder' => 'ふりがなを入れてください',
                        'ps' => '例：かいごたろう',
                        'hasError' => $errors->has('user.kana'),
                        'errors' => $errors->get('user.kana'),
                        ])
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <th class="py-4 px-4 w-2/6">
                      電話番号
                    </th>
                    <td class="py-4 px-4 w-4/6">
                      @include('common::form.tel3', [
                        'name1' => 'user[tel1]',
                        'id1' => 'UserTel1',
                        'value1' => old('user.tel1'),
                        'placeholder1' => '番号1',
                        'name2' => 'user[tel2]',
                        'id2' => 'UserTel2',
                        'value2' => old('user.tel2'),
                        'placeholder2' => '番号2',
                        'name3' => 'user[tel3]',
                        'id3' => 'UserTel3',
                        'value3' => old('user.tel3'),
                        'placeholder3' => '番号3',
                        'ps' => '例：011-123-4567',
                        'hasError1' => $errors->has('user.tel1'),
                        'errors1' => $errors->get('user.tel1'),
                        'hasError2' => $errors->has('user.tel2'),
                        'errors2' => $errors->get('user.tel2'),
                        'hasError3' => $errors->has('user.tel3'),
                        'errors3' => $errors->get('user.tel3'),
                        ])
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <th class="py-4 px-4 w-2/6">
                      <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必 須</span><br>
                      メールアドレス
                    </th>
                    <td class="py-4 px-4 w-4/6">
                      @include('common::form.email', [
                        'name' => 'user[email]',
                        'id' => 'UserEmail',
                        'value' => old('user.email'),
                        'placeholder' => 'メールアドレスを入れてください',
                        'ps' => '例：test@test.co.jp',
                        'hasError' => $errors->has('user.email'),
                        'errors' => $errors->get('user.email'),
                        ])
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <th class="py-4 px-4 w-2/6">
                      <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必 須</span><br>
                      パスワード
                    </th>
                    <td class="py-4 px-4 w-4/6">
                      @include('common::form.password', [
                        'name' => 'user[password]',
                        'id' => 'UserPassword',
                        'value' => old('user.password'),
                        'placeholder' => 'パスワードを入れてください',
                        'ps' => '※ 半角英数字8文字以上で指定してください',
                        'hasError' => $errors->has('user.password'),
                        'errors' => $errors->get('user.password'),
                        ])
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <th class="py-4 px-4 w-2/6">
                      <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必 須</span><br>
                      パスワード確認
                    </th>
                    <td class="py-4 px-4 w-4/6">
                      @include('common::form.password', [
                        'name' => 'user[password_confirm]',
                        'id' => 'UserPasswordConfirm',
                        'value' => old('user.password_confirm'),
                        'placeholder' => '上記のパスワードを再入力してください',
                        'ps' => '上記のパスワードをコピペせずに再入力してください',
                        'hasError' => $errors->has('user.password_confirm'),
                        'errors' => $errors->get('user.password_confirm'),
                        ])
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <th class="py-4 px-4 w-2/6">
                      <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
                      ユーザータイプ
                    </th>
                    <td class="py-4 px-4 w-4/6">
                      @foreach($data['user_types'] as $key => $user_type)
                        <div class="flex items-center mb-2">
                          <input id="UserRoleId{{$key}}" value="{{$key}}" type="radio" name="user[user_type_id]"
                                 class="radio radio-primary radio-sm @if($errors->has('user.user_type_id')) border-red-700 @endif"
                                  {{ (int)old('user.user_type_id') === $key ? 'checked' : '' }}>
                          <label for="UserRoleId{{$key}}"
                                 class="ml-2 text-sm text-gray-600 cursor-pointer">{{$user_type}}</label>
                        </div>
                      @endforeach
                      @if($errors->has('user.user_type_id'))
                        @foreach($errors->get('user.user_type_id') as $error)
                          <div class="text-red-700 text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6 mr-2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                            </svg>
                            {{ $error }}
                          </div>
                        @endforeach
                      @endif
                      <span class="inline-block leading-6 text-gray-400 text-xs">※ あなたのポジションを選択してください。<br>もし分からない場合は「設定なし・不明」を選んでください。</span>

                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <th class="py-4 px-4 w-2/6">
                      <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
                      職種
                    </th>
                    <td class="py-4 px-4 w-4/6">
                      @foreach($data['job_types'] as $key => $job_type)
                        <div class="flex items-center mb-2">
                          <input id="UserJobId{{$key}}" value="{{$key}}" type="radio" name="user[job_type_id]"
                                 class="radio radio-primary radio-sm @if($errors->has('user.job_type_id')) border-red-700 @endif"
                                  {{ (int)old('user.job_type_id') === $key ? 'checked' : '' }}>
                          <label for="UserJobId{{$key}}"
                                 class="ml-2 text-sm text-gray-600 cursor-pointer">{{$job_type}}</label>
                        </div>
                      @endforeach
                      @if($errors->has('user.job_type_id'))
                        @foreach($errors->get('user.job_type_id') as $error)
                          <div class="text-red-700 text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6 mr-2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                            </svg>
                            {{ $error }}
                          </div>
                        @endforeach
                      @endif
                      <span class="inline-block leading-6 text-gray-400 text-xs">※ あなたのポジションを選択してください。<br>もし分からない場合は「設定なし・不明」を選んでください。</span>
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <th class="py-4 px-4 w-2/6">
                      <span class="bg-red-700 inline-block text-xs text-white px-2 py-1 rounded">必須</span><br>
                      所属事務所
                    </th>
                    <td class="py-4 px-4 w-4/6">
                      @include('common::form.text', [
                        'name' => 'user[company]',
                        'id' => 'UserCompany',
                        'value' => old('user.company'),
                        'placeholder' => '所属している事業所や法人を入れてください',
                        'ps' => '例：株式会社すむところ（もし所属がない場合は「なし」、わからない場合は「不明」と入れてください）',
                        'hasError' => $errors->has('user.company'),
                        'errors' => $errors->get('user.company'),
                        ])
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <th class="py-4 px-4 w-1/5">
                      備 考
                    </th>
                    <td class="py-4 px-4 w-4/5">
                      <div class="flex items-center">
                      <textarea id="UserMsg"
                                cols="30" rows="8"
                                name="user[msg]"
                                class="mb-3 appearance-none border border-gray-200 w-full text-ms block bg-gray-100 text-gray-700 rounded p-4 leading-normal focus:outline-none focus:bg-white"></textarea>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
                <div class="mb-10 border bg-gray-100 text-gray-700 text-sm p-8 rounded leading-6 h-[250px] overflow-y-auto">
                  @include('common::form.privacy_text')
                </div>

                <div class="flex justify-center py-2">
                  <input {{ old('user.privacy') === '1' ? 'checked' : '' }} value="1" id="UserPrivacy" type="checkbox" name="user[privacy]"
                         class="checkbox radio-primary rounded-full checkbox-sm sm:checkbox-md @if($errors->has('user.reply')) border-red-700 @endif">
                  <label for="UserPrivacy" class="ml-2 text-sm sm:text-base cursor-pointer hover:text-primary">プライバシーポリシーに同意する</label>
                  </div>
                  @if($errors->has('user.privacy'))
                  <div class="flex items-center justify-center text-red-700 text-sm ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    {{ $errors->first('user.privacy') }}
                  </div>
                  @endif
                </div>

              <div class="w-full py-4 border-white bg-black bg-opacity-70
                  fixed left-0 bottom-0
                  flex justify-center items-center
                  text-white
                  z-200
                  hidden
                  text-center
                  md:block
                  " id="RegisterSubmitBtn">
                <input type="submit" value="アカウント登録をする"
                       id="UserSubmit" class="font-bold px-10 py-3 text-normal rounded-full bg-accent hover:bg-accent_light cursor-pointer tracking-wider">
              </div>

              <div class="text-center md:hidden">
                <input type="submit" id="RegisterSubmitBtnMobile" value="アカウント登録をする"
                  id="UserSubmitMobile" class="btn btn-wide rounded-full btn-md btn-primary tracking-wider">
              </div>


              @production
                @if($_SERVER['HTTP_HOST'] === 'sumutokoro.com')
                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                  <div class="col-md-6">
                    {!! RecaptchaV3::field('register') !!}
                    @if ($errors->has('g-recaptcha-response'))
                      <span class="help-block"><strong>{{ $errors->first('g-recaptcha-response') }}</strong></span>
                    @endif
                  </div>
                </div>
                @endif
              @endproduction
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection


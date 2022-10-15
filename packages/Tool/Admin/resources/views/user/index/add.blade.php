<input type="checkbox" id="add-modal-open" class="modal-toggle">
<div class="modal modal-bottom bg-black bg-opacity-50 sm:modal-middle">
  <div class="modal-box bg-white">
    <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/user"
          onsubmit="return confirm('変更を反映してもよろしいですか？')" method="post" accept-charset="UTF-8" id="SpotNewsForm">
      @method('POST')
      @csrf
      <h3 class="font-bold text-lg">ユーザーの追加</h3>
      <p class="py-4">
        まずは名前とメールアドレス、パスワードを入力してください。細かい編集は後で行いましょう
      </p>
      <div class="mb-4">
        <div class="mb-1 text-gray-600 mr-2 text-sm"><i class="fa-solid fa-pencil mr-2"></i>お名前</div>
        @include('common::form.text', [
          'name' => 'user[name]',
          'id' => 'UserName',
          'value' => old('user.name'),
          'placeholder' => 'お名前を入れて下さい',
          'ps' => '例：介護太郎',
          'hasError' => $errors->has('user.name'),
          'errors' => $errors->get('user.name'),
          ])
      </div>
      <div class="mb-4">
        <div class="mb-1 text-gray-600 mr-2 text-sm"><i class="fa-solid fa-pencil mr-2"></i>メールアドレス</div>
        @include('common::form.email', [
          'name' => 'user[email]',
          'id' => 'UserEmail',
          'value' => old('user.email'),
          'placeholder' => 'メールアドレスを入れて下さい',
          'ps' => '例：test@test.co.jp',
          'hasError' => $errors->has('user.email'),
          'errors' => $errors->get('user.email'),
          ])
      </div>
      <div class="mb-4">
        <div class="mb-1 text-gray-600 mr-2 text-sm"><i class="fa-solid fa-pencil mr-2"></i>パスワード</div>
        @include('common::form.password', [
          'name' => 'user[password]',
          'id' => 'UserPassword',
          'value' => old('user.password'),
          'placeholder' => 'パスワードを入れて下さい',
          'ps' => '※ 半角英数字8文字以上',
          'hasError' => $errors->has('user.password'),
          'errors' => $errors->get('user.password'),
          ])
      </div>
      <div class="modal-action">
        <label for="add-modal-open" class="modal-cancel-btn btn btn-sm bg-gray-200 border-gray-300 text-gray-400 rounded-full hover:text-gray-600 hover:border-gray-400 hover:bg-gray-300 hover:text-white" id="AddCancelBtn">キャンセル</label>
        <button class="btn btn-sm rounded-full" id="UserAddSubmit">追加する</button>
      </div>
    </form>
  </div>
</div>

@if($errors->any())
  <script>
      document.getElementById('add-modal-open').checked = true;
  </script>
@endif

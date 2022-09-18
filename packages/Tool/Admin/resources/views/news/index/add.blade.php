<input type="checkbox" id="add-modal-open" class="modal-toggle">
<div class="modal modal-bottom bg-black bg-opacity-50 sm:modal-middle">
  <div class="modal-box bg-white">
    <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/news"
          onsubmit="return confirm('変更を反映してもよろしいですか？')" method="post" accept-charset="UTF-8" id="SpotNewsForm">
      @method('POST')
      @csrf
      <h3 class="font-bold text-lg">お知らせの追加</h3>
      <p class="py-4">
        まずはお知らせのタイトルを入力してください。<br>
        細かい編集は後で行いましょう
      </p>
      <p>
        @include('common::form.text', [
          'name' => 'news[name]',
          'id' => 'NewsName',
          'value' => old('news.name'),
          'placeholder' => 'お知らせのタイトルを入れてください',
          'ps' => '例：お知らせのタイトルを追加しました',
          'hasError' => $errors->has('news.name'),
          'errors' => $errors->get('news.name'),
          ])
      </p>
      <div class="modal-action">
        <label for="add-modal-open" class="modal-cancel-btn btn btn-sm bg-gray-200 border-gray-300 text-gray-400 rounded-full hover:text-gray-600 hover:border-gray-400 hover:bg-gray-300 hover:text-white">キャンセル</label>
        <button class="btn btn-sm rounded-full">追加する</button>
      </div>
    </form>
  </div>
</div>

@if($errors->any())
  <script>
      document.getElementById('add-modal-open').checked = true;
  </script>
@endif
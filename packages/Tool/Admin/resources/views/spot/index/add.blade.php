<input type="checkbox" id="add-modal-open" class="modal-toggle">
<div class="modal modal-bottom bg-black bg-opacity-50 sm:modal-middle">
  <div class="modal-box bg-white">
    <form action="{{asset('/')}}{{config('myapp.app_admin_prefix')}}/spot"
          onsubmit="return confirm('事業所を追加しますか？')" method="post" accept-charset="UTF-8" id="SpotAddForm">
      @method('POST')
      @csrf
      <h3 class="font-bold text-lg">事業所の追加</h3>
      <p class="py-4">
        まずは事業所名を入力してください。<br>
        細かい編集は後で行いましょう
      </p>
      <p>
        @include('common::form.text', [
          'name' => 'spot[name]',
          'id' => 'SpotName',
          'value' => old('spot.name'),
          'placeholder' => '事業所名を入れて下さい',
          'ps' => '例：住宅型有料老人ホーム すむところ',
          'hasError' => $errors->has('spot.name'),
          'errors' => $errors->get('spot.name'),
          ])
      </p>
      <div class="modal-action">
        <label for="add-modal-open"
               class="modal-cancel-btn btn btn-sm bg-gray-200 border-gray-300 text-gray-400 rounded-full hover:text-gray-600 hover:border-gray-400 hover:bg-gray-300 hover:text-white" id="SpotAddCancelBtn">キャンセル</label>
        <button class="btn btn-sm rounded-full" id="SpotAddSubmit">追加する</button>
      </div>
    </form>
  </div>
</div>
@if($errors->any())
  <script>
      document.getElementById('add-modal-open').checked = true;
  </script>
@endif
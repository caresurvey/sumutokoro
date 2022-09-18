<!-- 差し替え追加 -->
<div id="UploadedPhoto" class="@if(empty($photo)) hidden @endif">
  <div id="UploadedPhotoDelBtn" role="tooltip"
       class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
    クリックすると画像を削除し、新たな画像を選択できます。
    <div class="tooltip-arrow" data-popper-arrow></div>
  </div>
  <div class="w-1/4 relative">
    <div id="UploadedPhotoRemoveBtn"
         class="fa-solid fa-circle-xmark text-red-700 text-2xl cursor-pointer absolute top-1 right-2 hover:text-red-500"
         data-tooltip-target="UploadedPhotoDelBtn"></div>
    @if(!empty($photo))<img src="{{asset('/')}}photos/spots/{{$photo['name']}}/{{$photo['name']}}_l.jpg"
                            class="w-full rounded shadow" alt="">@endif
  </div>
</div>

<!-- 新規追加 -->
<div id="PreUploadedPhoto" class="hidden">
  <div id="UploadedPhotoDelBtn" role="tooltip"
       class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
    クリックすると画像アップロードをキャンセルします
    <div class="tooltip-arrow" data-popper-arrow></div>
  </div>
  <div class="w-1/4 relative mb-2">
    <div id="PreUploadedPhotoRemoveBtn"
         class="fa-solid fa-circle-xmark text-red-700 text-2xl cursor-pointer absolute top-1 right-2 hover:text-red-500"
         data-tooltip-target="UploadedPhotoDelBtn"></div>
    <img id="UploadPhotoImage" class="border border-gray-200 shadow rounded">
  </div>
  @if(!empty($photo))
    <div id="ExistsPhoto">
      <span class="inline-block bg-gray-600 px-2 py-1 rounded text-xs text-white">この写真に差し替えます</span>
      <input id="UploadPhotoValue" name="photo[upload]" type="hidden">
      <input id="DeletePhotoValueOn" name="photo[delete][on]" type="hidden" value="0">
      <input id="DeletePhotoValueId" name="photo[delete][id]" type="hidden" value="{{$photo['id']}}">
      <input id="DeletePhotoValueName" name="photo[delete][name]" type="hidden" value="{{$photo['name']}}">
    </div>
  @else
    <div id="NotExistsPhoto">
      <span class="inline-block bg-gray-600 px-2 py-1 rounded text-xs text-white">この写真をアップロードします</span>
      <input id="UploadPhotoValue" name="photo[upload]" type="hidden">
    </div>
  @endif
</div>

<div id="UploadPhotoForm" class="@if(!empty($photo)) hidden @endif">
  <div class="flex justify-center items-center w-full relative">
    @if(!empty($photo))
      <div id="UploadPhotoFormCancelBtn"
           class="absolute top-2 right-2 px-3 py-1 bg-red-700 text-white text-xs rounded hover:bg-red-400 cursor-pointer">
        <i class="fa-solid fa-ban mr-2"></i>画像差し替えをキャンセル
      </div>
    @endif
    <label for="UploadPhotoData"
           class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer">
      <div class="flex flex-col justify-center items-center pt-5 pb-6 text-center">
        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
        </svg>
        <p class="mb-2 text-sm text-gray-500">メイン画像はまだ登録されていません。<br>ここをクリックして画像を選択して下さい。
        </p>
        <p class="text-xs text-gray-500">画像は「PNG」か「JPG」のみで、サイズは「1200x800ピクセル」を推奨します)</p>
      </div>
      <input id="UploadPhotoData" type="file" class="hidden">
    </label>
  </div>
</div>


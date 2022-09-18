<template>

  <!-- DB登録ありの場合 -->
  <div v-if="isRegistered">

    <!-- 登録画像を削除した場合 -->
    <div v-if="isShowForm">
      <!-- 登録画像を削除して、画像アップロードした場合、アップロード画像を表示 -->
      <div v-if="isUploaded">
        <div class="w-1/3 relative">
          <div class="tooltip absolute top-1 right-2" data-tip="クリックでアップロードをキャンセル">
            <label class="btn btn-circle btn-sm bg-red-700 border-none text-white hover:bg-red-600"
                   @click="uploadCancel">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </label>
          </div>
          <!-- アップロードした画像の表示 -->
          <img :src="uploadSrc.src" class="w-full rounded shadow mb-2">
          <div class="text-xs flex items-center mr-2">
            元の写真を削除してこの写真に差し替えます
          </div>

          <!-- サーバーサイドに送る値 -->
          <input name="photo[upload]" type="hidden" :value="uploadSrc.src"><!-- 新しくアップロードするファイル -->
          <input name="photo[delete][on]" type="hidden" class="border" value="1"><!-- 過去のファイルを削除するフラグ -->
          <input name="photo[delete][id]" type="hidden" class="border" :value="registeredData.id"><!-- 削除する過去ファイルのid -->
          <input name="photo[delete][name]" type="hidden" class="border" :value="registeredData.name">
          <!-- 削除する過去ファイルのファイル名 -->
        </div>

      </div>

      <!-- 登録画像を削除して、画像アップロードされてない場合、フォームを表示 -->
      <div v-else class="flex justify-center items-center w-full relative">
        <label @click="removeCancel"
               class="tooltip absolute top-2 right-2 px-3 py-1 bg-red-700 text-white text-xs rounded hover:bg-red-400 cursor-pointer"
               data-tip="画像の差し替えをやめて元の写真を使用">
          <i class="fa-solid fa-ban mr-2"></i>画像差し替えをキャンセル
        </label>

        <label for="Upload"
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
          <input id="Upload" type="file" class="hidden" @change="upload">
        </label>
      </div>
    </div>

    <!-- 登録画像を削除してない場合 -->
    <div v-else>
      <!-- 登録画像を削除してない場合、登録画像を表示 -->
      <div class="w-1/3 relative">
        <div class="tooltip absolute top-1 right-2" data-tip="画像を削除し、新たな画像に差し替えます">
          <label class="btn btn-circle btn-sm bg-red-700 border-none text-white hover:bg-red-600" @click="remove">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </label>
        </div>
        <img :src="'/photos/spots/' + registeredData.name + '/' + registeredData.name + '_2l.jpg'"
             class="w-full rounded shadow mb-2">
      </div>
    </div>
  </div>


  <!-- DB登録なしの場合 -->
  <div v-else>
    <!-- アップロードしてない場合 -->
    <div v-if="isShowForm">
      <label for="Upload"
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
        <input id="Upload" type="file" class="hidden" @change="upload">
      </label>
    </div>
    <!-- アップロードした場合 -->
    <div v-else>
      <div class="w-1/3 relative">
        <div class="tooltip absolute top-1 right-2" data-tip="この写真のアップロードをキャンセルします">
          <label class="btn btn-circle btn-sm bg-red-700 border-none text-white hover:bg-red-600" @click="remove">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </label>
        </div>
        <!-- アップロードした画像の表示 -->
        <img :src="uploadSrc.src" class="w-full rounded shadow mb-2">
        <!-- サーバーサイドに送る値 -->
        <input name="photo[upload]" type="hidden" :value="uploadSrc.src">
        <div class="text-xs flex items-center mr-2">
          この写真を新規に追加します
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {ref, reactive} from 'vue'

export default {
  props: {
    data: {
      type: String,
      require: true
    }
  },
  setup(props) {

    // 画像が登録されているかどうかの変数の定義
    const isRegistered = ref(false)

    // 画像が削除されたかどうかの変数の定義
    const isRemoved = ref(false)

    // 画像がアップロードされたかどうかの変数の定義
    const isUploaded = ref(false)

    //アップロードフォームを表示するかどうかの変数の定義
    const isShowForm = ref(true)

    // bladeからのデータを読み込んでデータにセットする
    const registeredData = reactive(JSON.parse(props.data))

    // アップロードされた画像をbase64変換したものを格納する変数定義
    const uploadSrc = reactive({src: ''})

    // 画像が登録されている場合
    if (typeof registeredData.id !== 'undefined') {
      isRegistered.value = true
      isShowForm.value = false
    }

    // アップロード
    const upload = (e) => {

      // ファイル情報を取得
      let file = e.target.files[0];

      // 画像ファイル以外は処理を止める
      if (!file.type.match('image.*')) {
        // アラートを出す
        alert('画像を選択してください');
        // 処理を止める
        return false;
      }

      const reader = new FileReader()
      reader.readAsDataURL(file)
      reader.onload = (e) => {
        // 登録されているときだけshowFormフラグをonにする
        if (!isRegistered.value) isShowForm.value = false
        // アップロードフラグをonにする
        isUploaded.value = true
        // Base64データをsrcに入れる
        uploadSrc.src = e.target.result
      }
    }

    // 削除ボタンクリック
    const remove = () => {
      isShowForm.value = true
    };

    // 削除キャンセルボタンクリック
    const removeCancel = () => {
      isShowForm.value = false
    }

    // アップロードをキャンセル
    const uploadCancel = () => {
      isUploaded.value = false
    }

    return {
      isRegistered,
      isRemoved,
      isShowForm,
      isUploaded,
      registeredData,
      remove,
      removeCancel,
      upload,
      uploadCancel,
      uploadSrc,
    }
  }
}
</script>


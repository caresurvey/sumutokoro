<template>
<input type="checkbox" id="AssociateSpotModalOpen" class="modal-toggle" v-model="modalOpen">
<div class="modal modal-bottom bg-black bg-opacity-50 sm:modal-middle">
  <div class="modal-box bg-white">
    <h3 class="font-bold text-lg flex items-center">
      関連事業所の追加
    </h3>
    <p class="py-4">
      関連付けたい事業所名を入力し、選択してください。
    </p>
    <div class="form-control mb-5">
      <div class="flex">
        <input type="text" placeholder="事業所名を入れてください" v-model="keyword" class="input input-bordered rounded-full rounded-r-lg w-full focus:outline-none focus:bg-white">
        <label class="btn rounded-l-lg rounded-full" @click="search" v-bind:class="{'btn-disabled': submitDisabled === true}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
        </label>
      </div>
    </div>

    <div class="bg-base-100 border border-gray-300 px-2 py-4 rounded-xl">
      <div class="text-sm space-y-1 h-[200px] overflow-y-auto">
        <ul v-if="!notFound">
          <li class="btn btn-sm mb-1 justify-between flex items-center cursor-pointer rounded-full" v-for="searchedList in searchedLists" :key="searchedList.id" @click="add(searchedList.id, searchedList.name)">
            {{searchedList.name}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </li>
        </ul>
        <div v-if="notFound" class="text-center flex items-center justify-center h-full">見つかりませんでした。</div>
      </div>
    </div>

      <div class="modal-action">
        <label for="AssociateSpotModalOpen"
               class="modal-cancel-btn btn btn-sm bg-gray-200 border-gray-300 text-gray-400 rounded-full hover:text-gray-600 hover:border-gray-400 hover:bg-gray-300 hover:text-white">閉じる</label>
      </div>
    </div>
  </div>

  <div class="px-4 py-2 bg-gray-100 border border-gray-200 rounded mb-5">
    <ul v-if="existsData" class="pt-2 px-2 pb-1">
      <li class="text-base flex items-center mb-1" v-for="spot in spots" :key="spot.id">
        {{spot.name}}
        <div class="tooltip tooltip-right" data-tip="この事業所の関連付けを解除する">
          <div class="removeBtn ml-2 cursor-pointer text-red-700" @click="remove(spot.id, spot.name)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
        </div>
      </li>
    </ul>
    <div v-if="!existsData">
      関連付けられた事業所はありません
    </div>
  </div>

  <div class="tooltip tooltip-top link link-hover link-primary" data-tip="事業所関連付けパネルを表示">
    <label for="AssociateSpotModalOpen" class="btn modal-button rounded-full btn-sm"><i
              class="fa-solid fa-circle-plus mr-2"></i>関連付ける事業所を追加</label>
  </div>

  <!-- サーバーサイドに送るspotId（複数） -->
  <input type="hidden" name="user[spots][]" v-for="spot in spots" :key="spot.id" v-bind:value="spot.id">

</template>


<script>
import axios from "axios"
import { ref, reactive, watch, computed } from 'vue'

export default {
  props: {
    path: {
      type: String,
      require: true
    },
    data: {
      type: String,
      require: true
    },
    user_id: {
      type: Number,
      require: true
    }
  },
  setup(props) {
    // 検索結果リストの定義
    const searchedLists = reactive([])

    // 検索キーワードの定義
    const keyword = ref([''])

    // 検索ボタン有効フラグの定義
    const submitDisabled = ref(true)

    // モーダルが開いているかどうかの定義
    const modalOpen = ref(false)

    // 事業所データ
    const spots = reactive([])

    // 検索が見つからなかった時のフラグ定義
    const notFound = ref(false)

    // 選択されているID
    const selectedIds = reactive([])

    // bladeからのデータを読み込む
    const readData = JSON.parse(props.data)
    const userId = props.user_id

    // bladeから読み込んだ配列をリアクティブの配列にセットし直す
    for (const key in readData) {
      spots.push(readData[key])
      selectedIds.push(readData[key].id)
    }

    // 検索ボタンクリック
    const search = () => {
      // 検索ボタンをOFFにする
      submitDisabled.value = true
      // データをAPIから取得
      getSearchData()
    };

    // データをAPIから取得
    const getSearchData = async () => {
      const url = props.path + '/admin/spot/keyword_selected/?keyword=' + keyword.value + '&selected=' + querySelectedIds.value
      const result = await axios.get(url)

      // 残っている検索結果をリセットする
      searchedLists.length = 0

      // データがあれば取得する
      if(result.data.length > 0) {
        // 見つからないフラグOFF
        notFound.value = false

        // 見つかった分だけ検索結果変数へ入れる
        for (let i = 0; i < result.data.length; i++) {
          searchedLists.push(result.data[i])
        }
      } else {
        // 見つからないフラグON
        notFound.value = true
      }
      // 検索ボタンをOFFにする
      submitDisabled.value = false
    };

    // 追加ボタンクリック
    const add = (id, name) => {

      // 追加分を配列に追加
      spots.push({'id': id, 'name': name})
      selectedIds.push(id)

      // 検索用の配列をコピー
      const tmpData = Object.assign({}, searchedLists);

      // 検索用の元配列を空にする
      searchedLists.length = 0

      // モーダルを閉じる
      modalOpen.value = false
    };

    // 削除ボタンクリック
    const remove = (id, name) => {

      // 配列をコピー
      const tmpData = Object.assign({}, spots);

      // 元の配列を空にする
      spots.length = 0
      selectedIds.length = 0

      // 元の配列にセットし直す
      for (const key in tmpData) {
        if(tmpData[key].id !== id) {
          spots.push(tmpData[key])
          selectedIds.push(tmpData[key].id)
        }
      }
    };

    // 選択中のデータがあるかどうか
    const existsData = computed(() => {
      if(spots.length > 0) {
        return true
      } else {
        return false
      }
    });

    // 選択中のidをクエリストリング用に加工
    const querySelectedIds = computed(() => {
      let query = ''
      for (const key in selectedIds) {
        query += String(selectedIds[key]) + '|'
      }
      return query.slice(0, -1)
    });

    watch(keyword, (value, oldValue) => {
      if(value !== '') {
        submitDisabled.value = false
      } else {
        submitDisabled.value = true
      }
    });

    return {
      add,
      spots,
      existsData,
      keyword,
      modalOpen,
      notFound,
      querySelectedIds,
      remove,
      submitDisabled,
      search,
      searchedLists,
      selectedIds,
    }
  }
}
</script>


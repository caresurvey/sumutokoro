<template>
  <input type="checkbox" id="AssociateCompanyModalOpen" class="modal-toggle" v-model="modalOpen">
  <div class="modal modal-bottom bg-black bg-opacity-50 sm:modal-middle">
    <div class="modal-box bg-white">
      <h3 class="font-bold text-lg flex items-center">
        関連法人の追加
      </h3>
      <p class="py-4">
        関連付けたい法人名を入力し、選択してください。
      </p>
      <div class="form-control mb-5">
        <div class="flex">
          <input type="text" placeholder="法人名を入れてください" v-model="keyword"
                 class="input input-bordered rounded-full rounded-r-lg w-full focus:outline-none focus:bg-white">
          <label class="btn rounded-l-lg rounded-full" @click="search"
                 v-bind:class="{'btn-disabled': submitDisabled === true}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
          </label>
        </div>
      </div>

      <div class="bg-base-100 border border-gray-300 px-2 py-4 rounded-xl">
        <div class="text-sm space-y-1 h-[200px] overflow-y-auto">
          <ul v-if="!notFound">
            <li class="btn btn-sm mb-1 justify-between flex items-center cursor-pointer rounded-full"
                v-for="searchedList in searchedLists" :key="searchedList.id"
                @click="add(searchedList.id, searchedList.name)">
              {{ searchedList.name }}
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </li>
          </ul>
          <div v-if="notFound" class="text-center flex items-center justify-center h-full">見つかりませんでした。</div>
        </div>
      </div>

      <div class="modal-action">
        <label for="AssociateCompanyModalOpen"
               class="modal-cancel-btn btn btn-sm bg-gray-200 border-gray-300 text-gray-400 rounded-full hover:text-gray-600 hover:border-gray-400 hover:bg-gray-300 hover:text-white">閉じる</label>
      </div>
    </div>
  </div>

  <div class="px-4 py-2 bg-gray-100 border border-gray-200 rounded mb-5">
    <ul>
      <li class="text-base flex items-center">
        {{ company.name }}
      </li>
    </ul>
  </div>
  <input type="hidden" name="spot[company_id]" v-bind:value="company.id">

  <div class="tooltip tooltip-top link link-hover link-primary" data-tip="法人関連付けパネルを表示">
    <label for="AssociateCompanyModalOpen" class="btn modal-button rounded-full btn-sm"><i
        class="fa-solid fa-circle-plus mr-2"></i>別な法人を関連付ける</label>
  </div>
</template>


<script>
import axios from "axios"
import {ref, reactive, watch} from 'vue'

export default {
  props: {
    path: {
      type: String,
      require: true
    },
    data: {
      type: String,
      require: true
    }
  },
  setup(props) {
    // 検索結果リストの定義
    const searchedLists = reactive([])

    // 検索キーワードの定義
    const keyword = ref()

    // 検索ボタン有効フラグの定義
    const submitDisabled = ref(true)

    // モーダルが開いているかどうかの定義
    const modalOpen = ref(false)

    // 検索が見つからなかった時のフラグ定義
    const notFound = ref(false)

    // bladeからのデータを読み込む
    const company = reactive(JSON.parse(props.data))

    // 検索ボタンクリック
    const search = () => {
      // 検索ボタンをOFFにする
      submitDisabled.value = true
      // データをAPIから取得
      getSearchData()
    };

    // データをAPIから取得
    const getSearchData = async () => {
      const url = props.path + '/admin/company/keyword/?keyword=' + keyword.value
      const result = await axios.get(url)
      searchedLists.length = 0
      if (result.data.length > 0) {
        // 見つからないフラグOFF
        notFound.value = false
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

      // データをセットし直し
      company.id = id
      company.name = name

      // モーダルを閉じる
      modalOpen.value = false
    };

    // キーワード入力画面監視
    watch(keyword, (value, oldValue) => {
      if (value !== '') {
        submitDisabled.value = false
      } else {
        submitDisabled.value = true
      }
    });

    return {
      add,
      company,
      keyword,
      modalOpen,
      notFound,
      submitDisabled,
      search,
      searchedLists,
    }
  }
}
</script>


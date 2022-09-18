<template>
  <section class="container mx-auto max-w-6xl px-6 sm:px-8 md:px-12">
    <div class="mb-5 text-sm font-medium text-center text-gray-500 border-b border-gray-200">
      <ul class="flex flex-wrap -mb-px">
        <li class="mr-2" @click="showGeneral" v-if="isGeneral">
          <a href="#" class="list-type-buttons inline-block p-4 border-b-2 border-primary text-primary">通常表示</a>
        </li>
        <li class="mr-2" @click="showGeneral" v-else>
          <a href="#" class="list-type-buttons inline-block p-4">通常表示</a>
        </li>
        <li class="mr-2" @click="showSimple" v-if="isSimple">
          <a href="#" class="list-type-buttons inline-block p-4 border-b-2 border-primary text-primary">シンプル表示</a>
        </li>
        <li class="mr-2" @click="showSimple" v-else>
          <a href="#" class="list-type-buttons inline-block p-4">シンプル表示</a>
        </li>
        <li class="mr-2" @click="showText" v-if="isText">
          <a href="#" class="list-type-buttons inline-block p-4 border-b-2 border-primary text-primary">テキスト表示</a>
        </li>
        <li class="mr-2" @click="showText" v-else>
          <a href="#" class="list-type-buttons inline-block p-4">テキスト表示</a>
        </li>
      </ul>
    </div>
  </section>
</template>


<script>
import {ref, computed} from 'vue'

export default {
  setup() {

    // 通常表示がONかどうか
    const isGeneral = ref(true)

    // シンプル表示がONかどうか
    const isSimple = ref(false)

    // テキスト表示がONかどうか
    const isText = ref(false)

    const showGeneral = () =>  {
      isGeneral.value = true
      isSimple.value = false
      isText.value = false
    };

    const showSimple = () => {
      isGeneral.value = false
      isSimple.value = true
      isText.value = false
    };

    const showText = () => {
      isGeneral.value = false
      isSimple.value = false
      isText.value = true
    };

    /*
    const showGeneral = computed(() => {
    });

    const showSimple = computed(() => {
    });

    const showText = computed(() => {
      if(isGeneral)
    });
*/

    return {
      isGeneral,
      isSimple,
      isText,
      showGeneral,
      showSimple,
      showText,
    }
  }
}
</script>


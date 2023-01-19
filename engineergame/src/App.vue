<template>
  <div>
    <!-- <router-view :result="result" @result="result_get"> -->
    <router-view>
    </router-view>
  </div>
</template>
<script setup>

import {reactive} from "vue"
import GameMain from './components/GameMain.vue'
let result = reactive({
    money:0,
    misyain:0,
    day:0,
    syain:0,
    jilv:0,
    keilv:0,
    kailv:0,
    kenlv:0,
    score:0
})

const result_get = (get_result) => {
    result=get_result;
}
</script>
<style scoped>
</style>
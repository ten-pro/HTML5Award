<template>
  <div>
    <router-view :result="result" @result="result_get"/>
  </div>
</template>
<script setup>
import {reactive} from "vue"
let result = reactive({
    money:0,
    misyain:0,
    day:0,
    syain:0,
    jilv:0,
    keilv:0,
    kailv:0,
    kenlv:0
})
const result_get = (result) => {
    result=result;
}
</script>
<style scoped>
</style>
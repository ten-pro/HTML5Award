<template>
    <div class="ninzu_area">
        <p class="p10">所属人数:{{ syozoku.nin }}人</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
let syozoku = reactive({
    nin:0
})
</script>
<style>
.ninzu_area{
    width:80vw;
    height: 9vh;
    margin: 2.5vh auto;
    padding: 0 5vw;
    background-color: white;
    opacity: 0.8;
}
</style>
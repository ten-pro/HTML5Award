<template>
    <div class="kaihatu_area">
        <p class="p8">開発部<br>Lv.{{ kaihatu.level }}</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
let kaihatu = reactive({
    level:0
})
</script>
<style>
.kaihatu_area{
    text-align: center;
    width:16vw;
    height: 12vh;
    margin: 0 3vw;
    padding: 0;
    background-color: white;
    opacity: 0.8;
}
</style>
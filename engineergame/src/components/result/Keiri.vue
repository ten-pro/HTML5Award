<template>
    <div class="keiri_area">
        <p class="p7">経理部<br>Lv.{{ keiri.level }}</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
let keiri = reactive({
    level:0
})
</script>
<style>
.keiri_area{
    text-align: center;
    width:16vw;
    height: 12vh;
    margin: 0 3vw;
    padding: 0;
    background-color: white;
    opacity: 0.8;
}

</style>
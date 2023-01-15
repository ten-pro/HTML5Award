<template>
    <div class="kaihatu_area">
        <p class="p8">開発部<br>Lv.{{ topstate.kaihatu_lev }}</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
const props = defineProps({
    topstate: Object,
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
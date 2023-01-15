<template>
    <div class="kenkou_area">
        <p class="p9">健康管理部<br>Lv.{{ topstate.kenkou_lev }}</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
const props = defineProps({
    topstate: Object,
}) 
</script>
<style>
.kenkou_area{
    text-align: center;
    width:18vw;
    height: 12vh;
    margin: 0 3vw;
    padding: 0;
    background-color: white;
    opacity: 0.8;
}

</style>
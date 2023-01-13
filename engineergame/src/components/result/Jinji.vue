<template>
    <div class="jinji_area">
        <p class="p6">人事部<br>Lv.{{jinji.level}}</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
let jinji = reactive({
    level:0
})
</script>
<style>
.jinji_area{
    text-align: center;
    width:16vw;
    height: 12vh;
    margin: 0 3vw;
    padding: 0 ;
    background-color: white;
    opacity: 0.8;
}

</style>
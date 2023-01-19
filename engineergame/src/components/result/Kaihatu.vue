<template>
    <div class="kaihatu_area">
        <p class="p8">開発部<br>Lv.{{ topstate.kailv }}</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
const props = defineProps({
    topstate: Object,
}) 
</script>
<style scoped>
.kaihatu_area{
    text-align: center;
    width:16vw;
    height: 12vh;
    margin: 0 3vw;
    padding: 0;
    background-color: white;
    border-radius: 20px;
    border: solid ;
}
</style>
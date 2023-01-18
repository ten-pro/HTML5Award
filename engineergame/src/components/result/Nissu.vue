<template>
    <div class="nissu_area">
        <p class="p4">経営日数:{{ topstate.nissu }}日</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
const props = defineProps({
    topstate: Object,
}) 
</script>
<style scoped>
.nissu_area{
    width:80vw;
    height: 9vh;
    margin: 2.5vh auto;
    padding: 0 5vw;
    background-color: white;
    opacity: 0.8;
}
</style>
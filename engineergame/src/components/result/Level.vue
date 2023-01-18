<template>
    <div class="level_area">
        <p class="p5">スコア:{{topstate.score}}</p>
    </div>
</template>
<script setup>
const props = defineProps({
    topstate: Object,
}) 
</script>
<style scoped>
.level_area{
    width:80vw;
    height: 9vh;
    margin: 2.5vh auto;
    padding: 0 5vw;
    background-color: white;
    opacity: 0.8;
}
p{
    margin: 0;
    text-align:center;
    padding:15px 0;
}
</style>
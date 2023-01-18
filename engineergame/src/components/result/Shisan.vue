<template>
    <div class="shisan_area">
        <p class="p2">資産:{{topstate.money}}万</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"

const props = defineProps({
    topstate: Object,
}) 
</script>
<style scoped>
.shisan_area{
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
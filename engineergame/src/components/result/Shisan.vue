<template>
    <div class="shisan_area">
        <p class="p2">資産:{{shisan.money}}万</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
let shisan = reactive({
    money:0
})
</script>
<style>
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
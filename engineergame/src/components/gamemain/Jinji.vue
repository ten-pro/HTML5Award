<template>
    <div class="jinji_area container">
        <p>LV{{ state.lv }}</p>
        <p class="busyo_name">人事部</p>
        <button class="button">↑</button>
        <button class="button">＋</button>
        <p class="syain_sum">所属：{{ state.syain_sum }}人</p>
        <p class="detail1">１週間ごとに{{ state.syain_sum }}人ずつ</p>
        <p class="detail2">社員が増える</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
let state = reactive({
    lv:1,
    syain_sum:0,
})
window.onload = function () {
    
}
const wide = () => {
}
</script>
<style scoped>
p{
    margin:auto;
    font-size:30px;
}
.busyo_name{
    font-size:50px;
}
.jinji_area{
    width:40vw;
    height:35vh;
    background-color: white;
    border: 5px solid #000000;
}
.container{
    display:grid;
    grid-template-rows: 25% 25% 25% 25%;
    grid-template-columns: 25% 50% 12.5% 12.5%;
}
.button{
    width:40px;
    height:40px;
    margin:auto;
    border-radius: 50%;
}
.syain_sum{
    grid-row: 2/3;
    grid-column: 2/3;
}
.detail1{
    grid-row:3/4;
    grid-column: 1/5;
}
.detail2{
    grid-row:4/5;
    grid-column: 1/5;
}
</style>

<template>
    <div class="jinji_area container">
        <p>LV{{ state.lv }}</p>
        <p class="busyo_name">人事部</p>
        <button class="button">↑</button>
        <button class="button">＋</button>
        <p class="syain_sum">所属：{{ state.syain_sum }}人</p>
        <p class="detail1">１週間ごとに{{ state.next }}人ずつ</p>
        <p class="detail2">社員が増える{{ topstate.nowday }}</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
let state = reactive({
    lv:1,
    syain_sum:0,
    next:1,
})
const props = defineProps({
    topstate: Object
})
</script>
<style scoped>
p{
    margin:auto;
    font-size:2vw;
}
.busyo_name{
    font-size:3vw;
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
    width:3vw;
    height:3vw;
    font-size:1.5vw;
    margin:auto;
    border-radius: 20%;
    color:#ffffff;
    background-color: #00abc5;
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
    margin-top:0px;
}
</style>

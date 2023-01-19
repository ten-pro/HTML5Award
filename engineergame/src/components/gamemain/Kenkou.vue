<template>
    <div class="kenkou_area container">
        <p>LV{{ state.lv }}</p>
        <p class="busyo_name">健康管理部</p>

        <!-- 1 @clickでlvupファンクションを実行 -->
        <button class="button flex_column" @click="lvup"><p class="top_moji">LV</p><p class="bottom_moji">UP</p></button>
        <button class="button" @click="addsyain"><img class="img_syain" src="../PNG/syain.png"><p class="plus">＋</p></button>
        <p class="syain_sum">所属：{{ state.syain_sum }}人</p>
        <p class="price">-{{ state.price - Math.floor(state.price*props.keiri_state.next) }}万円</p>
        <p class="detail1">バックレる確率{{ Math.floor(state.next*100) }}％減少(現在{{ Math.floor(state.percent*100) }}％)</p>
        <p class="detail2">病気になる確率{{ Math.floor(state.next*100) }}％減少(現在{{ Math.floor(state.percent*100) }}％)</p>
    </div>
</template>
<script setup>
import {reactive,watch} from "vue"
import swal from 'sweetalert';
let state = reactive({
    lv:1,
    syain_sum:0,
    next:0,
    price:100,
    percent:0.5,
})
const props = defineProps({
    topstate: Object,
    keiri_state:Object,
})

const lvup = () => {
    if(props.topstate.money>=100*state.lv){
        state.price=100*state.lv;
        state.lv++;
        if(Math.floor((0.03*state.syain_sum+0.01*(state.lv-1))*1000)/1000<0.5){
            state.next=Math.floor((0.03*state.syain_sum+0.01*(state.lv-1))*1000)/1000;
        }else{
            state.next=0;
        }
        state.percent=0.5-state.next;
        //2 kenkou_lvupという設定している名前とstateの値でemitsを実行
        emits("kenkou_lvup", state) 
    }else{
        swal("資産が足りません","","error")
    }
}
const addsyain = () => {
    if(props.topstate.misyain>0){
        state.syain_sum++;
        if(Math.floor((0.03*state.syain_sum+0.01*(state.lv-1))*1000)/1000>=0){
            state.next=Math.floor((0.03*state.syain_sum+0.01*(state.lv-1))*1000)/1000;
        }else{
            state.next=0;
        }
        state.percent=0.5-state.next;
        emits("kenkou_addsyain", state) 
    }else{
        swal("未所属社員が0名です","","error")
    }
}


const emits = defineEmits([
    //3 kenkou_lvupという名前でemitsが呼ばれると発火し、親側に値を送信
    "kenkou_lvup",
    "kenkou_addsyain"
]) 

watch(
  () => state.syain_sum,
  (sum, prevSum) => {
    state.next=Math.floor((0.03*state.syain_sum+0.01*(state.lv-1))*1000)/1000;
  }
)
</script>
<style scoped>
p{
    margin:auto;
    font-size:2vw;
}
.busyo_name{
    font-size:3vw;
}
.kenkou_area{
    width:40vw;
    height:35vh;
    background-color: white;
    border: 5px solid #000000;
}
.container{
    display:grid;
    position:relative;
    grid-template-rows: 25% 25% 25% 25%;
    grid-template-columns: 25% 50% 12.5% 12.5%;
}
.button{
    position: relative;
    width:3vw;
    height:3vw;
    font-size:1.5vw;
    margin:auto;
    border-radius: 20%;
    color:#ffffff;
    background-color: #00abc5;
}
.flex_column{
    display: flex;
    flex-direction: column;
}
.syain_sum{
    grid-row: 2/3;
    grid-column: 2/3;
}
.price{
    position:absolute;
    grid-row:2/3;
    grid-column:3/5;
    color:red;
    font-size:1.5vw;
    top:0px;
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
.img_syain{
    width: 70%;
    margin: 0.7vw auto;
}
.plus{
    position: absolute;
    top:-0.5vw;
    left:1.3vw;
    font-size: 1.5vw;
}
.top_moji{
    font-size: 1.2vw;
}
.bottom_moji{
    font-size: 1.2vw;
}
</style>

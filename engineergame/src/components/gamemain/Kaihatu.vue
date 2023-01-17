<template>
    <div class="kaihatu_area container">
        <p>LV{{ state.lv }}</p>
        <p class="busyo_name">開発部</p>

        <!-- 1 @clickでlvupファンクションを実行 -->
        <button class="button" @click="lvup">↑</button>
        <button class="button" @click="addsyain">＋</button>
        <p class="syain_sum">所属：{{ state.syain_sum }}人</p>
        <p class="price">-{{ state.price - Math.floor(state.price*props.keiri_state.next) }}万円</p>
        <p class="detail1">１週間ごとに{{ state.next }}工数ずつ進む</p>
        <p class="detail2">(小数点以下は確率に変換)</p>
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
    kousuu:10,
})
const props = defineProps({
    topstate: Object,
    keiri_state:Object,
    kenkou_state:Object,
    kaihatu_state:Object,
})

const lvup = () => {
    if(props.topstate.money>=100*state.lv){
        state.price=100*state.lv - Math.floor(100*state.lv*props.keiri_state.next);
        state.lv++;
        //1人分の10工数×所属社員人数×今の部署レベル
        state.next=Math.floor(state.kousuu*state.syain_sum*(0.9+0.1*state.lv)*100)/100

        //2 kaihatu_lvupという設定している名前とstateの値でemitsを実行
        emits("kaihatu_lvup", state) 
    }else{
        swal("資産が足りません","","error")
    }
}
const addsyain = () => {
    if(props.topstate.misyain>0){
        state.syain_sum++;
        state.next=Math.floor(state.kousuu*state.syain_sum*(0.9+0.1*state.lv)*100)/100
        emits("kaihatu_addsyain", state) 
    }else{
        swal("未所属社員が0名です","","error")
    }
}

//state.syain_sumを監視
watch(
  () => state.syain_sum,
  (sum, prevSum) => {
    state.next=Math.floor(state.kousuu*state.syain_sum*(0.9+0.1*state.lv)*100)/100;
  }
)
watch(
  () => state.kousuu,
  (sum, prevSum) => {
    state.next=Math.floor(state.kousuu*state.syain_sum*(0.9+0.1*state.lv)*100)/100;
  }
)


const emits = defineEmits([
    //3 kaihatu_lvupという名前でemitsが呼ばれると発火し、親側に値を送信
    "kaihatu_lvup",
    "kaihatu_addsyain"
]) 
</script>
<style scoped>
p{
    margin:auto;
    font-size:2vw;
}
.busyo_name{
    font-size:3vw;
}
.kaihatu_area{
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
</style>

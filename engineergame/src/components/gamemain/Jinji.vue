<template>
    <div class="jinji_area container">
        <p>LV{{ state.lv }}</p>
        <p class="busyo_name">人事部</p>

        <!-- 1 @clickでlvupファンクションを実行 -->
        <button class="button" @click="lvup">↑</button>
        <button class="button" @click="addsyain">＋</button>
        <p class="syain_sum">所属：{{ state.syain_sum }}人</p>
        <p class="detail1">１週間ごとに{{ state.next }}人ずつ</p>
        <p class="detail2">社員が増える(小数点以下は確率に変換)</p>
    </div>
</template>
<script setup>
import {reactive} from "vue"
import swal from 'sweetalert';
let state = reactive({
    lv:1,
    syain_sum:0,
    next:0,
})
const props = defineProps({
    topstate: Object,
    
})

const lvup = () => {
    state.lv++;
    //1人分のスカウト0.5人×所属社員人数×今の部署レベル
    state.next=Math.floor(0.5*state.syain_sum*(0.9+0.1*state.lv)*100)/100
    //2 jinji_lvupという設定している名前とstateの値でemitsを実行
    emits("jinji_lvup", state) 
}
const addsyain = () => {
    if(props.topstate.misyain>0){
        state.syain_sum++;
        state.next=Math.floor(0.5*state.syain_sum*(0.9+0.1*state.lv)*100)/100
        emits("jinji_addsyain", state) 
    }else{
        swal("未所属社員が0名です","","error")
    }
}


const emits = defineEmits([
    //3 jinji_lvupという名前でemitsが呼ばれると発火し、親側に値を送信
    "jinji_lvup",
    "jinji_addsyain"
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

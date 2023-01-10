
<template>
    <div>
        <div class="states">
            <div class="tate">
                <p>資産</p>
                <p>{{ state.money }}万円</p>
            </div>
            <div class="tate">
                <p>未所属社員</p>
                <p>{{ state.misyain }}人</p>
            </div>
            <div class="tate">
                <p>工数</p>
                <p>{{ state.nowkousuu }}/{{state.maxkousuu}}</p>
            </div>
            <div class="tate">
                <p>案件納期</p>
                <p>残り{{ state.nouki }}日</p>
            </div>
            <div class="tate">
                <p>{{ state.nowday }}日目</p>
            </div>
        </div>
        <div class="busyo">
            <Jinji />
            <Kaihatu />
        </div>
        <div class="busyo">
            <Keiri />
            <Kenkou />
        </div>
    </div>
</template>
<script setup>
import {reactive} from "vue"
import Jinji from './gamemain/Jinji.vue'
import Kaihatu from './gamemain/Kaihatu.vue'
import Keiri from './gamemain/Keiri.vue'
import Kenkou from './gamemain/Kenkou.vue'
let timeoutId;
let state = reactive({
    money:0,
    misyain:0,
    nouki:0,
    nowkousuu:0,
    maxkousuu:0,
    nowday:0,
    nowanken:0,//noukiとkousuuの配列とリンクしている変数
})

//難易度別初期ステ
let startstates = reactive([
    {money:1000,syain:8}
])

let nouki = reactive([
    7,21,49,77,105,140,175,231,287,365
])
let kousuu = reactive([
    20,60,160,240,360,500,1000,2000
])
let housyuu = reactive([
    200,500,1000,1500,2500,4000,6500,10000,15000,30000
])
const setupfunk = () => {
    state.money=startstates[0].money;
    state.misyain=startstates[0].syain;
    state.maxkousuu=kousuu[state.nowanken];
    state.nouki=nouki[state.nowanken]-state.nowday;
    setTimeout(intervalCallback, 5 * 1000);
}
const intervalCallback=()=> {
    state.nowday++;
    state.nouki--;
    if(state.nowday%7==0){
        state.misyain+=1;
        state.nowkousuu+=1000;
    }
    if(state.nouki==0){
        if(state.nowkousuu>=state.maxkousuu){
            state.money+=housyuu[state.nowanken];
            state.nowanken++;
            state.nowkousuu=0;
            state.maxkousuu=kousuu[state.nowanken];
            state.nouki=nouki[state.nowanken];
        }
    }
    timeoutId = setTimeout(intervalCallback, 5 * 1000);
}
setupfunk();
// intervalCallback();
//ここまでが読み込み時の設定




const timeclear = () => {
    clearTimeout(timeoutId);
}
</script>

<style scoped>
.states{
    display: flex;
    justify-content: center;
    width:80vw;
    height: 15vh;
    margin: 2.5vh auto;
    padding: 0 5vw;
    border: 5px solid #000000;
    background-color: white;
    gap:5vw;
}
p{
    margin:auto;
    font-size:4.5vmin;
}
.busyo{
    display: flex;
    justify-content: center;
    gap:5vw;
    margin-bottom:2.5vh;
}
.tate{
    display: flex;
    flex-flow: column;
}
</style>

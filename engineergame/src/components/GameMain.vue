
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
                <p class="bunsuu">{{ state.nowkousuu }}/{{state.maxkousuu}}</p>
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
            <!-- 4 jinji_lvup(左)という名前の子コンポーネントのemitsを受け取り、jinji_lvup(右)という関数を実行 -->
            <Jinji :topstate="state" @jinji_lvup="jinji_lvup" @jinji_addsyain="jinji_addsyain"/>
            <Kaihatu :topstate="state" @kaihatu_lvup="kaihatu_lvup" @kaihatu_addsyain="kaihatu_addsyain"/>
        </div>
        <div class="busyo">
            <Keiri :topstate="state" @keiri_lvup="keiri_lvup" @keiri_addsyain="keiri_addsyain"/>
            <Kenkou :topstate="state" @kenkou_lvup="kenkou_lvup" @kenkou_addsyain="kenkou_addsyain"/>
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
let jinji_state = reactive({
    lv:1,
    syain_sum:0,
    next:1,
})
let kaihatu_state = reactive({
    lv:1,
    syain_sum:0,
    next:1,
})
let keiri_state = reactive({
    lv:1,
    syain_sum:0,
    next:1,
})
let kenkou_state = reactive({
    lv:1,
    syain_sum:0,
    next:1,
})
//難易度別初期ステ
let startstates = reactive([
    {money:1000,syain:8}
])

let nouki = reactive([
    7,21,49,77,105,140,175,231,287,365
])
let kousuu = reactive([
    20,60,160,240,360,500,1000,2000,4000,10000
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
    if(state.nowday%7==0 && state.nowday!=0){
        let addnin=0.5*jinji_state.syain_sum*(0.9+0.1*jinji_state.lv)
        let random=0;
        if(Math.random() * 1 <= addnin%1){
            random=1;
        }
        state.misyain+=Math.floor(addnin)+1*random;
        console.log(addnin)
        state.nowkousuu+=1000;
    }
    if(state.nouki==0){
        if(state.nowkousuu>=state.maxkousuu){
            state.money+=housyuu[state.nowanken];
            if(state.nowday==365){
                //１年たった時の処理
            }else{
                state.nowanken++;
                state.nowkousuu=0;
                state.maxkousuu=kousuu[state.nowanken];
                state.nouki=nouki[state.nowanken]-state.nowday;
            }
        }
    }
    timeoutId = setTimeout(intervalCallback, 5 * 1000);
}
setupfunk();
//ここまでが読み込み時の設定

//5 emitsで受け取った値をjinjiという変数に入れてなんやかんやする
const jinji_lvup = (jinji) => {
    jinji_state.lv=jinji.lv;
}
const jinji_addsyain = (jinji) => {
    jinji_state=jinji;
    state.misyain--;
}

const kaihatu_lvup = (kaihatu) => {
    kaihatu_state.lv=kaihatu.lv;
}
const kaihatu_addsyain = (kaihatu) => {
    kaihatu_state=kaihatu;
    state.misyain--;
}

const keiri_lvup = (keiri) => {
    keiri_state.lv=keiri.lv;
}
const keiri_addsyain = (keiri) => {
    keiri_state=keiri;
    state.misyain--;
}

const kenkou_lvup = (kenkou) => {
    kenkou_state.lv=kenkou.lv;
}
const kenkou_addsyain = (kenkou) => {
    kenkou_state=kenkou;
    state.misyain--;
}

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
    gap:4vw;
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


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
            <Jinji :topstate="state" :keiri_state="keiri_state" :kenkou_state="kenkou_state" @jinji_lvup="jinji_lvup" @jinji_addsyain="jinji_addsyain"/>
            <Kaihatu :topstate="state" :kaihatu_state="kaihatu_state" :keiri_state="keiri_state" :kenkou_state="kenkou_state" @kaihatu_lvup="kaihatu_lvup" @kaihatu_addsyain="kaihatu_addsyain"/>
        </div>
        <div class="busyo">
            <Keiri :topstate="state" :kenkou_state="kenkou_state" @keiri_lvup="keiri_lvup" @keiri_addsyain="keiri_addsyain"/>
            <Kenkou :topstate="state" :keiri_state="keiri_state" @kenkou_lvup="kenkou_lvup" @kenkou_addsyain="kenkou_addsyain"/>
        </div>
        <button @click="open">表示</button>
        <teleport to="body">
        <div class="modal" id="sample-modal" v-show="state.isVisible" @click="close"></div>
        <div class="modal-content" v-show="state.isVisible">
            <p>{{ state.noweventtitle }}</p>
            <p>{{ state.noweventmessage }}</p>
        </div>
        </teleport>
    </div>
</template>
<script setup>
import {reactive} from "vue"
import Jinji from './gamemain/Jinji.vue'
import Kaihatu from './gamemain/Kaihatu.vue'
import Keiri from './gamemain/Keiri.vue'
import Kenkou from './gamemain/Kenkou.vue'
let timeoutId;
let bakkure=0;
let byouki=0;
let state = reactive({
    money:0,
    misyain:0,
    nouki:0,
    nowkousuu:0,
    maxkousuu:0,
    nowday:0,
    nowanken:0,//noukiとkousuuの配列とリンクしている変数
    isVisible:false,
    nowevent:0,
    eventstate:false,
    noweventtitle:"",
    noweventmessage:"",
})
let jinji_state = reactive({
    lv:1,
    syain_sum:0,
    next:0,
    price:100,
})
let kaihatu_state = reactive({
    lv:1,
    syain_sum:0,
    next:0,
    price:100,
})
let keiri_state = reactive({
    lv:1,
    syain_sum:0,
    next:0,
    price:100,
})
let kenkou_state = reactive({
    lv:1,
    syain_sum:0,
    next:0,
    price:100,
    percent:0.5,
})
//難易度別初期ステ
let startstates = reactive([
    {money:100000000,syain:8}
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
let badeventtitle = reactive([
    "大バックレ騒動","変異ウイルス流行","大円安","機材トラブル"
])
let badeventmessage = reactive([
    "全部署の所属社員が、５割り減る","開発部の５割りが、病気にかかる","費用が大幅に増え、資産の５割りが減る","機材トラブルが起こり、工数進捗５割り減(永続)"
])
let goodeventtitle = reactive([
    "会社評価急上昇","社員心機一転","大円高","最新機種導入"
])
let goodeventmessage = reactive([
    "全部署の所属社員が、５割り増える","開発部の工数が、５割り増し","収入が大幅に増え、資産が１．５倍になる","機材トラブルが起こり、工数進捗5割り増し(永続)"
])
let eventvalue = reactive([
    0.5,0.5,0.5,0.5
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
    timeoutId = setTimeout(intervalCallback, 5 * 1000);
    if(state.nowday%7==0 && state.nowday!=0){
        let addnin=0.5*jinji_state.syain_sum*(0.9+0.1*jinji_state.lv)
        let random=0;
        if(Math.random() * 1 <= addnin%1){
            random=1;
        }
        state.misyain+=Math.floor(addnin)+1*random;
        //バックレと病気の確率
        state.nowkousuu+=kaihatu_state.next - 10*(byouki);
        byouki=0;
        bakkure=0;
        for(let i=0;i<kaihatu_state.syain_sum;i++){
            if(Math.random() * 1 <= kenkou_state.percent){
                bakkure++;
            }else if(Math.random() * 1 <= kenkou_state.percent){
                byouki++;
            }
        }
        kaihatu_state.syain_sum-=bakkure;
        swal("開発部の社員がブラックすぎて"+bakkure+"人バックレた！！","バックレた人はもう戻ってこないぞ","error")
        .then(()=>{
            swal("開発部の社員がブラックすぎて"+byouki+"人病気にかかった！！","病気になった人の分１週間工数が増えないぞ","error");
        });
    }
    if(state.nouki==0){
        if(state.nowkousuu>=state.maxkousuu){
            state.money+=housyuu[state.nowanken]+Math.floor(housyuu[state.nowanken]*keiri_state.next);
            if(state.nowday==365){
                //クリア時の処理
                swal("１年間経営クリア！","リザルト画面へ","success")
            }else{
                state.nowanken++;
                state.nowkousuu=0;
                state.maxkousuu=kousuu[state.nowanken];
                state.nouki=nouki[state.nowanken]-state.nowday;
            }
        }else{
            timeclear();
            swal("ゲームオーバー！","リザルト画面へ","error")
        }
    }
    // if(Math.random() * 1 <= 0.05){
    //     state.nowevent = Math.floor(Math.random() * (goodeventtitle.length - 1));
    //     if(Math.random() * 1 <= 0.5){
    //         //いいイベント
    //         state.eventstate=true;
    //     }else{
    //         //悪いイベント
    //         state.eventstate=false;
    //     }
        eventfunk();
    // }
}
setupfunk();
//ここまでが読み込み時の設定

const eventfunk=()=>{
    //イベント作成から
    switch(state.nowevent){
        case 0:

        break;

        case 1:

        break;

        case 2:

        break;

        case 3:

        break;
    }
    state.noweventtitle=goodeventtitle[0];
    state.noweventmessage=goodeventmessage[0];
    state.isVisible=true;
}


//5 emitsで受け取った値をjinjiという変数に入れてなんやかんやする
const jinji_lvup = (jinji) => {
    jinji_state=jinji;
    state.money-=jinji_state.price;
    jinji_state.price+=100;
}
const jinji_addsyain = (jinji) => {
    jinji_state=jinji;
    state.misyain--;
}

const kaihatu_lvup = (kaihatu) => {
    kaihatu_state=kaihatu;
    state.money-=kaihatu_state.price;
    kaihatu_state.price+=100;
}
const kaihatu_addsyain = (kaihatu) => {
    kaihatu_state=kaihatu;
    state.misyain--;
}

const keiri_lvup = (keiri) => {
    keiri_state=keiri;
    state.money-=keiri_state.price;
    keiri_state.price+=100;
}
const keiri_addsyain = (keiri) => {
    keiri_state=keiri;
    state.misyain--;
}

const kenkou_lvup = (kenkou) => {
    kenkou_state=kenkou;
    state.money-=kenkou_state.price;
    kenkou_state.price+=100;
}
const kenkou_addsyain = (kenkou) => {
    kenkou_state=kenkou;
    state.misyain--;
}

const timeclear = () => {
    clearTimeout(timeoutId);
}
const open =()=> {
    state.isVisible=!state.isVisible;
    console.log(state.isVisible)
}
const close=()=>{
    state.isVisible=!state.isVisible;
    console.log(state.isVisible)
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

.modal{
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: rgba(0,0,0,.5);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.modal-content{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(0,0,0,.5);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: white;
  width: 600px;
  height: auto;
  border-radius: 20px;
  padding: 20px;
}
</style>

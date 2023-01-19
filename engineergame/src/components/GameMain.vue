
<template>
    <div ref="fullscreen" class="gamemain">
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
                <p class="margin_auto">{{ state.nowday }}日目</p>
            </div>
            <div class="remote_controller">
                <div class="tate">
                    <img src="./PNG/stop.png" class="remote_img" @click="timeclear">
                    <div class="rerative">
                        <img src="./PNG/fast.png" class="remote_img" @click="remote_three">
                        <p class="remote_naka" @click="remote_three">3</p>
                    </div>
                    <div class="rerative">
                        <img src="./PNG/fast.png" class="remote_img" @click="remote_five">
                        <p class="remote_naka" @click="remote_five">5</p>
                    </div>
                </div>
                <div class="tate">
                    <p class="remote_moji">状態</p>
                    <p class="remote_moji">{{state.nowstate}}</p>
                </div>
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
        <img v-show="state.nowimg==0" src="./PNG/wide.png" @click="wide" class="fullscreen">
        <img v-show="state.nowimg==1" src="./PNG/small.png" @click="wide" class="fullscreen">
        <teleport to="body">
        <div class="modal" id="sample-modal" v-show="state.isVisible" @click="close"></div>
        <div class="modal-content" :class="{ 'good': state.goodcss, 'bad': state.badcss }" v-show="state.isVisible">
            <img class="updown" v-if="state.eventstate" src="./PNG/up.png">
            <img class="updown" v-else src="./PNG/down.png">
            <p class="eventtitle">！イベント発生！</p>
            <p class="eventtitle">{{ state.noweventtitle }}</p>
            <p class="eventmessage">{{ state.noweventmessage }}</p>
            <!-- <p class="updown" v-if="state.eventstate">↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑</p>
            <p class="updown" v-else >↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓</p> -->
        </div>
        </teleport>
    </div>
</template>
<script setup>
import {reactive,ref} from "vue"
import axios from "axios"
import Jinji from './gamemain/Jinji.vue'
import Kaihatu from './gamemain/Kaihatu.vue'
import Keiri from './gamemain/Keiri.vue'
import Kenkou from './gamemain/Kenkou.vue'
let timeoutId;
let bakkure=0;
let byouki=0;
const fullscreen=ref(null)
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
    goodcss:false,
    badcss:false,
    img:"./PNG/wide.png",
    nowimg:0,
    nowsec:5,
    startstop:true,
    nowstate:"5秒",
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
    kousuu:10,
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
    {money:1000,syain:8}
])
let result_state = reactive({
    money:0,
    misyain:0,
    day:0,
    syain:0,
    jilv:0,
    keilv:0,
    kailv:0,
    kenlv:0
})
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
    "全部署の所属社員が、５割り増える","開発部の工数が、５割り増し","収入が大幅に増え、資産が１．５倍になる","最新設備になり、工数進捗5割り増し(永続)"
])
const setupfunk = () => {
    state.money=startstates[0].money;
    state.misyain=startstates[0].syain;
    state.maxkousuu=kousuu[state.nowanken];
    state.nouki=nouki[state.nowanken]-state.nowday;
    timeoutId=setTimeout(intervalCallback, state.nowsec * 1000);
}
const intervalCallback=()=> {
    state.nowday++;
    state.nouki--;
    timeoutId = setTimeout(intervalCallback, state.nowsec * 1000);
    if(state.nowday%7==0 && state.nowday!=0){
        let addnin=0.5*jinji_state.syain_sum*(0.9+0.1*jinji_state.lv)
        let random=0;
        if(Math.random() * 1 <= addnin%1){
            random=1;
        }
        state.misyain+=Math.floor(addnin)+1*random;
        //バックレと病気の確率
        state.nowkousuu+=kaihatu_state.next - kaihatu_state.kousuu*(byouki);
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
                timeclear();
                // emits("result", result_state)
                localStorage.setItem("money",state.money);
                localStorage.setItem("misyain",state.misyain);
                localStorage.setItem("day",state.nowday);
                localStorage.setItem("syain",jinji_state.syain_sum+kaihatu_state.syain_sum+keiri_state.syain_sum+kenkou_state.syain_sum);
                localStorage.setItem("jilv",jinji_state.lv);
                localStorage.setItem("keilv",kaihatu_state.lv);
                localStorage.setItem("kailv",keiri_state.lv);
                localStorage.setItem("kenlv",kenkou_state.lv);
                localStorage.setItem("score",Math.floor(state.money+(state.misyain+jinji_state.syain_sum+kaihatu_state.syain_sum+keiri_state.syain_sum+kenkou_state.syain_sum)*10+state.nowday*100))
                axios
                    .post('https://mp-class.chips.jp/engineergame/Clearmain.php', {
                        user_id: sessionStorage.getItem("id"),
                        clear_time: state.nowday,
                        clear_emplyee: state.misyain+jinji_state.syain_sum+kaihatu_state.syain_sum+keiri_state.syain_sum+kenkou_state.syain_sum,
                        clear_money: state.money,
                        clear_score: Math.floor(state.money+(state.misyain+jinji_state.syain_sum+kaihatu_state.syain_sum+keiri_state.syain_sum+kenkou_state.syain_sum)*10+state.nowday*100),
                        create_clear_infomation: ''
                    }, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function (res) {
                        swal("１年間経営クリア！","リザルト画面へ","success")
                        .then(()=>{
                            location.href="/Result"
                        });
                    })
            }else{
                state.nowanken++;
                state.nowkousuu=0;
                state.maxkousuu=kousuu[state.nowanken];
                state.nouki=nouki[state.nowanken]-state.nowday;
            }
        }else{
            timeclear();
            // emits("result", result_state)
            localStorage.setItem("money",state.money);
            localStorage.setItem("misyain",state.misyain);
            localStorage.setItem("day",state.nowday);
            localStorage.setItem("syain",jinji_state.syain_sum+kaihatu_state.syain_sum+keiri_state.syain_sum+kenkou_state.syain_sum);
            localStorage.setItem("jilv",jinji_state.lv);
            localStorage.setItem("keilv",kaihatu_state.lv);
            localStorage.setItem("kailv",keiri_state.lv);
            localStorage.setItem("kenlv",kenkou_state.lv);
            localStorage.setItem("score",Math.floor(state.money+(state.misyain+jinji_state.syain_sum+kaihatu_state.syain_sum+keiri_state.syain_sum+kenkou_state.syain_sum)*10+state.nowday*100))
            axios
                .post('https://mp-class.chips.jp/engineergame/Clearmain.php', {
                    user_id: sessionStorage.getItem("id"),
                    clear_time: state.nowday,
                    clear_emplyee: state.misyain+jinji_state.syain_sum+kaihatu_state.syain_sum+keiri_state.syain_sum+kenkou_state.syain_sum,
                    clear_money: state.money,
                    clear_score: Math.floor(state.money+(state.misyain+jinji_state.syain_sum+kaihatu_state.syain_sum+keiri_state.syain_sum+kenkou_state.syain_sum)*10+state.nowday*100),
                    create_clear_infomation: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (res) {
                    console.log(res)
                    swal("ゲームオーバー！","リザルト画面へ","error")
                    .then(()=>{
                        location.href="/Result"
                    });
                })
        }
    }
    if(Math.random() * 1 <= 0.05){
        state.nowevent = Math.floor(Math.random() * goodeventtitle.length);
        if(Math.random() * 1 <= 0.5){
            //いいイベント
            state.eventstate=true;
        }else{
            //悪いイベント
            state.eventstate=false;
        }
        eventfunk();
    }
}
setupfunk();
//ここまでが読み込み時の設定

const eventfunk=()=>{
    if(state.eventstate==true){
        state.goodcss=true;
        state.badcss=false;
        switch(state.nowevent){
            case 0:
                jinji_state.syain_sum=Math.round(jinji_state.syain_sum*1.5);
                kaihatu_state.syain_sum=Math.round(jinji_state.syain_sum*1.5);
                keiri_state.syain_sum=Math.round(jinji_state.syain_sum*1.5);
                kenkou_state.syain_sum=Math.round(jinji_state.syain_sum*1.5);
            break;

            case 1:
                state.nowkousuu=Math.round(state.nowkousuu*1.5);
            break;

            case 2:
                state.money=Math.round(state.money*1.5);
            break;

            case 3:
                kaihatu_state.kousuu=Math.round(kaihatu_state.kousuu*1.5)
            break;
        }
        state.noweventtitle=goodeventtitle[state.nowevent];
        state.noweventmessage=goodeventmessage[state.nowevent];
        state.isVisible=true;
    }else{
        state.goodcss=false;
        state.badcss=true;
        switch(state.nowevent){
            case 0:
                jinji_state.syain_sum=Math.round(jinji_state.syain_sum*0.5);
                kaihatu_state.syain_sum=Math.round(jinji_state.syain_sum*0.5);
                keiri_state.syain_sum=Math.round(jinji_state.syain_sum*0.5);
                kenkou_state.syain_sum=Math.round(jinji_state.syain_sum*0.5);
            break;

            case 1:
                state.nowkousuu=Math.round(state.nowkousuu*0.5);
            break;

            case 2:
                state.money=Math.round(state.money*0.5);
            break;

            case 3:
                kaihatu_state.kousuu=Math.round(kaihatu_state.kousuu*0.5)
            break;
        }
        state.noweventtitle=badeventtitle[state.nowevent];
        state.noweventmessage=badeventmessage[state.nowevent];
        state.isVisible=true;
    }
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
    state.nowstate="停止";
    clearTimeout(timeoutId);
    state.startstop=false;
}
const remote_three=()=>{
    state.nowstate="3秒"
    state.nowsec=3;
    if(state.startstop==false){
        timeoutId=setTimeout(intervalCallback, state.nowsec * 1000);
        state.startstop=true;
    }
}
const remote_five=()=>{
    state.nowstate="5秒"
    state.nowsec=5;
    if(state.startstop==false){
        timeoutId=setTimeout(intervalCallback, state.nowsec * 1000);
        state.startstop=true;
    }
}
const close=()=>{
    state.isVisible=!state.isVisible;
}
const wide=()=>{
    if(state.nowimg==0){
        state.nowimg=1;
        fullscreen.value.requestFullscreen()
    }else{
        state.nowimg=0;
        document.exitFullscreen()
    }
}
const emits = defineEmits([
    "result",
]) 
</script>

<style scoped>
.gamemain{
    background-image: url("./PNG/background.png");
    background-size: 100vw 100vh;
}
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
    margin:0px;
    /* font-size:4.5vmin; */
    font-size: 2.5vw;
}
.margin_auto{
    margin: auto;
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
    align-items: center;
    justify-content: center;
    height: 100%;
}
.remote_controller{
    display: flex;
    gap:1vw;
}
.remote_img{
    width:2vw;
    cursor:pointer;
}
.remote_moji{
    font-size: 1.5vw;
}
.rerative{
    position: relative;
    height:2vw;
}
.remote_naka{
    position:absolute;
    top:0.4vw;
    left:0.7vw;
    color:white;
    font-size: 0.8vw;
    cursor:pointer;
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
  z-index:1;
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
  width: 60vw;
  height: 70vh;
  border-radius: 20px;
  border: 5px solid #000000;
  z-index:2;
}
.eventtitle{
    font-size: 3vw;
    font-weight: bold;
    color: white;
    background-color: transparent;
    text-shadow: none;
    -webkit-text-stroke: 0.15vw red;
    text-shadow: 0 0 2vw red;
    z-index:4;
}
.eventmessage{
    color: white;
    -webkit-text-stroke: 0.15vw black;
    font-weight: bold;
    font-size: 3vw;
    z-index:4;
}
.updown{
    position:absolute;
    margin:auto;
    height: 50vh;
    opacity: 0.3;
    z-index:3;
}
.good{
  background: rgb(255,255,255);
  background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(1,255,0,1) 100%);
}
.bad{
  background: rgb(255,0,0);
  background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(255,0,52,1) 100%);
}
.fullscreen{
    position: absolute;
    right:1vw;
    bottom:1vh;
    width:4vw;
}
</style>

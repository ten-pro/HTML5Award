<template>
    <div class="main" ref="fullscreen">
        <div class="botan">
            <Return />
        </div>
        <div class="title_area">
            <p class="p1">経営結果</p>
        </div>
        <div class="koko">
            <Shisan :topstate="result"/>
            <Misyain :topstate="result"/>
            <Nissu :topstate="result"/>
            <Ninzu :topstate="result"/>
            <Level :topstate="result"/>
        </div>
        <div class="container">
            <Jinji :topstate="result"/>
            <Keiri :topstate="result"/>
            <Kaihatu :topstate="result"/>
            <Kenkou :topstate="result"/>
        </div>
        <img v-show="state.nowimg==0" src="./PNG/wide.png" @click="wide" class="fullscreen">
        <img v-show="state.nowimg==1" src="./PNG/small.png" @click="wide" class="fullscreen">
    </div>
    
</template>
<script setup>
import {reactive,ref} from "vue"
import Shisan from './result/Shisan.vue'
import Misyain from './result/Misyain.vue'
import Nissu from './result/Nissu.vue'
import Jinji from './result/Jinji.vue'
import Keiri from './result/Keiri.vue'
import Kaihatu from './result/Kaihatu.vue'
import Kenkou from './result/Kenkou.vue'
import Ninzu from './result/Ninzu.vue'
import Level from './result/Level.vue'
import Return from './result/Return.vue'
const fullscreen=ref(null)
let state = reactive({
    img:"src/components/PNG/wide.png",
    nowimg:0,
})
let result = reactive({
    money:0,
    misyain:0,
    day:0,
    syain:0,
    jilv:0,
    keilv:0,
    kailv:0,
    kenlv:0,
    score:0
})
const setup=()=>{
    result.money=localStorage.getItem("money");
    result.misyain=localStorage.getItem("misyain");
    result.day=localStorage.getItem("day");
    result.syain=localStorage.getItem("syain");
    result.jilv=localStorage.getItem("jilv");
    result.keilv=localStorage.getItem("keilv");
    result.kailv=localStorage.getItem("kailv");
    result.kenlv=localStorage.getItem("kenlv");
    result.score=localStorage.getItem("score");
}
setup();
const wide=()=>{
    if(state.nowimg==0){
        state.nowimg=1;
        fullscreen.value.requestFullscreen()
    }else{
        state.nowimg=0;
        document.exitFullscreen()
    }
}
// const props = defineProps({
//     result: Object,
// })
</script>
<style scoped>
.main{
    background-image: url("./PNG/background.png");
    background-size: 100vw 100vh;
}
.title_area{
    display: flex;
    justify-content: center;
    width:15vw;
    height: 8vh;
    margin: 2.5vh auto;
    padding: 0 5vw;
    background-color: white;
    border-radius: 20px;
    border: solid ;
}
.p1{
    margin:auto;
    font-size:50px;
    font-weight: bold;
    text-align:center;
    padding:10px 0;
}
.container{
    display: flex;
    margin-left: 6vw;
    font-size: 18px;
}
.koko{
    font-size: 30px;
}
.botan{
    position:absolute;
    margin:1.5vw 2.3vw;
}
.fullscreen{
    position: absolute;
    right:1vw;
    bottom:1vh;
    width:4vw;
}

</style>
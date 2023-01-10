
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
let state = reactive({
    money:0,
    misyain:0,
    nouki:0,
    nowkousuu:0,
    maxkousuu:0,
    nowday:1,
})
window.onload = function () {
    // state.money=1000;
    console.log("a");
}
const wide = () => {
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
    font-size:5vmin;
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

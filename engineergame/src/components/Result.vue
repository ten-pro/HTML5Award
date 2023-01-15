<template>
    <div class="main">
        <div class="botan">
            <Return />
        </div>
        <div class="title_area">
            <p class="p1">result</p>
        </div>
        <div class="koko">
            <Shisan :topstate="state"/>
            <Misyain :topstate="state"/>
            <Nissu :topstate="state"/>
            <Ninzu :topstate="state"/>
            <Level />
        </div>
        <div class="container">
            <Jinji :topstate="state"/>
            <Keiri :topstate="state"/>
            <Kaihatu :topstate="state"/>
            <Kenkou :topstate="state"/>
        </div>
    </div>
    
</template>
<script setup>
import {reactive} from "vue"
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

let state = reactive({
    shisan:0,
    misyain:0,
    nissu:0,
    ninzu:0,
    jinji_lev:0,
    keiri_lev:0,
    kaihatu_lev:0,
    kenkou_lev:0
})
</script>
<style>
.title_area{
    display: flex;
    justify-content: center;
    width:15vw;
    height: 8vh;
    margin: 2.5vh auto;
    padding: 0 5vw;
    background-color: white;
    opacity: 0.8;
}
.p1{
    margin:auto;
    font-size:30px;
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


</style>
<template>
    <div class="main">
        <div class="title_area">
            <p class="p1">result</p>
        </div>
        <div class="koko">
            <Shisan />
            <Misyain />
            <Nissu />
            <Ninzu />
            <Level />
        </div>
        <div class="container">
            <Jinji />
            <Keiri />
            <Kaihatu />
            <Kenkou />
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


</style>
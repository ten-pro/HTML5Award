
<template>
    <div>
        <div class="states">
            <p>資産：{{ state.money }}</p>
            <p>未所属社員：{{ state.misyain }}</p>
        </div>
        <div class="busyo">
            <Jinji />
            <Jinji />
        </div>
        <div class="busyo">
            <Jinji />
            <Jinji />
        </div>
    </div>
</template>
<script setup>
import {reactive} from "vue"
import Jinji from './gamemain/Jinji.vue'
let state = reactive({
    money:0,
    misyain:1,
})
window.onload = function () {
    
}
const wide = () => {
}
</script>

<style scoped>
.states{
    display: flex;
    width:80vw;
    height: 15vh;
    margin: 2.5vh auto;
    border: 5px solid #000000;
    background-color: white;
}
p{
    margin:auto;
    font-size:50px;
}
.busyo{
    display: flex;
    justify-content: center;
    gap:5vw;
    margin-bottom:2.5vh;
}
</style>

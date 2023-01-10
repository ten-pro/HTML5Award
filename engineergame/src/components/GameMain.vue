
<template>
    <div>
        <div class="states">
            <p>資産：{{ state.money }}</p>
            <p>未所属社員：{{ state.misyain }}</p>
        </div>
        <Jinji />
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
    margin: 20px auto;
    border: 5px solid #000000;
    background-color: white;
}
p{
    margin:auto;
    font-size:50px;
}
</style>


<template>
    <div>
        <div class="states"></div>
    </div>
</template>
<script setup>
import {reactive} from "vue"
let display = reactive([false])
window.onload = function () {
    
}
const wide = () => {
}
</script>

<style scoped>
.states{
    width:80vw;
    height: 20vh;
    margin: 20px auto;
    border: 5px solid #000000;
    background-color: white;
}
</style>

<template>
    <div class="main">
        <img src="../components/PNG/login.png" alt="" class="img_pc">
        <div class="mozi1">name</div>
        <input type="text" class="cre_input" v-model="name"><br>

        <div class="mozi2">pass</div>
        <input type="pass" class="cre_pass" v-model="pass">

        <p class="error1">すでに登録されています。</p>
        <button class="crebtn" @click="create_user">create new</button>
        <button class="logbtn" @click="login">login</button>
    </div>
</template>
<script setup>
import axios from 'axios'
import { reactive } from "vue"
let name=reactive("");
let pass=reactive("");
let display=reactive(["none"]);
let create_user=()=> {
            axios
                .post('https://mp-class.chips.jp/engineergame/Loginmain.php', {
                    user_name: name,
                    user_pass: pass,
                    create_user: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data)),
                    location.href="/home"
                )
        }
const login=()=>{
    location.href="/"
}
</script>
<style scoped>
.img_pc{
    width: 100%;
    height: 100%;
    position: absolute;
}
.cre_input{
    position: absolute;
    width: 40vw;
    height: 5vh;
    border: 2px solid;
    border-color: #000000;
    border-radius: 8px ;
    margin: 15.0vh 38.0vw;
    opacity: 0.8;
}
.mozi1{
    position: absolute;
    margin: 16.5vh 30.0vw;
    font-size: 23px;
}
.cre_pass{
    position: absolute;
    width: 40vw;
    height: 5vh;
    border: 2px solid;
    border-color: #000000;
    border-radius: 8px ;
    margin: 25.0vh 38.0vw;
    opacity: 0.8;

}
.mozi2{
    position: absolute;
    margin: 26.0vh 30.0vw;
    font-size: 23px;
}
.error1{
    display: v-bind(display);
    color: #CB0000;
    position: absolute;
    width: 270px;
    margin: 37.0vh 58.0vw;
    font-size: 17px;
}
.crebtn{
    position: absolute;
    margin: 35.0vh 42.0vw;
    width: 223px;
    height: 54px;
    border-radius: 50px;
    color: white;
    background-color: #0d307b;
    border: none;
    font-size: 28px;
}
.logbtn{
    position: absolute;
    border-right:none;
    border-left:none;
    border-top:none;
    border-color: #0d307b;
    margin: 44.0vh 46.0vw;
    font-size: 25px;
    color: #0d307b;
    background: transparent;
}
</style>
<template>
    <div class="main">
        <img src="../components/PNG/pc.png" alt="" class="img_pc">
        <div class="mozi1">name</div>
        <input type="text" class="cre_input" v-model="name"><br>

        <div class="mozi2">pass</div>
        <input type="pass" class="cre_pass" v-model="pass">

        <p class="error1">すでに登録されています。</p>
        <button class="crebtn" @click="create_user">create new</button>
        <a href=""><button class="logbtn">login</button></a>
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
    margin: 20.0vh 40.0vw;
    opacity: 0.8;
}
.mozi1{
    position: absolute;
    margin: 21.0vh 25.0vw;
    font-size: 23px;
}
.cre_pass{
    position: absolute;
    width: 40vw;
    height: 5vh;
    border: 2px solid;
    border-color: #000000;
    border-radius: 8px ;
    margin: 30.0vh 40.0vw;
    opacity: 0.8;

}
.mozi2{
    position: absolute;
    margin: 31.0vh 25.0vw;
    font-size: 23px;
}
.error1{
    display: v-bind(display);
    color: #CB0000;
    position: absolute;
    width: 260px;
    margin: 40.0vh 35.0vw;
}
.crebtn{
    position: absolute;
    margin: 40.0vh 42.0vw;
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
    border-color: #9C39A1;
    margin: 50.0vh 45.0vw;
    font-size: 25px;
    color: #0d307b;
    background: transparent;
}
</style>
<template>
    <div class="main">
        <img src="../components/PNG/pc.png" alt="" class="img_pc">
        <div class="mozi1">name</div>
        <input type="text" class="login_input" v-model="name"><br>

        <div class="mozi2">pass</div>
        <input type="pass" class="login_pass" v-model="pass">

        <p class="error1">ユーザー名が登録されていないか、パスワードが間違っています</p>
        <button class="logbtn" @click="loginchk">login</button>
        <a href=""><button class="createbtn">create new</button></a>
    </div>
</template>
<script setup>
import axios from 'axios'
import { reactive } from "vue"
let name=reactive("");
let pass=reactive("");
let display=reactive(["none"]);
let loginchk =()=>{
            axios
                .post('https://mp-class.chips.jp/engineergame/Loginmain.php', {
                    user_name: name,
                    user_pass: pass,
                    login_user: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (loginchk = response.data),
                    console.log("成功")
                )
};
</script>
<style scoped>
.img_pc{
    width: 100%;
    height: 100%;
    position: absolute;
}
.login_input{
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
.login_pass{
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
.logbtn{
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
.createbtn{
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
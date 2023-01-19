<template>
    <div class="main">
        <div class="middle">
          <div class="black">Black</div>
          <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="100px" height="100px" viewBox="0 0 1280.000000 938.000000"
 preserveAspectRatio="xMidYMid meet">
<metadata>
Created by potrace 1.15, written by Peter Selinger 2001-2017
</metadata>
<g transform="translate(0.000000,938.000000) scale(0.100000,-0.100000)"
fill="#833e3e" stroke="none">
<path d="M12073 9370 c-23 -5 -55 -16 -71 -24 -29 -15 -62 -68 -62 -100 0 -9
-8 -16 -19 -16 -10 0 -63 -9 -117 -19 -55 -11 -171 -34 -259 -51 -659 -127
-1294 -293 -1740 -452 -828 -296 -1412 -634 -1832 -1060 -51 -51 -470 -507
-933 -1013 l-840 -920 36 -30 c20 -16 49 -41 66 -55 l30 -26 -287 -372 -286
-372 -42 30 c-23 16 -54 40 -69 53 l-27 22 270 335 c255 316 332 415 297 380
-9 -8 -136 -166 -284 -350 -320 -399 -430 -525 -600 -689 -170 -164 -540 -486
-612 -534 -54 -36 -163 -77 -203 -77 -26 0 -120 37 -144 58 -51 43 -118 140
-180 263 -37 74 -196 369 -352 657 -155 287 -283 533 -283 545 0 87 -82 194
-195 255 -436 236 -1451 212 -2268 -54 -442 -145 -755 -328 -887 -519 -43 -62
-60 -121 -59 -203 0 -37 -7 -193 -17 -347 -21 -343 -25 -1149 -6 -1355 19
-211 32 -324 53 -475 162 -1130 632 -1831 1403 -2091 55 -18 94 -34 85 -34 -9
0 -36 7 -59 15 -56 20 -55 20 -57 -17 -3 -44 21 -89 65 -118 20 -14 39 -27 42
-30 34 -39 364 -136 544 -160 45 -6 92 -13 106 -15 187 -33 507 -48 883 -42
188 3 353 8 367 10 14 3 59 8 100 12 251 22 571 85 705 140 155 64 215 112
222 179 5 42 3 48 -33 85 -83 84 -323 171 -574 207 -19 3 -49 9 -66 13 -20 6
-42 4 -64 -5 -80 -34 -29 -5 185 104 328 168 516 279 768 455 736 513 1390
1256 2024 2302 135 222 614 915 633 915 9 1 292 425 660 988 675 1033 683
1045 844 1237 389 465 863 841 1361 1080 352 169 637 266 1300 445 297 80 624
174 699 200 47 16 62 17 74 8 18 -16 103 -15 173 2 123 29 208 84 240 155 25
53 23 98 -4 166 -45 108 -54 115 -296 222 -215 95 -220 97 -293 96 -40 -1 -92
-5 -115 -9z"/>
</g>
</svg>
<div class="boss">BOSS</div>
        </div>
        <div class="input_area">
            <div class="flex">
        <div class="mozi1">name</div>
        <input type="text" class="cre_input" v-model="name"><br>
            </div>
            <div class="flex">
        <div class="mozi2">pass</div>
        <input type="password" class="cre_pass" v-model="pass">
    </div>

        <p class="error1">すでに登録されています。</p>
        <button class="crebtn" @click="create_user">create new</button>
        <button class="logbtn" @click="login">login</button>
        </div>
    </div>
</template>
<script setup>
import axios from 'axios'
import swal from "sweetalert"
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
                .then(function (res) {
                    swal("アカウント作成成功！","アカウントを作成しました！ログイン画面からログインしてください","success")
                    .then(function (res) {
                        location.href="/"
                    })
                })
        }
const login=()=>{
    location.href="/"
}
</script>
<style scoped>
.input_area{
    display: flex;
    flex-direction: column;
    align-items: center;
    width:80vw;
    margin:auto;
}
.cre_input{
    width: 40vw;
    height: 5vh;
    border: 2px solid;
    border-color: #000000;
    border-radius: 8px ;
}
.mozi1{
    font-size: 1.5vw;
    font-weight: bold;
    color:white;
    -webkit-text-stroke: 0.07vw black;
}
.cre_pass{
    width: 40vw;
    height: 5vh;
    border: 2px solid;
    border-color: #000000;
    border-radius: 8px ;
}
.mozi2{
    font-size: 1.5vw;
    font-weight: bold;
    margin-top:5vw;
    color:white;
    -webkit-text-stroke: 0.07vw black;
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

.middle {
    margin-top: 2%;
    display: flex;
    justify-content: center;
}
.boss {
    font-weight: bold;
font-size: 100px;
background: linear-gradient(135deg, rgba(255,0,0,1) 0%, rgba(0,0,0,1) 50%, rgba(255,0,0,1) 100%);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;

}
.black {
    font-weight: bold;
    font-size: 200px;
    background: linear-gradient(0deg, rgba(0,0,0,1) 25%, rgba(243,253,45,1) 100%);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
}
</style>
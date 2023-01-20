<template>
    <div class="main" ref="fullscreen">
        <div class="upper">
            <div class="upleft">
                <button class="logout-button" @click="logout">
                    <svg class="logout-svg" width="80px" height="80px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">   
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path d="M5 2h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm4 9V8l-5 4 5 4v-3h6v-2H9z"/>
                    </svg>
                </button>
                <button class="ranking-button" @click="ranking">
                  <svg class="ranking-svg" width="80px" height="80px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.67 22.75H2C1.59 22.75 1.25 22.41 1.25 22V16C1.25 14.48 2.48 13.25 4 13.25H8.67C9.08 13.25 9.42 13.59 9.42 14V22C9.42 22.41 9.08 22.75 8.67 22.75ZM2.75 21.25H7.92V14.75H4C3.31 14.75 2.75 15.31 2.75 16V21.25Z" fill="#000000"/><path d="M15.3302 22.75H8.66016C8.25016 22.75 7.91016 22.41 7.91016 22V12C7.91016 10.48 9.14016 9.25 10.6602 9.25H13.3302C14.8502 9.25 16.0802 10.48 16.0802 12V22C16.0802 22.41 15.7502 22.75 15.3302 22.75ZM9.42015 21.25H14.5902V12C14.5902 11.31 14.0302 10.75 13.3402 10.75H10.6702C9.98015 10.75 9.42015 11.31 9.42015 12V21.25Z" fill="#000000"/><path d="M22.0001 22.75H15.3301C14.9201 22.75 14.5801 22.41 14.5801 22V17C14.5801 16.59 14.9201 16.25 15.3301 16.25H20.0001C21.5201 16.25 22.7501 17.48 22.7501 19V22C22.7501 22.41 22.4101 22.75 22.0001 22.75ZM16.0801 21.25H21.2501V19C21.2501 18.31 20.6901 17.75 20.0001 17.75H16.0801V21.25Z" fill="#000000"/><path d="M13.6999 8.34999C13.4599 8.34999 13.1599 8.27997 12.8199 8.07997L11.9999 7.58998L11.1899 8.06999C10.3699 8.55999 9.82989 8.26998 9.62989 8.12998C9.42989 7.98998 8.99989 7.54998 9.20989 6.62998L9.39989 5.79997L8.71989 5.11997C8.29989 4.69997 8.14989 4.19997 8.29989 3.73997C8.44989 3.27997 8.85989 2.95996 9.43989 2.85996L10.3099 2.70997L10.7999 1.72999C11.3399 0.65999 12.6499 0.65999 13.1799 1.72999L13.6699 2.70997L14.5399 2.85996C15.1199 2.95996 15.5399 3.27997 15.6799 3.73997C15.8299 4.19997 15.6699 4.69997 15.2599 5.11997L14.5799 5.79997L14.7699 6.62998C14.9799 7.55998 14.5499 7.98999 14.3499 8.13999C14.2599 8.21999 14.0299 8.34999 13.6999 8.34999ZM11.9999 6.07997C12.2399 6.07997 12.4799 6.13999 12.6799 6.25999L13.2399 6.58998L13.1199 6.04997C13.0199 5.62997 13.1699 5.11998 13.4799 4.80998L13.9899 4.29997L13.3599 4.18998C12.9599 4.11998 12.5699 3.82998 12.3899 3.46998L11.9999 2.71998L11.6199 3.46998C11.4399 3.82998 11.0499 4.11998 10.6499 4.18998L10.0199 4.28999L10.5299 4.79997C10.8399 5.10997 10.9799 5.61999 10.8899 6.03999L10.7699 6.57997L11.3299 6.24998C11.5199 6.12998 11.7599 6.07997 11.9999 6.07997Z" fill="#000000"/></svg>
                </button>
                <a href="https://youtu.be/Bd4wgIGHoeE" target="_blank"><img class="youtube" src="./PNG/youtube.png"></a>
            </div>
            <div class="upright">
                <div class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="score">{{ score.score }}&nbsp;</div>
                <button class="account">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                        class="bi bi-person-circle account-svg" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </button>
            </div>
        </div>
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
        <div class="lower">
            <button class="custom-btn btn-9 startbutton" @click="start">Start</button>
        </div>
        <img v-show="state.nowimg==0" src="./PNG/wide.png" @click="wide" class="fullscreen">
        <img v-show="state.nowimg==1" src="./PNG/small.png" @click="wide" class="fullscreen">
    </div>
</template>
<script setup>
import axios from "axios"
import {reactive,ref} from "vue"
const fullscreen=ref(null)
let state = reactive({
    img:"src/components/PNG/wide.png",
    nowimg:0,
})
    let score = reactive({
        score:""
    })


            axios
                .post('https://mp-class.chips.jp/engineergame/Clearmain.php', {
                    user_id: sessionStorage.getItem("id"),
                    myrank: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (res) {
                    try{
                        score.score = res.data[0].score
                    }catch(error){
                        score.score = 0;
                    }
                    console.log(score)
                })
                
    const start = () => {
        location.href="/gamemain"
    }
    const ranking = () => {
        location.href="/ranking"
    }
    const logout = () => {
    location.href = "/"
}
const wide=()=>{
    if(state.nowimg==0){
        state.nowimg=1;
        fullscreen.value.requestFullscreen()
    }else{
        state.nowimg=0;
        document.exitFullscreen()
    }
}
</script>


<style scoped>
.main{
    background-image: url("./PNG/background.png");
    background-size: 100vw 100vh;
}
.youtube{
    width:5vw;
    margin-left:0.5vw;
}
.boss {
    font-weight: bold;
font-style: oblique;
font-family: sans-serif;
font-size: 100px;
background: linear-gradient(135deg, rgba(255,0,0,1) 0%, rgba(0,0,0,1) 50%, rgba(255,0,0,1) 100%);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;

}
.black {
font-family: serif;
    font-weight: bold;
    font-size: 200px;
    background: linear-gradient(0deg, rgba(0,0,0,1) 25%, rgba(243,253,45,1) 100%);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
}
.underline {
    position: absolute;
    border-bottom: 5px solid black;
    font-weight: bold;
    top: 60%;
    right: 40%;
}
.lower {
justify-content: center;
display: flex;
margin-top: 3%;
}
.middle {
    margin-top: 8%;
    display: flex;
    justify-content: center;
}
.account {
    background-color: transparent;
    border: transparent;
    cursor: pointer;
}
.account-svg:hover {
    fill: blue;
}
.ranking-button {
    background-color: transparent;
    border: transparent;
    cursor: pointer;
}
.ranking-svg:hover {
   background-color: yellow;
}
.logout-button {
    background-color: transparent;
    cursor: pointer;
    border: transparent;
}
.logout-svg > path:hover {
    fill: #ff0000;
}
.startbutton {
    justify-content: center;
}
.upper {
    display: flex;
    justify-content: space-between;
}
.upright {
    margin-right: 3%;
    display: flex;
    align-items:stretch;
    position: relative;
}
.score {
    font-size: 59px;
    font-weight: bold;
    position: absolute;
    /* left: -120px; */
    right:5vw;
    bottom: -10px;
    color: rgb(0, 0, 0);
    background: -webkit-linear-gradient(270deg, #943BED, #FF97D5);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.custom-btn {
    width: 220px;
    height: 100px;
    color: #fff;
    border-radius: 5px;
    padding: 10px 25px;
    font-family: 'Lato', sans-serif;
    font-weight: 500;
    font-size: 50px;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
     box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
     7px 7px 20px 0px rgba(0,0,0,.1),
     4px 4px 5px 0px rgba(0,0,0,.1);
    outline: none;
    background-image: linear-gradient(315deg, #1fd1f9 0%, #b621fe 85%)
  }
  
  .btn-9 {
    border: none;
    transition: all 0.3s ease;
    overflow: hidden;
  }
  .btn-9:after {
    position: absolute;
    content: " ";
    z-index: -1;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
     background-color: #1fd1f9;
  background-image: linear-gradient(315deg, #1fd1f9 0%, #b621fe 85%);
    transition: all 0.3s ease;
  }
.btn-9:hover {
    background-image: linear-gradient(315deg, #b621fe 0%, #1fd1f9 85%);
}
.fullscreen{
    position: absolute;
    right:1vw;
    bottom:1vh;
    width:4vw;
}
</style>
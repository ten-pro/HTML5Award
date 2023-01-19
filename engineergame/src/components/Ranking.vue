<template>
    <div class="main" ref="fullscreen">
        <div class="text">RANKING</div>
        <div class="rankingList">
            <div class="rankingNumberBack1 gold">
                <div class="rankingNumber1 whiteFore">1</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">{{ score[0].name != null ? score[0].name : "noName" }}</div>
                <div class="rankingScore1">{{ score[0].score != null ? score[0].score : "-" }}</div>
            </div>
        </div>
        <div class="rankingList">
            <div class="rankingNumberBack1 silver">
                <div class="rankingNumber1 whiteFore">2</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">{{ score[1].name != null ? score[1].name : "noName" }}</div>
                <div class="rankingScore1">{{ score[1].score != null ? score[1].score : "-" }}</div>
            </div>
        </div>
        <div class="rankingList">
            <div class="rankingNumberBack1 bronze">
                <div class="rankingNumber1 whiteFore">3</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">{{ score[2].name != null ? score[2].name : "noName" }}</div>
                <div class="rankingScore1">{{ score[2].score != null ? score[2].score : "-" }}</div>
            </div>
        </div>
        <div class="rankingList">
            <div class="rankingNumberBack1 whiteBack">
                <div class="rankingNumber1 black">4</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">{{ score[3].name != null ? score[3].name : "noName" }}</div>
                <div class="rankingScore1">{{ score[3].score != null ? score[3].score : "-" }}</div>
            </div>
        </div>
        <div class="rankingList">
            <div class="rankingNumberBack1 whiteBack">
                <div class="rankingNumber1 black">5</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">{{ score[4].name != null ? score[4].name : "noName" }}</div>
                <div class="rankingScore1">{{ score[4].score != null ? score[4].score : "-" }}</div>
            </div>
        </div>
        <div class="rankingList">
            <div class="rankingNumberBack1 whiteBack">
                <div class="rankingNumber1 black">⭐︎</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">MyScore</div>
                <div class="rankingScore1">{{ score[5].score != null ? score[5].score : "-" }}</div>
            </div>
        </div>
        <button class="custom-btn btn-9 startbutton" @click="home">←ホームへ</button>
        <img :src="state.img" @click="wide" class="fullscreen">
    </div>
</template>
<script setup>
import axios from "axios"
import { reactive,ref } from "vue"
const fullscreen=ref(null)
let state = reactive({
    img:"src/components/PNG/wide.png",
    nowimg:0,
})
    // let state = reactive({})
    let score = reactive([
        {name:"",score:""},
        {name:"",score:""},
        {name:"",score:""},
        {name:"",score:""},
        {name:"",score:""},
        {name:"",score:""},
    ])
    axios
        .post('https://mp-class.chips.jp/engineergame/Clearmain.php', {
            get_score_rank: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
            .then(function (res){
                for(let i=0;i<score.length-1;i++){
                    score[i]=res.data.score_rank[i];
                }
                console.log(res.data)
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
                    console.log(score)
                    try{
                        score[5].score=res.data[0].score
                    }catch(error){
                        score[5].score=0;
                    }
                }
            )
        })
const home = () => {
    location.href = "/home"
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
.custom-btn {
    width: 300px;
    height: 100px;
    color: #fff;
    border-radius: 5px;
    margin: 2% 0 0 5%;
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
  }
  
  .btn-9 {
    border: none;
    transition: all 0.3s ease;
    overflow: hidden;
    position: absolute;
    top: 10%;
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
.text {
    text-align: center;
    color: #943BED;
    font-size: 80px;
    font-weight: bold;
    letter-spacing: 10px;
}
.rankingList {
    display: flex;
width: 100vh;
margin: 25px 0 0 25%;
}
.rankingNumberBack1 {
margin: 35px -15px 0 20px ;
transform: skewX(30deg);
    width: 70px;
    height: 45px;
    text-align: center;
    position: relative;
    
}
.rankingNumber1 {
position: absolute;
transform: skewX(-30deg);
width: 100%;
height: 100%;
top: -10px;
left: 8px;
text-align: center;
font-size: 45px;
font-weight:bolder;
font-family: serif;
}
.rankingMainBack1 {
    position: relative;
    transform: skewX(30deg);
    width: 800px;
    height: 80px;
background: linear-gradient(to bottom right,#943BED,#FF97D5);
}
.rankingName1 {
position: absolute;
transform: skewX(-30deg);
margin: 0 auto;
font-size: 60px;
color: white;
left: 15%;
font-weight: bold;
}
.rankingScore1 {
    position: absolute;
    transform: skewX(-30deg);
    font-size: 60px;
    color: black;
left: 66%;
font-weight: bold;
}

.gold {
    background-color: #dab300;
}
.silver {
    background-color: #BDC3C9;
}
.bronze {
    background-color: #9A6229;
}
.whiteBack {
    background-color: #FFFFFF;
}
.black {
    color: black;
}
.whiteFore {
    color: white;
}
.fullscreen{
    position: absolute;
    right:1vw;
    bottom:1vh;
    width:4vw;
}
</style>

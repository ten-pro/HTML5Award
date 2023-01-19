<template>
    <div>
        <div class="text">RANKING</div>
        <div class="rankingList">
            <div class="rankingNumberBack1 gold">
                <div class="rankingNumber1 whiteFore">1</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">{{ score[0].name != null ? score[0].name : "noName" }}</div>
                <div class="rankingScore1">{{ score[0].employee != null ? score[0].employee : "-" }}</div>
            </div>
        </div>
        <div class="rankingList">
            <div class="rankingNumberBack1 silver">
                <div class="rankingNumber1 whiteFore">2</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">{{ score[1].name != null ? score[1].name : "noName" }}</div>
                <div class="rankingScore1">{{ score[1].employee != null ? score[1].employee : "-" }}</div>
            </div>
        </div>
        <div class="rankingList">
            <div class="rankingNumberBack1 bronze">
                <div class="rankingNumber1 whiteFore">3</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">{{ score[2].name != null ? score[2].name : "noName" }}</div>
                <div class="rankingScore1">{{ score[2].employee != null ? score[2].employee : "-" }}</div>
            </div>
        </div>
        <div class="rankingList">
            <div class="rankingNumberBack1 whiteBack">
                <div class="rankingNumber1 black">4</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">{{ score[3].name != null ? score[3].name : "noName" }}</div>
                <div class="rankingScore1">{{ score[3].employee != null ? score[3].employee : "-" }}</div>
            </div>
        </div>
        <div class="rankingList">
            <div class="rankingNumberBack1 whiteBack">
                <div class="rankingNumber1 black">5</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">{{ score[4].name != null ? score[4].name : "noName" }}</div>
                <div class="rankingScore1">{{ score[4].employee != null ? score[4].employee : "-" }}</div>
            </div>
        </div>
        <div class="rankingList">
            <div class="rankingNumberBack1 whiteBack">
                <div class="rankingNumber1 black">⭐︎</div>
            </div>
            <div class="rankingMainBack1">
                <div class="rankingName1">MyScore</div>
                <div class="rankingScore1">{{ score[4].employee != null ? score[4].employee : "-" }}</div>
            </div>
        </div>
        <button class="custom-btn btn-9 startbutton" @click="home">←ホームへ</button>
    </div>
</template>
<script setup>
import axios from "axios"
    import { reactive } from "vue"
    // let state = reactive({})
    let score = reactive([
        {name:"",employee:""},
        {name:"",employee:""},
        {name:"",employee:""},
        {name:"",employee:""},
        {name:"",employee:""},
        {rank:"",score:""}
    ])
    window.onload = function(){
    axios
        .post('https://mp-class.chips.jp/engineergame/Clearmain.php', {
            get_score_rank: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (res){
            for(let i=0;i<score.length;i++){
                score[i]=res.data.employee_rank[i];
            }
            // console.log(score[0].name)

        })

        axios
            .post('https://mp-class.chips.jp/engineergame/Clearmain.php', {
                user_id: this.user_id = 0,
                myrank: ''
            }, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function (res) {
                // (response) => (console.log(response.data))
                console.log(res.data)
                // myScore = response.data
            }
        )

    }
const home = () => {
    location.href = "/home"
}




</script>
<style scoped>
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
width: 100%;
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
    width: 700px;
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
</style>

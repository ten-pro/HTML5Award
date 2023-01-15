<template>
    <div>
        <div class="rankingRow">
            <div class="ranking1">
                <div class="rankingName1" v-vind="score[0].name">{{ score[0].name != null ? score[0].name : "-" }}</div>
                <div class="rankingScore1">{{ score[0].employee != null ? score[0].employee : "-" }}</div>
            </div>
            <div class="ranking2">
                <div class="rankingName2">{{ score[1].name != null ? score[1].name : "-" }}</div>
                <div class="rankingScore2">{{ score[1].employee != null ? score[1].employee : "-" }}</div>
            </div>
            <div class="ranking3">
                <div class="rankingName3">{{ score[2].name != null ? score[2].name : "-" }}</div>
                <div class="rankingScore3">{{ score[2].employee != null ? score[2].employee : "-" }}</div>
            </div>
            <div class="ranking4">
                <div class="rankingName4">{{ score[3].name != null ? score[3].name : "-" }}</div>
                <div class="rankingScore4">{{ score[3].employee != null ? score[3].employee : "-" }}</div>
            </div>
            <div class="ranking5">
                <div class="rankingName5">{{ score[4].name != null ? score[4].name : "-" }}</div>
                <div class="rankingScore5">{{ score[4].employee != null ? score[4].employee : "-" }}</div>
            </div>
        </div>
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
            console.log(score[0].name)

        })
    }





</script>
<style scoped>
.rankingRow {
    margin-top: 12%;
}
.ranking1 {
    display: flex;
    margin-left: 25%;
}
.rankingName1 {
    font-size: 60px;
    margin-right: 40%;
    font-weight: bold;
    color: white;
}
.rankingScore1 {
    font-size: 60px;
    font-weight: bold;
    color: white;
}
.ranking2 {
    display: flex;
    margin-top: 3%;
    margin-left: 25%;
}
.rankingName2 {
    font-size: 60px;
    margin-right: 40%;
    font-weight: bold;
    color: white;
}
.rankingScore2 {
    font-size: 60px;
    font-weight: bold;
    color: white;
}
.ranking3 {
    display: flex;
    margin-top: 3%;
    margin-left: 25%;
}
.rankingName3 {
    font-size: 60px;
    margin-right: 40%;
    font-weight: bold;
    color: white;
}
.rankingScore3 {
    font-size: 60px;
    font-weight: bold;
    color: white;
}
.ranking4 {
    display: flex;
    margin-top: 4%;
    margin-left: 25%;
}
.rankingName4 {
    
    font-size: 60px;
    margin-right: 40%;
    font-weight: bold;
    color: white;
}
.rankingScore4 {
    font-size: 60px;
    font-weight: bold;
    color: white;
}
.ranking5 {
    display: flex;
    margin-top: 4%;
    margin-left: 25%;
}
.rankingName5 {
    font-size: 60px;
    margin-right: 40%;
    font-weight: bold;
    color: white;
}
.rankingScore5 {
    font-size: 60px;
    font-weight: bold;
    color: white;
}
</style>

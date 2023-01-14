<template>
    <div>
        <div class="rankingRow">
        <div class="ranking1">
            <div class="rankingName1">name</div>
            <div class="rankingScore1">999</div>
        </div>
        <div class="ranking2">
        <div class="rankingName2">name</div>
        <div class="rankingScore2">999</div>
        </div>
        <div class="ranking3">
            <div class="rankingName3">name</div>
            <div class="rankingScore3">999</div>
        </div>
        <div class="ranking4">
            <div class="rankingName4">name</div>
            <div class="rankingScore4">999</div>
        </div>
        <div class="ranking5">
            <div class="rankingName5">name</div>
            <div class="rankingScore5">999</div>
        </div>
    </div>
    </div>
</template>
<script setup>
    import {
        reactive
    } from "vue"
    let state = reactive({

    })

    const wide = () => {}
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
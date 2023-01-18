<template>
    <div>
        <div class="upper">
            <div class="upleft">
                <button class="logout-button">
                    <svg class="logout-svg" width="80px" height="80px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">   
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path d="M5 2h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm4 9V8l-5 4 5 4v-3h6v-2H9z"/>
                    </svg>
                </button>
                <button class="ranking-button">
                  <svg class="ranking-svg" width="80px" height="80px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.67 22.75H2C1.59 22.75 1.25 22.41 1.25 22V16C1.25 14.48 2.48 13.25 4 13.25H8.67C9.08 13.25 9.42 13.59 9.42 14V22C9.42 22.41 9.08 22.75 8.67 22.75ZM2.75 21.25H7.92V14.75H4C3.31 14.75 2.75 15.31 2.75 16V21.25Z" fill="#000000"/><path d="M15.3302 22.75H8.66016C8.25016 22.75 7.91016 22.41 7.91016 22V12C7.91016 10.48 9.14016 9.25 10.6602 9.25H13.3302C14.8502 9.25 16.0802 10.48 16.0802 12V22C16.0802 22.41 15.7502 22.75 15.3302 22.75ZM9.42015 21.25H14.5902V12C14.5902 11.31 14.0302 10.75 13.3402 10.75H10.6702C9.98015 10.75 9.42015 11.31 9.42015 12V21.25Z" fill="#000000"/><path d="M22.0001 22.75H15.3301C14.9201 22.75 14.5801 22.41 14.5801 22V17C14.5801 16.59 14.9201 16.25 15.3301 16.25H20.0001C21.5201 16.25 22.7501 17.48 22.7501 19V22C22.7501 22.41 22.4101 22.75 22.0001 22.75ZM16.0801 21.25H21.2501V19C21.2501 18.31 20.6901 17.75 20.0001 17.75H16.0801V21.25Z" fill="#000000"/><path d="M13.6999 8.34999C13.4599 8.34999 13.1599 8.27997 12.8199 8.07997L11.9999 7.58998L11.1899 8.06999C10.3699 8.55999 9.82989 8.26998 9.62989 8.12998C9.42989 7.98998 8.99989 7.54998 9.20989 6.62998L9.39989 5.79997L8.71989 5.11997C8.29989 4.69997 8.14989 4.19997 8.29989 3.73997C8.44989 3.27997 8.85989 2.95996 9.43989 2.85996L10.3099 2.70997L10.7999 1.72999C11.3399 0.65999 12.6499 0.65999 13.1799 1.72999L13.6699 2.70997L14.5399 2.85996C15.1199 2.95996 15.5399 3.27997 15.6799 3.73997C15.8299 4.19997 15.6699 4.69997 15.2599 5.11997L14.5799 5.79997L14.7699 6.62998C14.9799 7.55998 14.5499 7.98999 14.3499 8.13999C14.2599 8.21999 14.0299 8.34999 13.6999 8.34999ZM11.9999 6.07997C12.2399 6.07997 12.4799 6.13999 12.6799 6.25999L13.2399 6.58998L13.1199 6.04997C13.0199 5.62997 13.1699 5.11998 13.4799 4.80998L13.9899 4.29997L13.3599 4.18998C12.9599 4.11998 12.5699 3.82998 12.3899 3.46998L11.9999 2.71998L11.6199 3.46998C11.4399 3.82998 11.0499 4.11998 10.6499 4.18998L10.0199 4.28999L10.5299 4.79997C10.8399 5.10997 10.9799 5.61999 10.8899 6.03999L10.7699 6.57997L11.3299 6.24998C11.5199 6.12998 11.7599 6.07997 11.9999 6.07997Z" fill="#000000"/></svg>
                </button>
            </div>
            
            <div class="upright">
                <div class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="score">{{ score }}&nbsp;</div>
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
            <svg width="80px" height="80px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet"><circle cx="32" cy="32" r="30" fill="#4fd1d9"></circle><path d="M20.2 17.5h6v12l11.2-12h7.8L33.3 29.4l12.5 17.1H38l-8.9-12.7l-2.9 3v9.7h-6v-29" fill="#ffffff"></path></svg>
            <svg width="80px" height="80px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet"><path fill="#DD2E44" d="M36 32a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4v28z"></path><path fill="#FFF" d="M14.747 9.125c.527-1.426 1.736-2.573 3.317-2.573c1.643 0 2.792 1.085 3.318 2.573l6.077 16.867c.186.496.248.931.248 1.147c0 1.209-.992 2.046-2.139 2.046c-1.303 0-1.954-.682-2.264-1.611l-.931-2.915h-8.62l-.93 2.884c-.31.961-.961 1.642-2.232 1.642c-1.24 0-2.294-.93-2.294-2.17c0-.496.155-.868.217-1.023l6.233-16.867zm.34 11.256h5.891l-2.883-8.992h-.062l-2.946 8.992z"></path></svg>
        </div>
        <div class="lower">
            <button class="custom-btn btn-9 startbutton" @click="start">Start</button>
        </div>
    </div>
</template>
<script setup>
import axios from "axios"
    import {
        reactive
    } from "vue"
    let score = reactive([
        {score:""}
    ])


            axios
                .post('https://mp-class.chips.jp/engineergame/Clearmain.php', {
                    user_id: 1,
                    myrank: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (res) {
                    score = res.data[0].score
                    console.log(score)
                })
                
    const start = () => {
        location.href="/gamemain"
    }
</script>


<style scoped>
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
margin-top: 15%;
}
.middle {
    margin-top: 15%;
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
    display: flex;
    align-items:stretch;
    position: relative;
}
.score {
    font-size: 59px;
    font-weight: bold;
position: absolute;
left: -120px;
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
</style>
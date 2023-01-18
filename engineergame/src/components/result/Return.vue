<template>
    <div class="wrap">
        <button class="button" @click="returnfunk">戻る</button>
    </div>
</template>
<script setup>
const returnfunk =()=>{
  location.href="/home"
}
</script>

<style scoped>
html, body {
  height: 100%;
}

.wrap {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button {
  width: 140px;
  height: 45px;
  /* font-family: 'Roboto', sans-serif; */
  font-size: 13px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
  border-radius: 45px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  }

.button:hover {
  background-color: hsl(201, 78%, 54%);
  box-shadow: 0px 15px 20px hsl(201, 66%, 72%);
  color: #fff;
  transform: translateY(-7px);
}
</style>
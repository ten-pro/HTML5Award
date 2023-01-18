import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue';
import Create from '../components/Create.vue';
import GameMain from '../components/GameMain.vue';
import Home from '../components/Home.vue';
import Ranking from '../components/Ranking.vue';
import Result from '../components/Result.vue';

const routes = [
  {
    path: '/',
    component: Login,
  },
  {
    path: '/create',
    component: Create,
  },
  {
    path: '/gameMain',
    component: GameMain,
  },
  {
    path: '/home',
    component: Home,
  },
  {
    path: '/ranking',
    component: Ranking,
  },
  {
    path: '/result',
    component: Result,
  },
]


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
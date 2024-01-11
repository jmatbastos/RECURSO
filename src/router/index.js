import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/Home.vue'
import Menu from '@/views/Menu.vue'
import Register from '@/views/Register.vue'
import Message from '@/views/Message.vue'
import Login from '@/views/Login.vue'
import Book from '@/views/Book.vue'
import MyBookings from '@/views/MyBookings.vue'
import Welcome from '@/views/Welcome.vue'

//AVISO: ALTERAR O PATH '/' PARA O COMPONENTE 'Home' NO EXAME

const routes = [
  {
    path: '/',
    component: Welcome
  },
  {
    path: '/Home',
    component: Home
  },
  {
    path: '/menu',
    component: Menu
  },
  {
    path: '/register',
    component: Register
  },

  {
    path: '/message',
    component: Message
  },
  {
    path: '/login',
    component: Login
  },
  {
    path: '/book',
    component: Book
  },  
  {
    path: '/mybookings',
    component: MyBookings
  },             
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

export default router

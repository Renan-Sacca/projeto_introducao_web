import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import AddPacienteView from '../views/AddPacienteView.vue'
import AddConsultaView from '../views/AddConsultaView.vue'

const router = createRouter({
  history: createWebHistory(""),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/new-paciente',
      name: 'new-paciente',
      component: AddPacienteView
    },
    {
      path: '/new-consulta',
      name: 'new-consulta',
      component: AddConsultaView
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView
    }
  ]
})

export default router

import { createRouter, createWebHistory } from 'vue-router'
import PacientesView from '../views/PacientesView.vue'
import AddPacienteView from '../views/AddPacienteView.vue'
import EditPacienteView from '../views/EditPacienteView.vue';

const routes = [
  { path: '/', redirect: '/pacientes' },
  { path: '/pacientes', name: 'pacientes', component: PacientesView },
  { path: '/pacientes/new', name: 'new-paciente', component: AddPacienteView },
  { path: '/pacientes/edit/:id', name: 'pacientes-edit', component: EditPacienteView }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router

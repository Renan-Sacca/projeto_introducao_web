import { createRouter, createWebHistory } from 'vue-router';
import PacientesView from '../views/PacientesView.vue';
import AddPacienteView from '../views/AddPacienteView.vue';
import EditPacienteView from '../views/EditPacienteView.vue';
import ConsultasView from '../views/ConsultasView.vue';
import AddConsultaView from '../views/AddConsultaView.vue'; 
import EditConsultaView from '../views/EditConsultaView.vue'; 

const routes = [
  { path: '/', redirect: '/pacientes' },
  { path: '/pacientes', name: 'pacientes', component: PacientesView },
  { path: '/pacientes/new', name: 'new-paciente', component: AddPacienteView },
  { path: '/pacientes/edit/:id', name: 'pacientes-edit', component: EditPacienteView },
  { path: '/consultas', name: 'consultas', component: ConsultasView }, 
  { path: '/consultas/new', name: 'new-consulta', component: AddConsultaView }, 
  { path: '/consultas/edit/:id', name: 'consultas-edit', component: EditConsultaView } 
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;

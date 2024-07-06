<template>
  <div>
    <h4>Lista de Consultas</h4>
    <ul v-if="consultas.length > 0" class="row">
      <li class="col-md-3 mt-3 mb-3" v-for="consulta in consultas" :key="consulta.id">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              Consulta ID: {{ consulta.id }}
            </h5>
            <p class="card-text">Paciente: {{ getPacienteNome(consulta.paciente_id) }}</p>
            <p class="card-text">Tipo de Consulta: {{ consulta.tipo_consulta }}</p>
            <p class="card-text">Data e Hora: {{ consulta.data_hora }}</p>
            <button class="btn btn-primary m-1" @click="editarConsulta(consulta.id)">Editar</button>
            <button class="btn btn-danger m-1" @click="excluirConsulta(consulta.id)">Excluir</button>
          </div>
        </div>
      </li>
    </ul>

    <p v-else>Nenhuma consulta encontrada.</p>
    
    <button class="btn btn-primary mt-3" @click="navegarParaNovaConsulta">Adicionar Consulta</button>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import ConsultaDataService from '../services/ConsultaDataService';
import { PacienteDataService } from '../services/PacienteDataService';
import { useRouter } from 'vue-router';

const router = useRouter();
const consultas = ref([]);
const pacientes = ref([]);

onMounted(() => {
  carregarConsultas();
  carregarPacientes();
});

async function carregarConsultas() {
  try {
    const consultaService = new ConsultaDataService();
    const data = await consultaService.getAll();
    consultas.value = data;
  } catch (error) {
    console.error('Erro ao carregar consultas:', error);
  }
}

async function carregarPacientes() {
  try {
    const pacienteService = new PacienteDataService();
    const response = await pacienteService.getAll();
    pacientes.value = response.data.data;
  } catch (error) {
    console.error('Erro ao carregar pacientes:', error);
  }
}

function getPacienteNome(pacienteId) {
  const paciente = pacientes.value.find(p => p.id === pacienteId);
  return paciente ? paciente.nome : 'Paciente não encontrado';
}

function navegarParaNovaConsulta() {
  router.push({ name: 'new-consulta' });
}

function editarConsulta(id) {
  router.push({ name: 'consultas-edit', params: { id } });
}

function excluirConsulta(id) {
  if (confirm('Tem certeza que deseja excluir esta consulta?')) {
    const consultaService = new ConsultaDataService();
    consultaService.delete(id)
      .then(() => {
        carregarConsultas();
      })
      .catch(error => {
        console.error('Erro ao excluir consulta:', error);
      });
  }
}
</script>

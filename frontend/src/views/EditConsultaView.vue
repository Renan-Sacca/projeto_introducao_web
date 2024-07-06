<template>
  <div>
    <h4>Editar consulta</h4>

    <div class="col-md-6">
      <div class="form-group">
        <label for="paciente_id">Paciente</label>
        <select class="form-control" id="paciente_id" v-model="consulta.paciente_id">
          <option v-for="paciente in pacientes" :key="paciente.id" :value="paciente.id">{{ paciente.nome }}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="tipo_consulta">Tipo de Consulta</label>
        <input type="text" class="form-control" id="tipo_consulta" name="tipo_consulta" v-model="consulta.tipo_consulta" required>
      </div>
      <div class="form-group">
        <label for="data_hora">Data e Hora</label>
        <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" v-model="consulta.data_hora" required>
      </div>

      <button class="btn btn-success mt-3" @click="updateConsulta">Atualizar</button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import ConsultaDataService from '../services/ConsultaDataService';
import { PacienteDataService } from '../services/PacienteDataService';

const router = useRouter();
const route = useRoute();
const consulta = ref({
  id: null,
  paciente_id: null,
  tipo_consulta: "",
  data_hora: ""
});
const pacientes = ref([]);

onMounted(() => {
  getConsulta(route.params.id);
  carregarPacientes();
});

async function getConsulta(id) {
  try {
    const consultaService = new ConsultaDataService();
    const response = await consultaService.get(id);
    consulta.value.id = response.data.id;
    consulta.value.paciente_id = response.data.paciente_id;
    consulta.value.tipo_consulta = response.data.tipo_consulta;
    consulta.value.data_hora = response.data.data_hora;
  } catch (error) {
    console.error('Erro ao buscar consulta:', error);
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

function updateConsulta() {
  const consultaService = new ConsultaDataService();
  consultaService.update(consulta.value.id, consulta.value)
    .then(() => {
      router.push('/consultas');
    })
    .catch(error => {
      console.error('Erro ao atualizar consulta:', error);
    });
}
</script>
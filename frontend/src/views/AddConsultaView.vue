<template>
  <div>
    <h4>Criar nova consulta</h4>

    <div class="col-md-6">
      <div class="form-group">
        <label for="paciente">Paciente</label>
        <select class="form-control" id="paciente" v-model="consulta.paciente_id">
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

      <button class="btn btn-success mt-3" @click="saveConsulta">Criar</button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import ConsultaDataService from '../services/ConsultaDataService';
import { PacienteDataService } from '../services/PacienteDataService';
import { useRouter } from 'vue-router';

const router = useRouter();

const pacientes = ref([]);

const consulta = ref({
  paciente_id: null,
  tipo_consulta: "",
  data_hora: ""
});

async function loadPacientes() {
  try {
    const pacienteService = new PacienteDataService();
    const response = await pacienteService.getAll();
    pacientes.value = response.data.data;
  } catch (error) {
    console.error('Erro ao carregar pacientes:', error);
  }
}

function saveConsulta() {
  const consultaService = new ConsultaDataService();
  consultaService.create(consulta.value)
    .then(response => {
      console.log(response.data);
      router.push('/consultas');
    })
    .catch(e => {
      console.error('Erro ao salvar consulta:', e);
    });
}

loadPacientes();
</script>

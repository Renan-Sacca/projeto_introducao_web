<template>
  <main>
    <h1>Home</h1>
    <div class="col-md-12">
      <h4>Todos os Pacientes</h4>
      <div class="row">
        <div class="col-md-3 mt-3 mb-3" v-for="(paciente, index) in pacientes" :key="index">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                {{ paciente.nome }}
              </h5>
              <p>Data de Nascimento: {{ paciente.data_nascimento }}</p>
              <p>Endereço: {{ paciente.endereco }}</p>
              <p>Telefone: {{ paciente.telefone }}</p>
              <p>Email: {{ paciente.email }}</p>
              <a href="#" class="btn btn-primary m-1">Editar</a>
              <button class="btn btn-danger m-1" @click="deletePaciente(paciente.id)">Excluir</button>
            </div>
          </div>
        </div>
      </div>
      <h4>Todas as Consultas</h4>
      <div class="row">
        <div class="col-md-3 mt-3 mb-3" v-for="(consulta, index) in consultas" :key="index">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                Consulta: {{ consulta.data_hora }}
              </h5>
              <p>Paciente: {{ consulta.paciente_id }}</p>
              <a href="#" class="btn btn-primary m-1">Editar</a>
              <button class="btn btn-danger m-1" @click="deleteConsulta(consulta.id)">Excluir</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import TaskDataService from '../services/TaskDataService';

export default {
  name: 'HomeView',
  data() {
    return {
      pacientes: [],
      consultas: []
    }
  },
  created() {
    this.retrievePacientes();
    this.retrieveConsultas();
  },
  methods: {
    retrievePacientes() {
      TaskDataService.getAllPacientes()
      .then(response => {
        this.pacientes = response.data;
        console.log("Pacientes:", this.pacientes);
      })
      .catch(e => {
        console.log(e);
      });
    },
    retrieveConsultas() {
      TaskDataService.getAllConsultas()
      .then(response => {
        this.consultas = response.data;
        console.log("Consultas:", this.consultas);
      })
      .catch(e => {
        console.log(e);
      });
    },
    deletePaciente(id) {
      TaskDataService.deletePaciente(id)
      .then(response => {
        console.log(response.data);
        this.retrievePacientes();
      })
      .catch(e => {
        console.log(e);
      });
    },
    deleteConsulta(id) {
      TaskDataService.deleteConsulta(id)
      .then(response => {
        console.log(response.data);
        this.retrieveConsultas();
      })
      .catch(e => {
        console.log(e);
      });
    }
  }
}
</script>

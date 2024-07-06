<template>
    <main>
      <h1>Pacientes</h1>
      <div class="col-md-12">
        <h4>Todos os pacientes</h4>
        <div class="row">
          <div class="col-md-3 mt-3 mb-3" v-for="(paciente, index) in pacientes" :key="index">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  {{ paciente.nome }} 
                </h5>
                <p class="card-text">Data de Nascimento: {{ paciente.data_nascimento }}</p>
                <p class="card-text">Endereço: {{ paciente.endereco }}</p>
                <p class="card-text">Telefone: {{ paciente.telefone }}</p>
                <p class="card-text">Email: {{ paciente.email }}</p>
                <button class="btn btn-danger m-1" @click="deletePaciente(paciente.id)">Excluir</button>
                <RouterLink :to="{ name: 'pacientes-edit', params: { id: paciente.id }}" class="btn btn-primary m-1">Editar</RouterLink>
              </div>
            </div>
          </div>
        </div>
      </div>
      <RouterLink class="btn btn-primary" to="/pacientes/new">Adicionar Paciente</RouterLink>
    </main>
  </template>
  
  <script>
  import { PacienteDataService } from '../services/PacienteDataService';
  
  export default {
    name: "pacientes-list",
    data() {
      return {
        pacientes: [],
      };
    },
    methods: {
      retrievePacientes() {
        const pacienteService = new PacienteDataService();
        pacienteService.getAll()
        .then(response => {
          this.pacientes = response.data.data;
          console.log(response.data.data);
        })
        .catch(e => {
          console.log(e);
        });
      },
      deletePaciente(id) {
        const pacienteService = new PacienteDataService();
        pacienteService.delete(id)
        .then(response => {
          console.log(response.data)
          this.retrievePacientes()
        })
        .catch(e => {
          console.log(e)
        });
      },
    },
    mounted() {
      this.retrievePacientes();
    }
  }
  </script>
  
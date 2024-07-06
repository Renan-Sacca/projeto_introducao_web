<template>
    <main>
      <h1>Consultas</h1>
      <div class="col-md-12">
        <h4>Todas as consultas</h4>
        <div class="row">
          <div class="col-md-3 mt-3 mb-3" v-for="(consulta, index) in consultas" :key="index">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Paciente: {{ consulta.paciente_nome }} 
                </h5>
                <p class="card-text">Data da Consulta: {{ consulta.data_consulta }}</p>
                <p class="card-text">Descrição: {{ consulta.descricao }}</p>
                <button class="btn btn-danger m-1" @click="deleteConsulta(consulta.id)">Excluir</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <RouterLink class="btn btn-primary" to="/consultas/new">Adicionar Consulta</RouterLink>
    </main>
  </template>
  
  <script>
  import { ConsultaDataService } from '../services/PacienteConsultaDataService';
  
  export default {
    name: "consultas-list",
    data() {
      return {
        consultas: [],
      };
    },
    methods: {
      retrieveConsultas() {
        const consultaService = new ConsultaDataService();
        consultaService.getAll()
        .then(response => {
          this.consultas = response.data.data;
          console.log(response.data.data);
        })
        .catch(e => {
          console.log(e);
        });
      },
      deleteConsulta(id) {
        const consultaService = new ConsultaDataService();
        consultaService.delete(id)
        .then(response => {
          console.log(response.data)
          this.retrieveConsultas()
        })
        .catch(e => {
          console.log(e)
        });
      },
    },
    mounted() {
      this.retrieveConsultas();
    }
  }
  </script>
  
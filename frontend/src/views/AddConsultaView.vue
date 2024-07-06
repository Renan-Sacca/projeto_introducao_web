<template>
    <div>
      <h4>Criar nova consulta</h4>
  
      <div class="col-md-6">
        <div class="form-group">
          <label for="paciente_nome">Nome do Paciente</label>
          <input type="text" class="form-control" id="paciente_nome" name="paciente_nome" v-model="consulta.paciente_nome" required>
        </div>
        <div class="form-group">
          <label for="data_consulta">Data da Consulta</label>
          <input type="date" class="form-control" id="data_consulta" name="data_consulta" v-model="consulta.data_consulta" required>
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" class="form-control" id="descricao" name="descricao" v-model="consulta.descricao" required>
        </div>
  
        <button class="btn btn-success mt-3" @click="saveConsulta">Criar</button>
      </div>
    </div>
  </template>
  
  <script>
  import { ConsultaDataService } from '../services/PacienteConsultaDataService';
  
  export default {
    name: "consultas-new",
    data() {
      return {
        consulta: {
          id: null,
          paciente_nome: "",
          data_consulta: "",
          descricao: ""
        }
      };
    },
    methods: {
      saveConsulta() {
        var data = {
          paciente_nome: this.consulta.paciente_nome,
          data_consulta: this.consulta.data_consulta,
          descricao: this.consulta.descricao
        };
  
        const consultaService = new ConsultaDataService();
        consultaService.create(data)
          .then(response => {
            console.log(response.data);
            this.$router.push('/consultas')
          })
          .catch(e => {
            console.log(e);
          });
      }
    }
  }
  </script>
  
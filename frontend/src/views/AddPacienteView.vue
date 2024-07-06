<template>
    <div>
      <h4>Criar novo paciente</h4>
  
      <div class="col-md-6">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" v-model="paciente.nome" required>
        </div>
        <div class="form-group">
          <label for="data_nascimento">Data de Nascimento</label>
          <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" v-model="paciente.data_nascimento" required>
        </div>
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" v-model="paciente.endereco" required>
        </div>
        <div class="form-group">
          <label for="telefone">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" v-model="paciente.telefone" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" v-model="paciente.email" required>
        </div>
  
        <button class="btn btn-success mt-3" @click="savePaciente">Criar</button>
      </div>
    </div>
  </template>
  
  <script>
  import { PacienteDataService } from '../services/PacienteDataService';
  
  export default {
    name: "pacientes-new",
    data() {
      return {
        paciente: {
          id: null,
          nome: "",
          data_nascimento: "",
          endereco: "",
          telefone: "",
          email: ""
        }
      };
    },
    methods: {
      savePaciente() {
        var data = {
          nome: this.paciente.nome,
          data_nascimento: this.paciente.data_nascimento,
          endereco: this.paciente.endereco,
          telefone: this.paciente.telefone,
          email: this.paciente.email
        };
  
        const pacienteService = new PacienteDataService();
        pacienteService.create(data)
          .then(response => {
            console.log(response.data);
            this.$router.push('/pacientes')
          })
          .catch(e => {
            console.log(e);
          });
      }
    }
  }
  </script>
  
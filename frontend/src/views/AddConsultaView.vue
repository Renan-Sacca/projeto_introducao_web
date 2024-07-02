<template>
    <div>
        <h4>Criar nova Consulta</h4>

        <div class="col-md-6">
            <div class="form-group">
                <label for="paciente_id">Paciente ID</label>
                <input type="text" class="form-control" id="paciente_id" name="paciente_id" v-model="consulta.paciente_id" required>
            </div>
            <div class="form-group">
                <label for="data_hora">Data e Hora</label>
                <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" v-model="consulta.data_hora" required>
            </div>

            <button class="btn btn-success mt-3" @click="saveConsulta">Criar</button>
        </div>
    </div>
</template>

<script>
import TaskDataService from '../services/TaskDataService';

export default {
    name: "consulta-new",
    data() {
        return {
            consulta: {
                id: null,
                paciente_id: "",
                data_hora: ""
            }
        };
    },
    methods: {
        saveConsulta() {
            var data = {
                paciente_id: this.consulta.paciente_id,
                data_hora: this.consulta.data_hora
            };

            TaskDataService.createConsulta(data)
            .then(response => {
                this.consulta.id = response.data.data.id;
                console.log(response.data);
                window.location.href = '/';
            })
            .catch(e => {
                console.log(e);
            });
        }
    }
}
</script>

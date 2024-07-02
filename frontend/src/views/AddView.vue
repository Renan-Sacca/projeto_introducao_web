<template>
    <div>
        <h4>Criar nova tarefa</h4>

        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Nome da terefa</label>
                <input type="text" class="form-control" id="name" name="name" v-model="task.name" required>
            </div>

            <button class="btn btn-success mt-3" @click="saveTask">Criar</button>
        </div>
    </div>
</template>

<script>
import TaskDataService from '../services/TaskDataService';

export default {
    name: "tasks-new",
    data() {
        return {
            task: {
                id: null,
                name: "",
                status: 0
            }
        };
    },
    methods: {
        saveTask() {
            var data = {
                name: this.task.name,
                status: this.task.status
            };

            TaskDataService.create(data)
            .then(response => {
                this.task.id = response.data.data.id;
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
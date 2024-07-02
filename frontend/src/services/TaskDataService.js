import http from "../ApiTodo";

class TaskDataService {
    getAllPacientes() {
        return http.get("/pacientes");
    }

    getAllConsultas() {
        return http.get("/consultas");
    }

    createPaciente(data) {
        return http.post("/pacientes", data);
    }

    createConsulta(data) {
        return http.post("/consultas", data);
    }

    deletePaciente(id) {
        return http.delete(`/pacientes/${id}`);
    }

    deleteConsulta(id) {
        return http.delete(`/consultas/${id}`);
    }
}

export default new TaskDataService();

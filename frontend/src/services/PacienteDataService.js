import http from "../ApiAgendamentos";

class PacienteDataService {
    getAll() {
        return http.get("/pacientes");
    }

    get(id) {
        return http.get(`/pacientes/${id}`);
    }

    create(data) {
        return http.post("/pacientes", data);
    }

    update(id, data) {
        return http.put(`/pacientes/${id}`, data);
    }

    delete(id) {
        return http.delete(`/pacientes/${id}`);
    }
}

export { PacienteDataService };

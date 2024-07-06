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

class ConsultaDataService {
    getAll() {
        return http.get("/consultas");
    }

    get(id) {
        return http.get(`/consultas/${id}`);
    }

    create(data) {
        return http.post("/consultas", data);
    }

    update(id, data) {
        return http.put(`/consultas/${id}`, data);
    }

    delete(id) {
        return http.delete(`/consultas/${id}`);
    }
}

export { PacienteDataService, ConsultaDataService };

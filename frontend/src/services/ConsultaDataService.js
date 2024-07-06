import http from "../ApiAgendamentos";

class ConsultaDataService {
    getAll() {
        return http.get("/consultas")
                   .then(response => response.data.data);
    }

    get(id) {
        return http.get(`/consultas/${id}`)
                   .then(response => response.data);
    }

    create(data) {
        return http.post("/consultas", data)
                   .then(response => response.data);
    }

    update(id, data) {
        return http.put(`/consultas/${id}`, data)
                   .then(response => response.data);
    }

    delete(id) {
        return http.delete(`/consultas/${id}`)
                   .then(response => response.data);
    }
}

export default ConsultaDataService;

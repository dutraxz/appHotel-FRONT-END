// listar todos é uma função que retorna o valor do token armazenado no localStorage()
// para que o usuario permaneça logado mesmo que mude de página e não tenha que "re-logar"
import { getToken } from "./authAPI.js";

// Listar todos os quartos independente de filtro
export async function requisicaoListarQuartos() {
    // Retorna o valor do token armazenado ( que comprova a autenticação do usuário)
    const token = getToken();

    // Função para listar os quartos precisa ser assincrona, pois 
    // espera-se uma "promise" de que chamar o endpoint api/rooms,
    //(que executa p arquivo rooms.php no qual contém todas as requsições possíveis),
    // 
    const response = await fetch("api/rooms", {
        method: "GET",
        hearders: {
            "Accept": "application/json",
            "Content-type": "application/json"
        },
        credentials: "same-origin"

    })

}
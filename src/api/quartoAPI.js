// listar todos é uma função que retorna o valor do token armazenado no localStorage()
// para que o usuario permaneça logado mesmo que mude de página e não tenha que "re-logar"
// import { getToken } from "./authAPI.js";

// // Listar todos os quartos independente de filtro
// export async function requisicaoListarQuartos() {
//     // Retorna o valor do token armazenado ( que comprova a autenticação do usuário)
//     const token = getToken();

    // Função para listar os quartos precisa ser assincrona, pois 
    // espera-se uma "promise" de que chamar o endpoint api/rooms,
    //(que executa p arquivo rooms.php no qual contém todas as requsições possíveis),
    // 
   export async function quartosDisponivelRequest({ dataInicio, dataFim, qtd }) {

    const params = new URLSearchParams();
    if (dataInicio) params.set("dataInicio", dataInicio);
    if (dataFim) params.set("dataFim", dataFim);
    if (qtd !== null && qtd !== "") params.set("qtd", String(qtd));

    const url = `api/quarto/disponivel?${params.toString()}`;

    const response = await fetch(url, {
        method: "GET",
        headers: {
            "Accept": "application/json",
        },
        credentials: "same-origin"
    });
    let data = null;
    try {
        data = await response.json();
    } catch {
        data = null;
    }
    if (!response.ok) {
        const msg = data?.menssage || "Falha ao  buscar quartos disponiveis!";
        throw new Error(msg);
    }
    const quartos = Array.isArray(data?.Quartos) ? data.Quartos : [];
    console.log(quartos);
    return quartos;

}
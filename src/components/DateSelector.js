export default function DateSelector() {
    const container = document.createElement("div");
    container.className = "search-bar";

    // Campo de destino (hotel/quarto)
    const inputDestino = document.createElement("input");
    inputDestino.type = "text";
    inputDestino.placeholder = "Ver";
    inputDestino.className = "search-input";

    // Campo de datas
    const inputDatas = document.createElement("input");
    inputDatas.type = "text";
    inputDatas.placeholder = "Data de check-in - checkout";
    inputDatas.className = "search-input";

    // Campo de hóspedes
    const inputHospedes = document.createElement("input");
    inputHospedes.type = "text";
    inputHospedes.value = "2 adultos · 0 criança · 1 cômodo";
    inputHospedes.readOnly = true;
    inputHospedes.className = "search-input";

    // Botão de pesquisa
    const btnPesquisar = document.createElement("button");
    btnPesquisar.textContent = "Pesquisar";
    btnPesquisar.className = "btn-pesquisar";

    btnPesquisar.addEventListener("click", () => {
        console.log("🔎 Pesquisando com dados:", {
            destino: inputDestino.value,
            datas: inputDatas.value,
            hospedes: inputHospedes.value,
        });
    });

    // Montagem
    container.appendChild(inputDestino);
    container.appendChild(inputDatas);
    container.appendChild(inputHospedes);
    container.appendChild(btnPesquisar);

    return container;
}

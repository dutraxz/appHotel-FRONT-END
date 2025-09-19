export default function DateSelector() {
    const divDate = document.createElement("div");
    divDate.className = "divDate";

    // Campo de destino (hotel/quarto)
    const dataCheckIn = document.createElement('input');
    dataCheckIn.type = "date";
    dataCheckIn.className = 'card p-3 shadow-lg inputDate';

    // Campo de datas
    const dataCheckOut = document.createElement('input');
    dataCheckOut.type = "date";
    dataCheckOut.className = "card p-3 shadow-lg inputDate";

    // Campo de hóspedes
    const guestAmount = document.createElement('select');
    guestAmount.className = "search-input";
    guestAmount.innerHTML =
    `
    <option value"">Quantas Pessoas?</option>
    <option value"1">1 Quantas Pessoas?</option>
    <option value"2">2 Quantas Pessoas?</option>
    <option value"3">3 Quantas Pessoas?</option>
    <option value"4">4 Quantas Pessoas?</option>
    <option value"5">5 ou mais pessoas?</option>
    `;

    const btnSearchRoom = document.createElement('buttom');
    btnSearchRoom.type = 'submit';
    btnSearchRoom.textContent = 'Pesquisar';
    btnSearchRoom.className = 'btn btn-primary';

    // Montagem
    divDate.appendChild(dataCheckIn);
    divDate.appendChild(dataCheckOut);
    divDate.appendChild(guestAmount);
    divDate.appendChild(btnSearchRoom);

    return divDate;
}

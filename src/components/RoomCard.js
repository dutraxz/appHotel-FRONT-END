function calculoDiaria (checkIn, checkOut) {
    //Feito para teste
    //const checkIn = "2026-01-01";
    //const checkOut = "2026-01-08";

    const [yin, min, din] = String(checkIn).split("-").map(Number);
    const [yout, mout, dout] = String(checkOut).split("-").map(Number);
    // console.log ("Che-in formatado" + yin + min + din + "\nCheck-out formatado:" +
    //     yout + mout + dout);

    const tzin = Date.UTC(yin, min -1, din);
    const tzout = Date.UTC(yout, mout -1, dout);

    return Math.floor((tzout - tzin) / (1000 * 60 * 60 * 24));
}
export default function RoomCard(itemCard, index = 0) {
    const {
        id,
        nome,
        numero,
        camaCasal,
        camaSolteiro,
        preco
    } = itemCard || {};

    const title = nome;

    const camas = [
        (camaCasal != null ? `${camaCasal} cama(s) de casal` : null),
        (camaSolteiro != null ? `${camaSolteiro} cama(s) de solteiro` : null),
    ].filter(Boolean).join(' - ');
    
    const card = document.createElement('div');
    card.className = "card";
    card.innerHTML =
    //Bootstrap
    `
    <div class="card" style="width: 18rem;">
        <div id="carouselExampleIndicators-${index}" class="carousel slide">
            <div class="carousel-indicators">
                <button visually-hiddentype="button" data-bs-target="#carouselExampleIndicators-${index}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators-${index}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators-${index}" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
  
            <div class="carousel-inner shadow">
                <div class="carousel-item active">
                    <img src="public/assets/images/quartoazul.jpg" class="d-block w-100" alt="...">
                </div>

                <div class="carousel-item">
                    <img src="public/assets/images/quartoazul1.jpg" class="d-block w-100" alt="...">
                </div>

                <div class="carousel-item">
                    <img src="public/assets/images/quartoazul2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators-${index}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
 
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators-${index}" data-bs-slide="next">
                <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
        
        <div class="card-body">
            <h5 class="card-title">${title}</h5>
            <ul class="list-unstyled mb-2">
                ${camas? `<li>${camas}` : ""}
                ${preco != null ? `<li>Preço - Diaria: R$ ${Number(preco).toFixed(2)}</li>` : ""}
            </ul>
<<<<<<< HEAD
            <a href="#" class="btn btn-primary btn-reservar">Reservar</a>
=======
            <a href="#" class="btn btn-primary mt-auto">Reservar</a>
>>>>>>> ea6d5a0cf2a90185cbe1351b28616aa08fe97a11
        </div>
    </div>
    `;
    card.querySelector('.btn-reservar').addEventListener('click', (event) => {
        event.preventDefault();

        //Ler informaçõessetadas nos inputs Check-in, Check-out e guestAmount (seu)
        const idDateCheckIn = document.getElementById('id-dateCheckIn');
        const idDateCheckOut = document.getElementById('id-dateCheckOut');
        const idGuestAmount = document.getElementById('id-guestAmount');
        
        const inicio = (idDateCheckIn?.value || "");
        const fim = (idDateCheckOut?.value || "");
        const qtd = parseInt(idGuestAmount?.value || "0", 10);

        //Validar se as datas foram preenchidas => contexto: usuario pesquisou quartos disponiveis, mas
        //na hora de simplesmente resevar, usuario voltou ao compo de checkin ou checkout e apagou os valores
        //e limpou a informação de lá, mas não setou uma nova pwsquisa p/ buscar novamente os quartos disponiveis quartos
        if (!inicio || !fim || Number.isNaN(qtd) || qtd <= 0) {
            console.log("Preencha todos os campos");
            //TAREFA 1: renderizar nesse if() posteriormente um moddal do bootstrap
            return;
        }

        const daily = calculoDiaria(inicio, fim);
        //Calculo do valor subtotal do quarto(preco * n° diaria)
        const subtotal = parseFloat(preco?? 0) * daily;
        
        const novoItemReserva = {
            id,
            nome,
            checkIn: inicio,
            chechkOut: fim,
            guests: qtd,
            daily,
            subtotal
        }
        addItemToNovoHotel_Cart(novoItemReserva);
        //Alerta pode ser trocado por um modeal com melhor aparencia
        alert(`Reserva do quarto adicionada: ${nome} - Preço/diarias: R$ ${preco}
            - N° de diárias: ${daily} - Subtotal: R$ ${subtotal}`);
        }); 
        return card;
    }
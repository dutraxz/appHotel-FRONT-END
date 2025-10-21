export default function RoomCard(itemCard, index = 0) {
    const {
        nome,
        numero,
        camaCasal,
        camaSolteiro,
        preco
    } = itemCard || {};

    const title = nome;

    const camas = [
        (camaCasal != null ? _`${camaCasal} cama(s) de casal` : null),
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
           ${preco != null ? `<li>Preco: R$ ${Number(preco).toFixed(2)}</li>` : ""}
            </ul>
            <a href="#" class="btn btn-primary mt-auto">Reservar</a>
        </div>
    </div>


    `;
    return card;
}
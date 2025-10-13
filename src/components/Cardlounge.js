export default function CardLounge(cardLoungeItem, index = 0){

    const{
        caminho,
        titulo,
        texto
    } = cardLoungeItem || {}

    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
    <div class="card lounge-card" style="width: 18rem; height: 17rem;">
        <img src="public/assets/images/${caminho}" style="height: 15rem"
        class="card-img-top" alt="${titulo}">
        <div class="btn-group dropup w-100">
            <button type="button" class="btn w-100 lounge-header lounge-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border: none";>
                <span class="lounge-toggle-icon" aria-hidden="true">
                    <img src="public/assets/images/caret-up-fill.svg"
                width="20" height="20">
               <h3 class="card-text" style="font-size: 1rem;
               font-weight: 700;">${titulo}</h3>
            </button>
            <ul class="dropdown-menu w-100 lounge-dropdown"
            style="border-radius: 0.375rem 0.375rem 0 0;">
               <p class="card-text" style="text-align: center";>${texto}</p>
            </ul>
        </div>
    </div>
    `

    return wrapper.firstElementChild;
}

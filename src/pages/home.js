import { quartosDisponivelRequest } from "../api/quartoAPI.js";
import DataSelector from "../components/DateSelector.js";
import Hero from "../components/Hero.js";
import Navbar from "../components/Navbar.js";
import RoomCard from "../components/RoomCard.js";
import Footer from "../components/Footer.js";

    export default function renderHomePage() {
        //Navbar
        const nav = document.getElementById('navbar');
        nav.innerHTML = '';
        const navbar = Navbar();
        nav.appendChild(navbar);

        // Adiciona o link para a página de cadastro
        //Root - corpo da pagina
        const divRoot = document.getElementById('root');
        root.innerHTML = '';

        const hero = Hero();
        divRoot.appendChild(hero);
        
        const dateSelector = DataSelector();
        divRoot.appendChild(dateSelector);

        const [dateCheckIn, dateCheckOut] = dateSelector.querySelectorAll('input[type="date"]');
        const guestAmount = dateSelector.querySelector('select');
        const btnSearchRoom = dateSelector.querySelector('button');

        //Grupo para incorporar cada div de cada card, para aplicar o
        const cardsGroup = document.createElement('div');
        cardsGroup.className = "cards";
        cardsGroup.id = "cards-result";
        cardsGroup.innerHTML = '';
        
        btnSearchRoom.addEventListener('click', async (e) =>{
            e.preventDefault();
            
            //teste
            const dataInicio = (dateCheckIn?.value || "").trim();
            const dataFim = (dateCheckOut?.value || "").trim();
            const qtd = parseInt(guestAmount?.value || "0", 10);
            
            //Validação do preenchimento de infos
            if (!dataInicio || !dataFim || Number.isNaN(qtd) || qtd <= 0) {
                console.log ("Preencha todos os campos");
                /* Tarefa 1: Renderizar nesse if() posteriormente um modal do bootstrap!
            https://getbootstrap.com/docs/5.3/components/modal/ */
                return;
            }
            /*OBS.: falta impedir que o usuário pesquise por uma data passada!*/
            const dtInicio = new Date (dataInicio);
            const dtFim = new Date (dataFim);

            /* Tarefa 2: Renderizar nesse if() posteriormente um modal do bootstrap!
            https://getbootstrap.com/docs/5.3/components/modal/ */
            if(isNaN(dtInicio) || isNaN(dtFim) || dtInicio >= dtFim) {
                console.log("A data de check-in não pode ser posterior à data de check-out!");
                return;
            }

            console.log("Buscando quartos disponiveis...");
                // Tarefa 3: Renderizar na tela um símbolo de loading (spinner do bootstrap)

            try{
                const result = await quartosDisponivelRequest({dataInicio, dataFim, qtd});
                if(!result.length) {
                console.log("Nenhum quarto disponivel para esse periodo!");
                return;
            }
            cardsGroup.innerHTML = '';
            result.forEach( (itemCard, i) => {
                cardsGroup.appendChild(RoomCard(itemCard, i));
        });
    }
            catch(error) {
                console.log(error);
            }
        });

        for (var i = 0; i < 3; i++) {
            const cards = RoomCard(i);
            cardsGroup.appendChild(cards);
            
        }
        
        divRoot.appendChild(cardsGroup);

        //Footer
        const rodape = document.getElementById('rodape');
        rodape.innerHTML = '';
        
        const footer = Footer();
        rodape.appendChild(footer);
    }

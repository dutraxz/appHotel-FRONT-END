import { quartosDisponivelRequest } from "../api/quartoAPI.js";
import DataSelector from "../components/DateSelector.js";
import Hero from "../components/Hero.js";
import Navbar from "../components/Navbar.js";
import RoomCard from "../components/RoomCard.js";
import Footer from "../components/Footer.js";
import Modal from "../components/Modal.js";
import Spinner from "../components/Spinner.js";
import CardLounge from "../components/Cardlounge.js";

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

        //Constante que aloca o valor da data de hoje
        const dataHoje = new Date().toISOString().split("T")[0];
        const [dateCheckIn, dateCheckOut] = dateSelector.querySelectorAll('input[type="date"]');
        dateCheckIn.min = dataHoje;
        dateCheckOut.min = dataHoje; 

        const guestAmount = dateSelector.querySelector('select');
        const btnSearchRoom = dateSelector.querySelector('button');

        // Criar container para cards de infraestrutura (lounge)
        const infraGroup = document.createElement('div');
        infraGroup.className = 'lounge-cards-container';

        const tituloInfra = document.createElement('h2');
        tituloInfra.textContent = "Conheça nosso hotel ";
        tituloInfra.style.textAlign = "center";
        infraGroup.appendChild(tituloInfra);

        // Criar container para os cards de quartos (resultados)
        const cardGroup = document.createElement('div');
        cardGroup.className = 'room-cards-container';
        cardGroup.id = "cards-result";


        const loungeItens = [
        {caminho: "restaurante3.jpg", titulo: "Restaurante",
            texto: "capaz de encantar os paladares mais exigentes. Aprecie o menu exclusivo em ambiente aconchegante, com atendimento personalizado e na charmosa região dos Jardins"},
        {caminho: "recepcao.jpg", titulo: "Recepção", 
            texto: "Nosso hotel possui uma recepção incrivel e sofisticadas para receber nossos clientes. Venha nos cohecer e você terá uma experiência incrível e encantadora"},
        {caminho: "barhotel.jpg", titulo: "Bar", 
            texto: "Um cardápio variado de bebidas e petiscos, unido a uma atmosfera cosmopolita, proporciona momentos únicos entre amigos."}
    ];

        for(let i = 0; i < loungeItens.length; i++){
        const cardLounge = CardLounge(loungeItens[i], i);
        infraGroup.appendChild(cardLounge);
    }

    //A dpeender a data checkin,
    // será calculado o minimo para a data de checkout
    //(O minimo de diarias)

    function dataMinimaCheckOut(dateCheckIn) {
        const minimoDiaria= new Date(dateCheckIn);
        minimoDiaria.setDate(minimoDiaria.getDate() + 1);
        return minimoDiaria.toISOString().split('T')[0];
    }

    //Evento para monitorar a alteração na data de check-in para
    //mudar o calendario de chekOut

    dateCheckIn.addEventListener("change", async (e) => {
        if (this.value) {
            const minimoDataCheckout = dataMinimaCheckOut(this.value);
            dateCheckOut.min = minimoDataCheckout;
        }
    

    });
        
    btnSearchRoom.addEventListener('click', async (e) =>{
        e.preventDefault();
            
            
            const dataInicio = (dateCheckIn?.value || "").trim();
            const dataFim = (dateCheckOut?.value || "").trim();
            const qtd = parseInt(guestAmount?.value || "0", 10);
            
            //Validação do preenchimento de infos
            if (!dataInicio || !dataFim || Number.isNaN(qtd) || qtd <= 0) {
                Modal("Por favor, preencha todos os campos corretamente.", "Campos Obrigatórios");
            return;
            }

            // Validar datas
            const inicio = new Date(dataInicio);
            const fim = new Date(dataFim);

            if (isNaN(inicio) || isNaN(fim) || inicio >= fim) {
            Modal("A data de check-out deve ser posterior à data de check-in.", "Data Inválida");
            return;
            }

            // Mostrar spinner de carregamento
            const spinner = Spinner("Buscando quartos disponíveis...");
            spinner.show();

            try {
            const quartos = await quartosDisponivelRequest({ dataInicio, dataFim, qtd });

            // Esconder spinner
            spinner.hide();

            if (!quartos.length) {
                Modal("Nenhum quarto disponível para esse período. Tente outras datas.");
                return;
            }

            // Limpar container e adicionar cards
            cardGroup.innerHTML = '';
            quartos.forEach((itemCard, i) => {
                cardGroup.appendChild(RoomCard(itemCard, i));
            });
            cardGroup

        }
        catch (error) {
            // Esconder spinner em caso de erro
            spinner.hide();
            console.log("Erro ao buscar quartos:", error);
            Modal("Ocorreu um erro ao buscar os quartos. Tente novamente.", "Erro");
        }
    });

    // Adicionar containers ao root: primeiro infraestrutura, depois resultados
    divRoot.appendChild(infraGroup);
    divRoot.appendChild(cardGroup);

    // Limpar e renderizar footer
    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';
    const footer = Footer();
    rodape.appendChild(footer);
}

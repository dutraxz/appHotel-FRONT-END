import Hero from "../components/Hero.js";
import Navbar from "../components/Navbar.js";
import Footer from "../components/Footer.js";
import RoomCard from "../components/RommCard.js";
import DateSelector from "../components/DateSelector.js";

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

        const rodape = document.getElementById('rodape');
        rodape.innerHTML = '';

        //Footer
        const footer = Footer();
        rodape.appendChild(footer);

         const dateSelector = DateSelector();
        divRoot.appendChild(dateSelector);
        
        const cardsGroup = document.createElement('div');
        cardsGroup.className = "cards";
        
        for(var i = 0; i < 3; i++) {
            const cards = RoomCard(i);
            cardsGroup.appendChild(cards);
        }
        
        divRoot.appendChild(cardsGroup);

       

    }
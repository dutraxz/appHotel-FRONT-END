import Hero from "../components/Hero.js";
import Navbar from "../components/Navbar.js";
import Footer from "../components/Footer.js";
import RoomCard from "../components/RommCard.js";
import DateSelector from "../components/DateSelector.js";

    export default function renderHomePage() {
        const nav = document.getElementById('navbar');
        nav.innerHTML = '';
        const navbar = Navbar();
        nav.appendChild(navbar);

        // Adiciona o link para a página de cadastro
        const divRoot = document.getElementById('root');
        root.innerHTML = '';

        const hero = Hero();
        divRoot.appendChild(hero);

        const rodape = document.getElementById('rodape');
        rodape.innerHTML = '';

        const footer = Footer();
        rodape.appendChild(footer);

        const room = RoomCard();
        divRoot.appendChild(room);

        const container = DateSelector();
        divRoot.appendChild(container)
        
       

        
    
    }
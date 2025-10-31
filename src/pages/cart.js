import NavBar from "../components/Navbar.js";
import Footer from "../components/Footer.js";
import CartFooter from "../components/CartFooter.js";
import CartHeader from "../components/CartHeader.js";

export default function renderCartPage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';

    const navbar = NavBar();
    nav.appendChild(navbar);

    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    
    // Criar container principal do carrinho
    const cartContainer = document.createElement('div');
    cartContainer.className = 'cart-container';
    cartContainer.style.marginTop = '10%';

    // Adicionar cabeçalho
    const cartHeader = CartHeader();
    cartContainer.appendChild(cartHeader);

    // Adicionar lista de quartos
    const roomsList = document.createElement('div');
    roomsList.className = 'rooms-list';
    
    
    cartContainer.appendChild(roomsList);

    // Adicionar rodapé
    const cartFooter = CartFooter();
    cartContainer.appendChild(cartFooter);

    divRoot.appendChild(cartContainer);

    const foot = document.getElementById('rodape');
    foot.innerHTML = '';
        
    const footer = Footer();
    footer.appendChild(footer);
}
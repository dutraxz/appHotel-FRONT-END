// src/pages/cart.js
import Navbar from "../components/Navbar.js";
import Footer from "../components/Footer.js";
import CartTable from "../components/CartTable.js";

export default function renderCartPage() {
    // Navbar
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    nav.appendChild(Navbar());

    // Corpo da página
    const root = document.getElementById('root');
    root.innerHTML = '';
    
    const columnTable = document.getElementById('div');
    columnTable.appendChild();

    // Footer
    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';
    rodape.appendChild(Footer());
}

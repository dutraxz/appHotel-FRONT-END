import LoginForm from "../components/loginForm.js";
import Navbar from "../components/Navbar.js";

export default function renderLoginPage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    const titulo = document.createElement('h1');
    titulo.textContent = 'Faça login ou crie sua conta';
    titulo.className = 'titulo';
    titulo.style.textAlign = 'center';

    const container = document.createElement('div');
    container.className = 'card p-4 shadow-lg';
    container.style.width = '100%';
    container.style.maxWidth = '400px';

    const formulario = LoginForm();
    
    // Adiciona o link para a página de cadastro
    const registerLink = document.createElement('a');
    registerLink.textContent = "Criar nova conta";
    registerLink.href = "register.html";
    registerLink.className = 'btn btn-link mt-2';
    registerLink.style.textDecoration = 'none';

    formulario.appendChild(registerLink);

    container.appendChild(titulo);
    container.appendChild(formulario);
    divRoot.appendChild(container);
}
import Navbar from "../components/Navbar.js";
import LoginForm from "../components/loginForm.js";

export default function renderRegisterPage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    const titulo = document.createElement('h1');
    titulo.textContent = 'Crie sua conta';
    titulo.className = 'titulo';
    titulo.style.textAlign = 'center';

    const container = document.createElement('div');
    container.className = 'card p-4 shadow-lg';
    container.style.width = '100%';
    container.style.maxWidth = '500px';

    const formulario = LoginForm();

    // Adiciona o campo de 'Nome' antes do campo de e-mail
    const nome = document.createElement('input');
    nome.type = 'text';
    nome.placeholder = "Digite seu nome";
    nome.required = true;
    formulario.prepend(nome);

    // Adiciona o campo 'Confirmar Senha' após o campo de senha
    const passwordConfirm = document.createElement('input');
    passwordConfirm.type = 'password';
    passwordConfirm.placeholder = "Confirme sua senha";
    passwordConfirm.required = true;
    formulario.insertBefore(passwordConfirm, formulario.querySelector('button[type="submit"]'));
    
    // Altera o texto do botão de 'Entrar' para 'Cadastrar'
    const btnAuth = formulario.querySelector('button[type="submit"]');
    btnAuth.textContent = 'Cadastrar';

    // Cria e adiciona o link para a página de login
    const backToLoginLink = document.createElement('a');
    backToLoginLink.textContent = "Voltar ao Login";
    backToLoginLink.href = "login.html";
    backToLoginLink.className = 'btn btn-link mt-2';
    backToLoginLink.style.textDecoration = 'none';

    formulario.appendChild(backToLoginLink);

    // Adiciona o evento de submit para prevenção de comportamento padrão
    formulario.addEventListener('submit', (e) => {
        e.preventDefault();
        console.log('Formulário de cadastro enviado (dados não processados)');
    });

    container.appendChild(titulo);
    container.appendChild(formulario);
    divRoot.appendChild(container);
}
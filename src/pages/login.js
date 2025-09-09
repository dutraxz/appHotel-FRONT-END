import { loginRequest, saveToken } from "../api/authAPI.js";
import LoginForm from "../components/loginForm.js";
import Navbar from "../components/Navbar.js";



export default function renderLoginPage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const formulario = LoginForm();
    const contentForm = formulario.querySelector('form');

    const inputEmail = contentForm.querySelector('input[type="email"]');
    const inputSenha = contentForm.querySelector('input[type="password"]');



    //Monitora o clique no botão para um evento submeter os dados do form
    contentForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const email = inputEmail.value.trim();
        const password = inputSenha.value.trim();

        try {
            const result = await loginRequest(email, password);
            console.log("login realizado com sucesso", result);
            saveToken(result.token);
            window.location.pathname = "/siteVictor/home";
        }
        catch{
            console.log("Erro inesperado!");
        }
    });
    // Adiciona o link para a página de cadastro
    const btnVoltar = document.createElement('a');
    btnVoltar.textContent = "Register";
    btnVoltar.href = "register";
    btnVoltar.className = 'btn btn-link mt-2';
    btnVoltar.style.textDecoration = 'none';
    formulario.appendChild(btnVoltar);
}
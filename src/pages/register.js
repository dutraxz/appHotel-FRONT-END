import { createRequest } from "../api/clientesAPI.js";
import LoginForm from "../components/loginForm.js";
import Navbar from "../components/Navbar.js";

export default function renderRegisterPage() {
    //Renderiza a navbar
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    //Obtém o fomrulário base de LoginForm
    const loginFormContainer = LoginForm();

    //Modifica o titulo
    const titulo = loginFormContainer.querySelector ('h1');
    titulo.textContent = 'Dont you have an account?';
    titulo.textContent = 'Create your account!';
    titulo.className = 'titulo';
    titulo.style.textAlign = 'center';

    const formulario = loginFormContainer.querySelector('form');
    const btnSubmit = loginFormContainer.querySelector('button');
    btnSubmit.textContent = 'Register';

    // Adiciona o campo de 'Nome' antes do campo de e-mail
    const inputNome = document.createElement('input');
    inputNome.type = 'text';
    inputNome.placeholder = "your name";
    inputNome.className = 'form-control mb-3';
    inputNome.required = true;


    const inputCpf = document.createElement('input');
    inputCpf.type = 'text';
    inputCpf.placeholder = "your cpf";
    inputCpf.className = 'form-control mb-3';
    inputCpf.required = true;

    const inputTelefone = document.createElement('input');
    inputTelefone.type = 'text';
    inputTelefone.placeholder = "your number";
    inputTelefone.className = 'form-control mb-3';
    inputTelefone.required = true;

    const inputEmail = formulario.querySelector('input[type="email"]');
    const inputSenha = formulario.querySelector('input[type="password"]');

    formulario.insertBefore(inputNome, inputEmail);
    formulario.insertBefore(inputCpf, inputEmail);
    formulario.insertBefore(inputTelefone, inputEmail);

    // Adiciona o campo 'Confirmar Senha' após o campo de senha
    const passwordConfirm = document.createElement('input');
    passwordConfirm.type = 'password';
    passwordConfirm.placeholder = "Confirm your password";
    passwordConfirm.required = true;
    formulario.insertBefore(passwordConfirm, btnSubmit); //coloca como ultimo o campo confirma senha

    // Cria e adiciona o link para a página de login
    const btnVoltar = document.createElement('a');
    btnVoltar.textContent = "Back to login";
    btnVoltar.href = "login";
    btnVoltar.className = 'btn btn-link mt-2';
    btnVoltar.style.textDecoration = 'none';
    formulario.appendChild(btnVoltar);

    //Monitora o clique no botao para adicionar um evento de submeter os dados do formulario
    formulario.addEventListener("submit", async (e) => {
        e.preventDefault();
        const nome = inputNome.value.trim();
        const cpf = inputCpf.value.trim();
        const telefone = inputTelefone.value.trim();
        const email = inputEmail.value.trim();
        const senha = inputSenha.value.trim();

        try {
            const result = createRequest(nome, cpf, telefone, email, senha);
            //Amanhã será aqui que salvaremos o token assim que jeff criá-lo
            //saveToken(result.token);
            //window.location.pathname = "/siteVictor/home";
        }
        catch {
            console.log("Erro inesperado!");
        }
    });
    return loginFormContainer;
}
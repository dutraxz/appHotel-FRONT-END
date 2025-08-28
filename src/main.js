import renderHomePage from './pages/home.js';
import renderLoginPage from './pages/login.js';
import renderRegisterPage from './pages/register.js';


//Configuração de rotas
const routes = {

    "/login": renderLoginPage,
    "/register": renderRegisterPage,
    "/home": renderHomePage
    //Novas páginas aqui adicionadas conforme desenvolvidas
};

//Obtém o caminho atual a partir do nome
function getPath() {
    //exem´plo: obetém  (/login)
    const url = (location.pathname || "").replace("/siteVictor/", "/").trim();

    //retorna url se começar com "/", se não, retorna "/home" como padrão
    return url && url.startsWith("/") ? url : "/home"; //retorna url limpa
}

    //Decide o que renderizar com base na rota atual
function renderRoutes() {
    const url = getPath(); //Lê a rota atual, ex: "/register"
    const render = routes[url] || routes["/home"]; //Busca esta rota no mapa
    render(); //Executa a funcção de render na pagina atual
}



//Renderizaçõo
document.addEventListener('DOMContentLoaded', renderRoutes);
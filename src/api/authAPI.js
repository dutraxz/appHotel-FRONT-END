export async function loginRequest(email, senha){
    const dados = {email, password: senha};
    const response = await fetch("api/login", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-type": "application/json"
        },
        body: JSON.stringify(dados),
        //body: new URLSearchParams({ "email":email , "password":senha }).toString(),
        
        /*URL da requisiçao é a mesma da origem dp front(mesmo protocolo http/mesmo dominio
        local/mesma porta 80 do servidoer web apache)
        Front: http://localhost/primesite/public/index.html
        Back: http://localhost/primesite/api/login.php
        */
       credentials: "same-origin"
    });
 
    //Interpreta a resposta como JSON
    let data = null;
    try {
        data = await response.json();
    }
    catch{
        // Se nao for JSON valido, data permanece null
        data = null;
    }

    if(!data || !data.token){
        const message = "Resposta inváliada do servidor. Token ausente";
        return {ok: false, token: null, raw: data, message};
    }
 
    return {
        ok: true,
        token: data.token,
        raw: data
    };
}
    /*Função para salvar a chave do token após a autenticação conrfirmada,
    ao salvar no local storage, o usuário poderá mudar de página, fechar
    o site e ainda assim permanecer logado, DESDE QUE O TEMPO NÃO TENHA EXPIRADO (1hr)*/
export function saveToken(token) {
    localStorage.setItem("auth_token", token);
}
/*Recuperar a chave de cada página que o usuário navegar*/
export function getToken() {
    localStorage.getItem("auth_token");
}
/*Funcção para remover a chave de token quando o usuário deslogar*/
export function cleanToken() {
    localStorage.removetItem("auth_token");
}

 
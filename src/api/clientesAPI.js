export async function createRequest (nome, cpf, telefone, email, senha) {
    const dados = {nome, cpf, telefone, email, senha};
    const response = await fetch("api/cliente", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-type": "application/json"
        },

        body: JSON.stringify(dados),
        credentials: "same-origin"
        //body: new URLSearchParams({ "email":email , "senha":senha }).toString(),
        
        /*URL da requisiçao é a mesma da origem dp front(mesmo protocolo http/mesmo dominio
        local/mesma porta 80 do servidoer web apache)
        Front: http://localhost/primesite/public/index.html
        Back: http://localhost/primesite/api/login.php
        */
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

    return {
        ok: true,
        raw: data
    }
}

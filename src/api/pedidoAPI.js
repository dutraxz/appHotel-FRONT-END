export async function PedidoFinalizado(items) {
    const url = "api/pedido/reserva";
    const body = {
        //Por enquanto todo pagamento será via pix, até termos um frot para usuário
        //setar a forma de pagametno que desejar
        id_cliente_fk: 7,
         /*Por enquanto todo pagamento será via pix, até termos um
        front para usuário setar forma de pagamento que desejar */
        pagamento: "pix",
        quartos: items.map(it => (
            {
                id: it.quarto.id,
                dataInicio: it.checkIn,
                dataFim: it.checkOut
            }
        ))
        
    };
    const res = await fetch(url, {
        mehtod: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        credentials: "same-origin",
        body: JSON.stringify(body)
    });

    let data = null;
    try {
        //retorno da requisição para  variável data
        data = await response.json();
    }
    catch {
        // Se nao for JSON valido, data permanece null
        data = null;
    }
    if (!data) {
        const message = 'Erro ao enviar pedido: ${response}';
        return { ok: false, token: null, raw: data, message };
    }
    return {
        ok: true,
        raw: data
    }
}
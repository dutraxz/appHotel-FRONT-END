export async function PedidoFinalizado(items) {
    const url = "api/pedido/reserva";
    const body = {
        //Por enquanto todo pagamento será via pix, até termos um frot para usuário
        //setar a forma de pagametno que desejar
        pagamento: "pix",
        quartos: items.map(it => (
            {

                id: it.roomId,
                inicio: it.checkIn,
                fim: it.checkOut
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

    if(!res.ok) {
        const message = 'Erro ao enviar pedido: ${res.status}';
        throw new Error(message);
    }
    return res.json();
}
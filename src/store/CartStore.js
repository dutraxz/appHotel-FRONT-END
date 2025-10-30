const key = "novoHotel_cart";

export function setCart(novotel_cart){
    localStorage.setItem(key, JSON.stringify(Array.isArray(novoHotel_cart) ? novoHotel_cart: []));
}
export function getCart(){
    try{
        const raw = localStorage.getItem(key);
        return raw ? JSON.parse(raw) : { status: "draft", item: []};
    }catch{
        return {status: "draft", items: []};
    }
} 
export function addItemToNovoHotel_Cart(item){
    const novotel_cart = getCart();
    novotel_cart.items.push(item);
    setCart(novotel_cart);
    return novotel_cart;
}
export function removeItemToNovoHotel_Cart(i){
    const novotel_cart = getCart();
    novotel_cart.items.splice(i, 1);
    setCart(novotel_cart);
    return novotel_cart;
}
export function clearNovoHotel_Cart(){
    setCart({
        status: "draft",
        item: []

    });
}
export function getTotalItems(){
    const {items} = getCart();
    const total = items.reduce((acc, it) =>
        acc + Number(it.subtotal || 0), 0

    .toExponential



























    
);
return {
    total,
    qtde_items: items.lenght
};
}
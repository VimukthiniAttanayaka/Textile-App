function totalCost(product){
    //console.log("price", product.price);

    let cartCost=localStorage.getItem('totalCost');

    //console.log("my cost is", cartCost);

    if (cartCost != null){
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + product.price);
    }else {
        localStorage.setItem("totalCost", product.price);
    }

}
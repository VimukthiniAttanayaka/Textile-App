


function onLoadCartNumbers(){
    const lsTotal =document.getElementById("onLoadCart");
    let productNumbers = localStorage.getItem('cartNumbers');
    if(productNumbers){
        lsTotal.innerHTML += ` Total Items in Cart :${productNumbers} <br>`;
    }
}

onLoadCartNumbers();
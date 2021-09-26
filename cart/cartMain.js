
let carts = document.querySelectorAll('.add-cart');
let products = [
    {
        name: 'Egle',
        tag: 'product1',
        // catagory:'shoes',
        price: 20,
        incart: 0
    },
];


for(let i = 0; i < carts.length; i++){
    carts[i].addEventListener('click', () => {
        cartNumbers(products[i]);
        totalCost(products[i]);
    })
}


function cartNumbers(product){

    let productNumbers = localStorage.getItem('cartNumbers');

    productNumbers =parseInt(productNumbers);

    if(productNumbers){
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;
    } else {
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(product);
}
function setItems(product){
    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    if (cartItems != null){
        if (cartItems[product.tag] == undefined){
            cartItems ={
                ...cartItems,
                [product.tag]:product
            }
        }
        cartItems[product.tag].incart += 1;
    } else {
        product.incart = 1;

        cartItems = {
            [product.tag]:product
        }
    }
    localStorage.setItem("productInCart", JSON.stringify(cartItems));

}


function displayCart(){

    let cartItems = localStorage.getItem("productInCart");
    console.log(cartItems);

    cartItems= JSON.parse(cartItems);
    let productContainer = document.querySelector(".products");
    let cartCost=localStorage.getItem('totalCost');

    if (cartItems && productContainer) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map(item => {
            productContainer.innerHTML += `
           <div class="product">
            <ion-icon name="close-circle-outline"></ion-icon>
            <img class="imgsize" src="./images/${item.tag}.jpg">
            <span>${item.name}</span>
           </div>
           <div class="price">
            $${item.price},00
           </div>
           <div class="quantity">
            <ion-icon name="arrow-back-circle-outline"></ion-icon>
            <span>${item.incart}</span>
            <ion-icon name="arrow-forward-circle-outline"></ion-icon>
           </div>
           <div class="total">
            RS${item.incart * item.price},00
           </div>
           `;
        });
        productContainer.innerHTML += `
        <div class="basketTotalContainer">
            <h4 class="basketTotalTitle">
            Basket total
            </h4>
            <h4 class="basketTotal">
            RS${cartCost},00
            </h4>
        </div>

       `;
    }
}

displayCart();



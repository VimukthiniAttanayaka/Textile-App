
// this is for print total in cart page

function getTotal(){
    const lsTotal =document.getElementById("lsTotal");
    let total = localStorage.getItem("totalCost");
    lsTotal.innerHTML += ` Total Cost :$${total} <br>`
}
getTotal();
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Cart</title>
</head>
<body>
<header>
    <div class="overlay"></div>
    <nav>
        <h2>SHOP</h2>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="#"></a>About</li>
            <li class="cart">
                <a href="cart.html">
                    <ion-icon name="basket"></ion-icon>Cart <span>0</span>
                </a>
            </li>
        </ul>
    </nav>
</header>
<div class="product-container">
    <div class="product-header">
        <h5 class="product-title">PRODUCT</h5>
        <h5 class="price">PRICE</h5>
        <h5 class="quantity">QUANTITY</h5>
        <h5 class="total">TOTAL</h5>
    </div>
    <div class="products">

    </div>
</div>
<script src="main.js"></script>
<script src="./operations/getTotal.js"></script>
<script src="./operations/totalCost.js"></script>
<script src="./operations/onLoadCartNumbers.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
    let productNumbers = localStorage.getItem('cartNumbers');
    document.querySelector('.cart span').textContent =productNumbers;
</script>
</body>
</html>

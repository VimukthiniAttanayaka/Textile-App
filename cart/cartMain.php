<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$connection =new mysqli('localhost','root','','shopping');
require_once './phpOperations/cartQty.php';
if (isset($_SESSION["email"])) {
    $email=$_SESSION["email"];
} else {
    $email="";
}/*
$query = 'SELECT * FROM cart';
$result = mysqli_query( $connection, $query );
$stack = array();
while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {
    array_push( $stack, $row );
}
*/

//print_r($_SESSION['cartQty']);
$sql = "SELECT catagory, name, quentity FROM cart WHERE user_email='$email'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Category: " . $row["catagory"]. " - Name: " . $row["name"]. " " . $row["quentity"]. "<br>";
    }
} else {
    echo "0 items in Cart";
}
?>
<?php

//$email =$_SESSION['email'];
    $query1 = "SELECT validated FROM client WHERE email = '$email'";
    $select1 = mysqli_query($connection, $query1);
    $user_validation = mysqli_fetch_assoc($select1);
    
        if($user_validation['validated'] == '1'){ ?>
        <center>
        <a href="../checkout.php">
        <button class="btn btn-info">
        <h2>Proceed TO Checkout</h2>
        </button>
        </a>
        </center>
        <?php

        }else{
        //generating random value
        $randomNumber = rand(100000,999999);
        $_SESSION["code"] = $randomNumber;
        ?>
        <center>
        <a href="../email_validation.php">
        <button class="btn btn-info">
        <h2>Proceed TO Checkout</h2>
        </button>
        </a>
        </center>

<?php } ?>
<center>
    <a id='back_to_shopping' href="../home.php">
        <button class="btn btn-info">
            <h2>Back To Shopping</h2>
        </button>
    </a>
</center>
<!--
        <script src="cartMain.js"></script>
        <script src="main.js"></script>
        <script src="./operations/totalCost.js"></script>
         <script src="main.js"></script>
        <script src="./operations/getTotal.js"></script>
        <script src="./operations/totalCost.js"></script>
        <script src="./operations/onLoadCartNumbers.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
-->
</body>
</html>
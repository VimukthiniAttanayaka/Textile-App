<?php
if (isset($_SESSION["email"])) {
    $email=$_SESSION["email"];
} else {
    $email="";
}
if(isset($_SESSION['cartQty'])){
    $connection =new mysqli('localhost','root','','shopping');
    $result = mysqli_query($connection, "SELECT SUM(quentity) AS value_sum FROM cart WHERE user_email='$email'");
    $row = mysqli_fetch_assoc($result);
    $sum = $row['value_sum'];
    $_SESSION['cartQty'] = $sum;

} else {
    $_SESSION['cartQty'] = 0;
}
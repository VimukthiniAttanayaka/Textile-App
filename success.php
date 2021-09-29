<?php
//connect with database
require_once('connection.php');
session_start();

date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d ');
?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>index</title>
    <style>
        .container-fluid {
            padding: 0px !important;
            margin: 0px !important;
        }
    </style>
</head>

<body >
    <div class="container-fluid">
        <?php 
            $total_price = $_SESSION['cart_total'];
            $email = $_SESSION["email"];
            $first_name = $_SESSION['first_name'];
            $last_name = $_SESSION['last_name'];
            $address = $_SESSION['address'];
            $city = $_SESSION['city'];
            $phone_no = $_SESSION['phone_no'];

            $item_list = array();
            $query = "SELECT * FROM cart WHERE user_email='$email'";
            $select = mysqli_query($connection, $query);
            while ($recodes = mysqli_fetch_assoc($select)) {
                $id = $recodes['product_id'];
                $catagery = $recodes['catagory'];
                $quentity = $recodes['quentity'];

                $query1 = "SELECT * FROM $catagery WHERE id=$id";
                $select1 = mysqli_query($connection, $query1);
                $recodes1 = mysqli_fetch_assoc($select1);
                $avalible_item = $recodes1['total_item'];
                //seting image paths
                if ($catagery == "cloths") {
                    $array_value='c:'.$id.'>'.$quentity;
                    
                } else if ($catagery == "shoes"){
                    $array_value='s:'.$id.'>'.$quentity;

                } else if ($catagery == "bags"){
                    $array_value='b:'.$id.'>'.$quentity;
                    
                } else if ($catagery == "toys"){
                    $array_value='t:'.$id.'>'.$quentity;
                }

                $item_list[]=$array_value;
                $sold_item=$quentity;
                $avalible_item=$avalible_item-$quentity;

                $sql = "UPDATE $catagery SET total_item=$avalible_item,sold_item=$sold_item WHERE id=$id";
                if ($connection->query($sql) === TRUE) {
                    echo '<script>window.location = "order_complete.php";</script>';
                } else {
                echo "Error updating record: " . $connection->error;
                }
            } 

            $name = $first_name." ".$last_name;
            $list_item = implode(",",$item_list);
            $orders = "INSERT INTO orders (email, name, list, address, phone_no, total_price, date) 
                    VALUES  ('$email','$name','$list_item','$address','$phone_no','$total_price','$date')"; 
                    mysqli_query($connection, $orders);

            $cart = "DELETE FROM cart WHERE user_email='$email'"; 
            mysqli_query($connection, $cart);
            ?>
    </div>
</body>

</html>
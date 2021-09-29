<?php
//connect with database
require_once('connection.php');

date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d ');
?>
<!DOCTYPE html>
<html>

<head lang="en">
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="styles/before_footer.css">
    <title>Success</title>
    <style>
        body, html {
            height: 100%;
        }

        .bg {
            /* The image used */
            background-image: url("https://s1.1zoom.me/big3/403/Hat_456523.jpg");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="bg">
    <?php include 'navbar.php'; ?>

    <div class="alert alert-success" role="alert" style=" margin: 200px; text-align: center; opacity: 0.7">
    <div>
    <h3>
        your payment was successful
    </h3>
        <h3>
            Thank you for choosing e-textiles ..!
        </h3>
    </div>
    </div>
    <?php include 'before_footer.php'; ?>
    <!--include footer for home page-->
    <?php include 'footer.php'; ?>

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
                echo "Record updated successfully";
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
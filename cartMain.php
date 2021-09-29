<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="styles/before_footer.css">
    <title>Cart Main</title>
</head>
<body>
<!--include navbar-->
<?php include 'navbar.php';

$connection =new mysqli('localhost','root','','shopping');
require_once './cart/phpOperations/cartQty.php';
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
$sql = "SELECT * FROM cart WHERE user_email='$email'";
$result = $connection->query($sql);
$totalCost= 0;

if ($result->num_rows > 0) {
    ?>
    <br><br><br>
    <div class="row" style="font-size: 30px; padding-left: 30px; background-color: greenyellow">
        <div class="col-2">

        </div>
        <div class="col-2">
          Name
        </div>
        <div class="col-2">
           Price
        </div>
        <div class="col-2">
           Quantity
        </div>
        <div class="col-2" style="color: darkblue">
           Sub Total
        </div>
        <div class="col-2">

        </div>

    </div>
    <br>
    <hr>
<?php

    // output data of each row
    while($row = $result->fetch_assoc()) {
        $totalCost += ($row["price"]*$row["quentity"]);

        $id = $row['product_id'];
        $catagery = $row['catagory'];
        //seting image paths
        if ($catagery == "cloths" or $catagery == "shoes") {
            if ($row['men_women_kid'] == 1) {
                $path = "./images/$catagery/men/$id.0.png";
            } else if ($row['men_women_kid'] == 2) {
                $path = "./images/$catagery/women/$id.0.png";
            } else if ($row['men_women_kid'] == 3) {
                $path = "./images/$catagery/kid/$id.0.png";
            }
        } else {
            $path = "./images/$catagery/$id.0.png";
        }
        ?>
        <!--add data for table body-->
        <div class="row" style="padding-left: 30px">
            <div class="col-2">
                <img src="<?php echo $path ?>" alt="cloth" style="width:100px">
            </div>
            <div class="col-2">
                <?php  echo $row['name']; ?>
            </div>
            <div class="col-2">
                <?php echo $row['price']; ?>
            </div>
            <div class="col-2">
                <?php echo $row['quentity']; ?>
            </div>
            <div class="col-2">
                <?php echo $row['quentity']*$row['price'];

                ?>
            </div>
            <div class="col-2">
                <a href="add_cart.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Remove</a>
            </div>

        </div>
        <hr>
    <?php }
    ?>
    <div class="row" style="background-color: aqua; padding: 10px; font-size:30px">
    <div class="col-6">
    </div>
        <div class="col-2" >
            Total Cost :
        </div>
    <div class="col-2">
        <?php echo $totalCost; ?>
    </div>
    </div>
    <hr>

<?php

} else {
    echo "0 items in Cart";
}
?>
<?php $query1 = "SELECT validated FROM client WHERE email = '$email'";
$select1 = mysqli_query($connection, $query1);
$user_validation = mysqli_fetch_assoc($select1);

if($user_validation['validated'] == '1'){ ?>

            <div class="row" style="text-align: right; margin: 50px">

                <a href="checkout.php?totalPrice=<?php echo $totalCost ?>">
                    <button class="btn btn-success" style="background-color: greenyellow; color: darkblue; box-shadow: black 5px 5px ">
                        <h2>Proceed To Checkout</h2>
                    </button>
                </a>
            </div>
            <div class="row">
                <br>
    <?php

}else{
    //generating random value
    $randomNumber = rand(100000,999999);
    $_SESSION["code"] = $randomNumber;?>

    <div class="row" style="text-align: right; margin: 50px">
        <div class="alert alert-danger" role="alert">
            Please Validate Your Email
        </div>
            <button disabled class="btn btn-success">
                <h2>Proceed To Checkout</h2>
            </button>
            <a href="email_validation.php">Validate</a>
    </div>
    <div class="row">
        <br>
<?php }
 include "./before_footer.php";
?>
    </div>
<center style="margin:30px; ">
    <a id='back_to_shopping' href="home.php">
        <button class="btn btn-info" style="box-shadow: black 5px 5px">
            <i class='fas fa-angle-double-down' style='font-size:50px;color:darkblue;'></i>
            <h2>Back To Shopping</h2>
        </button>
    </a>
</center>
<!--include footer -->
<?php include 'footer.php'; ?>
</body>
</html>
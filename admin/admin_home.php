<?php
//connect with database
require_once('../connection.php');
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
    <!--include navbar for home page-->
    <?php include 'admin_navbar.php'; ?>
    <center><h1 style="background-color: lightblue;padding:3%">Admin Home Page</h1></center>
    <div class="row">
        <div class="col-3">
        <a href="overview.php">
            <center><img src="../images/overview.png" alt="home" style="width:300px;height:190px"><br><br>
            <h4>Overview</h4></center></a>
        </div>
        <div class="col-3">
        <a href="user_details.php">
            <center><img src="../images/user_details.png" alt="home" style="width:300px;height:190px"><br><br>
            <h4>User Details</h4></center></a>
        </div>
        <div class="col-3">
        <a href="listing.php">
            <center><img src="../images/product.png" alt="home" style="width:300px;height:190px"><br><br>
            <h4>Product Details</h4></center></a>
        </div>
        <div class="col-3">
        <a href="orders.php">
            <center><img src="../images/orders.png" alt="home" style="width:300px;height:190px"><br><br>
            <h4>Orders</h4></center></a>
        </div>
    </div>
</body>

</html>
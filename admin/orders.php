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
    <title>Cloths Section</title>
    <style>
        .container-fluid {
            padding: 0px !important;
            margin: 0px !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
        <a id='url' href="overview.php">Overview</a>
        <a id='url' href="listing.php">Listings</a>
        <a id='url' href="orders.php">Orders</a> 
        </div>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
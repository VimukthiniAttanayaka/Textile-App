<?php
//connect with database
require_once('connection.php');
?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <div class="container-fluid">
    <!--include navbar for home page-->
    <?php include 'navbar.php';?>

    <img src="./images/home.jpg" alt="home" style="width:100%;">

    <?php include 'before_footer.php';?>
    <!--include footer for home page-->
    <?php include 'footer.php';?>
</div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
<?php
//connect with database
require_once('connection.php');
?>
<!--start session-->
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        .container-fluid {
            padding: 0px !important;
            margin: 0px !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!--include home page-->
        <?php header("Location: ./home.php");?>
        
    </div>
</body>

</html>
<?php session_destroy(); ?>
<?php 
    //connect with database
    require_once('./connection.php');
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
            crossorigin="anonymous">
        <title>email validation</title>
        <style>
            .container-fluid {
                padding: 0px !important;
                margin: 0px !important;
            }
            .sent{
                text-align: center;
                margin: 50px;
                color: green;
                font-size: 20px;
            }
            .not-sent{
                text-align: center;
                margin: 50px;
                color: red;
                font-size: 20px;
            }
            .bg{
                background-image: url("https://img5.goodfon.ru/wallpaper/nbig/0/15/devushka-aziatka-plate-poza-fata-nevesta-oranzhereia-sad-sku.jpg");

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
        <div class="container-fluid">
            <!--include navbar for home page-->
            <?php include 'navbar.php'; ?>
            <?php

            //getting user email as a vaiable value
            if (isset($_SESSION["email"])) {
                $email = $_SESSION["email"];
            } else {
                $email = $_SESSION["email"];
            }

            if (isset($_SESSION['code'])) {
                $code= $_SESSION['code'];
            } else {
                $code="";
            }

            //sending mail
            $to = $email;
            $subject = "This is subject";
            $message = "e-Textiles: Your Validation Code is : $code";
            $header = "From:etextile2021@gmail.com \r\n";
            $retval = mail ($to,$subject,$message,$header);
            if( $retval == true ) {
                echo " <div class='sent'> 
                            Validation Code Send to your email
                        </div>";
            }else {
                echo "<div class='not-sent'>
                        Oops..!, Something wrong we cannot send email to your  email address
                </div>
                    ";
            }

            if(isset($_REQUEST['submit'])){
                $input_code = $_REQUEST['validation_code'];
                if($code==$input_code){
                    $sql = "UPDATE client SET validated = 1 WHERE email='$email'";
                    if ($connection->query($sql) === TRUE) {
                   // echo "Record updated successfully";
                    } else {
                   // echo "Error updating record: ";
                    }
                    echo '<script>window.location = "home.php";</script>';
                    ?>
                    
                <?php }else{?>
                    <div class="alert alert-danger" role="alert">
                        validation code is wrong,enter correct code again
                    </div>
                <?php }
            }
            ?>
            <center><div style="border: 2px solid black;width:35%;background-color: gainsboro; box-shadow: 5px 5px">
                <br><br><br><h4>Validation Form For Your Email</h4><br>
                <p>Enter code what we send your email address</p><br>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <table>
                        <tr>
                            <td id='label'><label for ="validation_code">Validation code : </label></td>
                            <td><input type ="number" name="validation_code" placeholder="" required></td>
                        </tr>

                        <td><button type="submit" class="btn btn-primary" name="submit">Submit</button></td>

                    </table>
                    <a href="home.php?">Skip</a>
                </form><br><br><br>
            </div>

            </center>
        </div>

    </body>
</html>
<!--end connection with database-->
<?php
//mysqli_close($connection);?>
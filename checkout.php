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
        <title>checkout</title>
    </head>
    <body style="background-color: rgb(221, 220, 220);">
        <!--include navbar-->
        <?php include 'navbar.php'; ?>
        <div class="row" id="form">
        <?php
        $totalCost =$_SESSION['cart_total'];

        //variable for store errer messages 
        $error = "";
        if (isset($_REQUEST['submit'])) {
            //storing userinputs into veriables
            $first_name = $_REQUEST['first_name'];
            $last_name = $_REQUEST['last_name'];
            $address = $_REQUEST['address'];
            $city = $_REQUEST['city'];
            $phone_no = $_REQUEST['phone_no'];
            //checking user input fields are empty or not
            if (empty(trim($first_name))) {
                $error = "Please fill first_name";
            } else if (empty(trim($last_name))) {
                $error = "Please fill last_name";
            } else if (empty(trim($address))) {
                $error = "Please fill address";
            } else if (empty(trim($city))) {
                $error = "Please fill city";
            } else if (empty(trim($phone_no))) {
                $error = "Please fill phone_no";
            }

            //sending user inputs database
            else {
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['address'] = $address;
                $_SESSION['city'] = $city;
                $_SESSION['phone_no'] = $phone_no;
                echo '<script>window.location = "paypal.php";</script>';
            }
        }
            ?>
            <center><br><br><h3>Billing Details</h3><center>
            <center><div style="background-color: white;padding:5%;margin-top:2%" class="col-5">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <div class="row">
                    <div class="col">
                        <label for ="first_name">First Name: </label>
                        <input type ="text" name="first_name" placeholder="" required>
                    </div>
                    <div class="col">
                        <label for ="last_name">Last Name: </label>
                        <input type ="text" name="last_name" placeholder="" required>
                    </div>
                </div>
                <div style="text-align: left;" class="row">
                    <label for ="address">Address: </label>
                    <input type ="text" name="address" placeholder="" required>
                </div>
                <div style="text-align: left;" class="row">
                    <label for ="city">City: </label>
                    <input type ="text" name="city" placeholder="" required>
                </div>
                <div style="text-align: left;" class="row">
                    <label for ="phone_no">Phone no: </label>
                    <input type ="text" name="phone_no" placeholder="" required>
                </div><br><br>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            
                </form>
            <div class="row">
                <br><h6>Total Amount = LKR.<?php echo $totalCost ?></h6>
            </div>
        </div></center>
    </body>
</html>
<!--end connection with database-->
<?php mysqli_close($connection);?>
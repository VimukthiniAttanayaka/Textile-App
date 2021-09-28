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
                if(isset($_REQUEST['submit'])){
                    $compani_id = $_REQUEST['compani_id'];
                    $client = "INSERT INTO compani_id (id_no) VALUES ('$compani_id')";
                    mysqli_query($connection,$client);  
                }
                if (isset($_GET['del'])) {
                    $id = $_GET['del'];
                    $client = "DELETE FROM compani_id WHERE id=$id";
                        mysqli_query($connection, $client);
                        echo '<script>window.location = "./user_details.php";</script>';
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
                <div  id="paypal-button" style="text-align:right;">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
                <script src="https://www.paypalobjects.com/api/checkout.js"></script>
            </form>
            <div class="row">
                <br><h6>Total Amount =</h6>
            </div>

        </div></center>
        <script>

        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
            sandbox: 'demo_sandbox_client_id',
            production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
            size: 'small',
            color: 'gold',
            shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                amount: {
                    total: '234.78',
                    currency: 'USD'
                }
                }]
            });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                // Show a confirmation message to the buyer
                window.alert('Thank you for your purchase!');
                window.location.replace("success.php");
            });
            }
        }, '#paypal-button');

        </script>
    </body>
</html>
<!--end connection with database-->
<?php mysqli_close($connection);?>
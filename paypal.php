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
        .paypal {
            height: 400px;
            width: auto;
        }
    </style>
</head>

<body >
    <!--include navbar-->
    <?php include 'navbar.php'; 
    $totalCost =$_SESSION['cart_total'];
    ?>
   <div class="row">
       <img src="https://vectorlogo4u.com/wp-content/uploads/2020/10/paypal-01.png" align="center" class="paypal">
   </div>
    <div  id="paypal-button" style="text-align:center;"></div>
            <script src="https://www.paypalobjects.com/api/checkout.js"></script>

            <span style="visibility: hidden" id="total"><?php echo $totalCost; ?></span>
    <script>
        let total_price = document.getElementById("total").innerHTML;
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
            size: 'large',
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
                    total: total_price,
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
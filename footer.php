<?php
//connect with database
require_once('connection.php');
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
    <title>navbar</title>
</head>

<body>
    <div class="row">
        <div class="col-5">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">  
                    <!--gettng input from user-->
                    <p id='label'><label for="name">Name: </label></p>
                    <p><input type="text" name="name" placeholder="" required></p>
                    <p id='label'><label for="email">Email: </label></p>
                    <p><input type="email" name="email" placeholder="" required></p>
                    <p id='label'><label for="phone-no">Phone No: </label></p>
                    <p><input type="number" name="phone-no" placeholder="" required></p>
                    <p id='label'><label for="feedback">Name: </label></p>
                    <p><input type="text" name="feedback" placeholder="" required></p>
                    <button type="submit" name="submit">Submit</button>
            </form>
        </div>
        <div class="col-7">
            <div class="row">
                <div class="col">
                    <h2>Categories</h2>
                    <div><a id='url' href="compani.php">Men's</a></div>
                    <div><a id='url' href="SignUp-page.php">Women's</a></div>
                    <div><a id='url' href="SignUp-page.php">Kids</a></div>
                    <div><a id='url' href="SignUp-page.php">Cloths</a></div>
                    <div><a id='url' href="SignUp-page.php">Shoes</a></div>
                    <div><a id='url' href="SignUp-page.php">Bags</a></div>
                    <div><a id='url' href="SignUp-page.php">Toys</a></div>
                </div>
                <div class="col">
                    <h2>Information</h2>
                    <div><a id='url' href="SignUp-page.php">About Us</a></div>
                    <div><a id='url' href="SignUp-page.php">Privacy & Policy</a></div>
                    <div><a id='url' href="SignUp-page.php">Delivery Information</a></div>
                    <div><a id='url' href="SignUp-page.php">Contact</a></div>
                    <div><a id='url' href="SignUp-page.php">Terms & Conditions</a></div>
                    <div><a id='url' href="SignUp-page.php">Return & Exchangers</a></div>
                </div>
            </div>
            <div class="row">
                <h3>Accepted payment methods</h3>
                <img src="./images/payment-method.png" alt="payment methods">

            </div>
        </div>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>


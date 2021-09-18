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
    <title>Footer</title>
    <style>
        body{
            background-color: black;
            padding-top: 3%;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    //variable for store errer messages 
    $error = "";
    if (isset($_REQUEST['submit'])) {
        //storing userinputs into veriables
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $phone_no = $_REQUEST['phone_no'];
        $feedback = $_REQUEST['feedback'];
        //checking user input fields are empty or notg
        if (empty(trim($name))) {
            $error = "Please enter Name";
        } else if (empty(trim($email))) {
            $error = "Please enter email";
        } else if (empty(trim($phone_no))) {
            $error = "Please enter phone number";
        } else if (empty(trim($feedback))) {
            $error = "Please enter Feedback";
        }
        //sending user inputs database
        else {
            $query = "INSERT INTO feedback_form(name,phone_no,email,feedback) VALUES ('$name','$phone_no','$email','$feedback')";
            mysqli_query($connection, $query);
            header("Location: ./connection.php?sighup=success");
        }
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <h2>Customer Feedback</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <!--errer masseges write in webpage-->
                    <p colspan="2" align="center">
                    <p style="color: red;"><?php echo $error; ?></p>
                    </p>
                    <!--gettng input from user-->
                    <p id='label'><label for="name">Name: </label></p>
                    <p><input type="text" name="name" placeholder="" required></p>
                    <p id='label'><label for="email">Email: </label></p>
                    <p><input type="email" name="email" placeholder="" required></p>
                    <p id='label'><label for="phone_no">Phone No: </label></p>
                    <p><input type="number" name="phone_no" placeholder="" required></p>
                    <p id='label'><label for="feedback">Feedback: </label></p>
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
                    <img src="./images/payment-method.png" alt="payment methods" style="width:280px;height:50px;">

                </div>
            </div>
        </div>
    </div>
</body>

</html>
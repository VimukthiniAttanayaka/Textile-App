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
    <link rel="stylesheet" href="./styles/login.css">
    <title>Registration-form</title>
</head>

<body>
<div class="container-fluid">
    <!--include navbar for home page-->
    <?php include 'navbar.php';?>
        <?php
        //variable for store errer messages 
        $error = "";
        if (isset($_REQUEST['submit'])) {
            //storing userinputs into veriables
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];
            $password_confirm = $_REQUEST['password_confirm'];
            //checking user input fields are empty or not
            if (empty(trim($email))) {
                $error = "Please fill email";
            } else if (empty(trim($password))) {
                $error = "Please fill password";
            } else if (empty(trim($password_confirm))) {
                $error = "Please fill conform password";
            }
            //checking two passwords are matching or not
            else if ($password !== $password_confirm) {
                $error = "Password did not matching";
            }
            //sending user inputs database
            else {
                $password = md5($password);
                $client = "INSERT INTO client (email,password) VALUES ('$email','$password')";
                mysqli_query($connection, $client);
                $_SESSION["email"] = $email;
                //generating random value
                $randomNumber = rand(100000,999999);
                $_SESSION["code"] = $randomNumber;
                
                echo '<script>window.location = "email_validation.php";</script>';
            }
        }

        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            $client = "DELETE FROM client WHERE id=$id";
                mysqli_query($connection, $client);
                echo '<script>window.location = "./admin/user_details.php";</script>';
        }
        ?>
        
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="row-lg justify-content-center">
                <div class="row">
                    <!--errer masseges write in webpage-->
                    <p colspan="2" align="center">
                    <p style="color: red;"><?php echo $error; ?></p>
                    </p>
                    <!--gettng input from user-->
                    <p id='label'><label for="email">Email: </label></p>
                    <p><input type="email" name="email" placeholder="" required>
                    <p id='label'><label for="password">Password: </label></p>
                    <p><input type="password" name="password" placeholder="">
                    <p id='label'><label for="password_confirm">Confirm Password: </label></p>
                    <p><input type="password" name="password_confirm" placeholder="">
                    <p>Allready have a account? <a href="client_login.php">Log-In</a></p>
                    <div class="col"><button class="btn btn-secondary"type="reset">Clear</button></div>
                    <div class="col"><button class="btn btn-primary" type="submit" name="submit">Register</button></div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
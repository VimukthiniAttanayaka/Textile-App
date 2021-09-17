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
    <title>Registration-form</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?Php
            //variable for store errer messages
            $error = "";
            if (isset($_REQUEST['submit'])) {
                //storing userinputs into veriables
                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                $password = md5($password);
                //checking user input fields are empty or not
                if (!empty($email) && !empty($password)) {
                    //getting database information
                    $query = "SELECT * FROM admin WHERE email='$email'";
                    $select = mysqli_query($connection, $query);
                    $recodes = mysqli_fetch_assoc($select);
                    if ($recodes && $password == $recodes['password']) {
                        //checking password matching or not
                        $_SESSION["email"] = $email;
                        header("Location: connection.php?");
                    } else {
                        $error = "Check your e-mail and Password again";
                    }
                } else {
                    $error = "Please Enter Details";
                }
            }
            ?>
            <!--admin log in form-->
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="row">
                    <!--errer masseges write in webpage-->
                    <p colspan="2" align="center">
                    <p style="color: red;"><?php echo $error; ?></p>
                    </p>
                    <!--gettng input from user-->
                    <p id='label'><label for="email">Email: </label></p>
                    <p><input type="email" name="email" placeholder="" required></p>
                    <p id='label'><label for="password">Password: </label></p>
                    <p><input type="password" name="password" placeholder="" required></p>
                    <div class="col"><button type="submit" name="submit">Register</button></div>
                    <div class="col"><button type="reset">Clear</button></div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
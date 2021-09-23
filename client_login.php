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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>LogIn-page</title>
    <style>
        .container-fluid {
            padding: 0px !important;
            margin: 0px !important;
        }

        body {
            background-image: url("images/login-background.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
        }

        .row-lg {
            width: 250px;
            align-self: center;
            margin-top: 2%;
            margin-left: 70%;
            padding-bottom: 5%;
            padding-left: 1%;
            background-color: white;
            opacity: 0.755;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!--include navbar for home page-->
        <?php include 'navbar.php'; ?>
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
                $query = "SELECT * FROM client WHERE email='$email'";
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
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="row-lg justify-content-center">
                <!--errer masseges write in webpage-->
                <p colspan="2" align="center">
                <p style="color: red;"><?php echo $error; ?></p>
                </p>
                <!--gettng input from user-->
                <p id='label'><label for="email">Email: </label></p>
                <p><input type="email" name="email" placeholder="" required></p>
                <p id='label'><label for="password">Password: </label></p>
                <p><input type="password" name="password" placeholder="" required></p>
                <p>Don't have a account? <a href="client_register.php">Sign-Up</a></p>
                <div class="row">
                    <div class="col"><button class="btn btn-secondary" type="reset">Clear</button></div>
                    <div class="col"><button class="btn btn-primary" type="submit" name="submit">Log In</button></div>
                </div>
            </div>
        </form>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
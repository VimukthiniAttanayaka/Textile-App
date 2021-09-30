<?php
//connect with database
require_once('../connection.php');
?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Registration-form</title>
    <style>
        #log{
            background-image: url("https://www.wallpaperflare.com/static/826/633/309/luggage-suitcases-baggage-bags-wallpaper.jpg");
        }
        #con{
            background-image: url("https://www.adorama.com/alc/wp-content/uploads/2018/10/modeling-poses-portfolio-feature.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
            padding-bottom: 20%;
        }
    </style>
</head>

<body>
    <div class="container-fluid"  id="log">
        <!--include navbar for home page-->
        <?php include 'admin_navbar.php'; ?>
        <div class="row" id="con">
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
                        echo '<script>window.location = "admin_home.php";</script>';
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
                <div class="row-lg">
                    <!--errer masseges write in webpage-->
                    <p colspan="2" align="center">
                    <p style="color: red;"><?php echo $error; ?></p>
                    </p>
                    <!--gettng input from user-->
                    <p id='label'><label for="email">Email: </label></p>
                    <p><input type="email" name="email" placeholder="" required></p>
                    <p id='label'><label for="password">Password: </label></p>
                    <p><input type="password" name="password" placeholder="" required></p>
                    <p>Don't have a account? <a href="index.php">Sign-Up</a></p>
                    <div class="row">
                        <div class="col"><button class="btn btn-secondary" type="reset">Clear</button></div>
                        <div class="col"><button class="btn btn-primary" type="submit" name="submit">Log In</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
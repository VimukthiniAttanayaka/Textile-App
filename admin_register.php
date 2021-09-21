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
    <style>
        .container-fluid {
            padding: 0px !important;
            margin: 0px !important;
        }

        body {
            background-image: url("./images/login-background.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
        }

        .row-lg {
            width: 250px;
            align-self: center;
            margin-top: 2%;
            margin-left: 70%;
            padding-bottom: 2%;
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
        <div>
            <?php
            //variable for store errer messages 
            $error = "";
            //variable for store admin id
            $admin_id = "";

            if (isset($_REQUEST['submit'])) {
                //storing userinputs into veriables
                $email = $_REQUEST['email'];
                $compani_id = $_REQUEST['compani_id'];
                $password = $_REQUEST['password'];
                $password_confirm = $_REQUEST['password_confirm'];

                //compani id compare
                $query = "SELECT * FROM compani_id";
                $select = mysqli_query($connection, $query);
                while ($recodes = mysqli_fetch_assoc($select)) {
                    if ($compani_id == $recodes['id_no']) {
                        $admin_id = $compani_id;
                        break;
                    }
                }

                //checking user input fields are empty or not
                if (empty(trim($email))) {
                    $error = "Please fill email";
                } else if (empty(trim($compani_id))) {
                    $error = "Please fill compani id";
                } else if (empty(trim($password))) {
                    $error = "Please fill password";
                } else if (empty(trim($password_confirm))) {
                    $error = "Please fill conform password";
                }
                //checking two passwords are matching or not
                else if ($password !== $password_confirm) {
                    $error = "Password did not matching";
                }
                //checking two admin id empty or not
                else if (empty($admin_id)) {
                    $error = "Enter correct id no";
                }
                //sending user inputs database
                else {
                    $password = md5($password);
                    $client = "INSERT INTO admin (email,password,company_id) VALUES ('$email','$password','$admin_id')";
                    mysqli_query($connection, $client);
                    //header("Location: ./connection.php?sighup=success");
                }
            }
            ?>
            <!--admin registation form-->
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="row-lg">
                    <!--errer masseges write in webpage-->
                    <p colspan="2" align="center">
                    <p style="color: red;"><?php echo $error; ?></p>
                    </p>
                    <!--gettng input from user-->
                    <p id='label'><label for="email">Email: </label></p>
                    <p><input type="email" name="email" placeholder="" required></p>
                    <p id='label'><label for="compani_id">Company ID: </label></p>
                    <p><input type="text" name="compani_id" placeholder="" required></p>
                    <p id='label'><label for="password">Password: </label></p>
                    <p><input type="password" name="password" placeholder="">
                    <p>
                    <p id='label'><label for="password_confirm">Confirm Password: </label></p>
                    <p><input type="password" name="password_confirm" placeholder=""></p>
                    <p>Allready have a account? <a href="admin_login.php">Log-In</a></p>
                    <div class="row">
                        <div class="col"><button class="btn btn-secondary" type="reset">Clear</button></div>
                        <div class="col"><button class="btn btn-primary" type="submit" name="submit">Register</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
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
        }
    </style>
</head>

<body>
    <div class="container-fluid" id="log">
        <!--include navbar for home page-->
        <?php include 'admin_navbar.php'; ?>
        <div id="con">
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
                    echo '<script>window.location = "admin_home.php";</script>';
                }
            }
        
            if (isset($_GET['del'])) {
                $id = $_GET['del'];
                $client = "DELETE FROM admin WHERE id=$id";
                    mysqli_query($connection, $client);
                    echo '<script>window.location = "./admin/user_details.php";</script>';
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
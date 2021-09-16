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
        <div>
            <?php
            $query = "SELECT * FROM compani_id";
            $select = mysqli_query($connection, $query);
            while ($recodes = mysqli_fetch_assoc($select)) {
                echo $recodes['id_no'] . "<br>";
            }

            ?>
            <!--page header-->
            <h3>Registration Page</h3>
            <?php
            //variable for store errer messages 
            $error = "";
            if (isset($_REQUEST['submit'])) {
                //storing userinputs into veriables
                $email = $_REQUEST['email'];
                $compani_id = $_REQUEST['compani_id'];
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
                    $client = "INSERT INTO admin (email,password) VALUES ('$email','$password')";
                    mysqli_query($connection, $client);
                    //header("Location: ./connection.php?sighup=success");
                }
            }
            ?>
            <!--admin registation form-->
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <table>
                    <tr>
                        <!--errer masseges write in webpage-->
                        <td colspan="2" align="center">
                            <p style="color: red;"><?php echo $error; ?></p>
                        </td>
                    </tr>
                    <!--gettng input from user-->
                    <tr>
                        <td id='label'><label for="email">Email: </label></td>
                        <td><input type="email" name="email" placeholder="" required></td>
                    </tr>
                    <tr>
                        <td id='label'><label for="compani_id">Company ID: </label></td>
                        <td><input type="number" name="compani_id" placeholder="" required></td>
                    </tr>
                    <tr>
                        <td id='label'><label for="password">Password: </label></td>
                        <td><input type="password" name="password" placeholder=""></td>
                    </tr>
                    <tr>
                        <td id='label'><label for="password_confirm">Confirm Password: </label></td>
                        <td><input type="password" name="password_confirm" placeholder=""></td>
                    </tr>
                    <td><button type="submit" name="submit">Register</button></td>
                    <td><button type="reset">Clear</button></td>
                </table>
            </form>
        </div>
    </div>
</body>

</html>
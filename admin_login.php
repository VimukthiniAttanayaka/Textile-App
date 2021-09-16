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
        <title>Registration-form</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <!--page header -->
                <h3>Log in Page</h3>
                <?Php
                    //variable for store errer messages
                    $error="";
                    if(isset($_REQUEST['submit'])){
                        //storing userinputs into veriables
                        $email=$_REQUEST['email'];
                        $password=$_REQUEST['password'];
                        $password=md5($password);
                        //checking user input fields are empty or not
                        if(!empty($email) && !empty($password)){
                            //getting database information
                            $query = "SELECT * FROM admin WHERE email='$email'";
                            $select = mysqli_query($connection,$query);
                            $recodes = mysqli_fetch_assoc($select);
                            if($recodes && $password==$recodes['password']){
                                //checking password matching or not
                                $_SESSION["email"] =$email;
                                header("Location: connection.php?");	
                            }
                            else{
                                $error="Check your e-mail and Password again";
                            }
                        }
                        else{
                            $error="Please Enter Details";
                        }
                    }
                ?>
                <!--admin log in form-->
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <table>
                        <tr>
                            <!--errer masseges write in webpage-->
                            <td colspan="2" align="center"><p style="color: red;"><?php echo $error; ?></p></td>
                        </tr>
                        <!--gettng input from user-->
                        <tr>
                            <td id='label'><label for ="email">Email: </label></td>
                            <td><input type ="email" name="email" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td id='label'><label for ="password">Password: </label></td>
                            <td><input type ="password" name="password" placeholder="" required></td>
                        </tr>
                        <td><button type="submit" name="submit">Log in</button></td> 
                        <td><button type="reset">Clear</button></td>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
<!--end connection with database-->
<?php mysqli_close($connection);?>
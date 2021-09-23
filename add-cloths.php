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
    <title>add cloths</title>
    <style>
        .container-fluid {
            padding: 0px !important;
            margin: 0px !important;
        }
        body{
            background-image: url("images/login-background.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .row-lg{
            width: 250px;
            align-self: center;
            margin-top: 2%;
            margin-left: 70%;
            justify-content: center;
            padding-left: 1%;
            background-color: white;
            opacity: 0.755;
            padding-bottom: 10px;
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
                $name = $_REQUEST['name'];
                $price = $_REQUEST['price'];
                $size = $_REQUEST['size'];
                $men_women_kid = $_REQUEST['men_women_kid'];
                $discription = $_REQUEST['discription'];
                $total_item = $_REQUEST['total_item'];

                //checking user input fields are empty or not
                if (empty(trim($name))) {
                    $error = "Please fill name";
                } else if (empty(trim($price))) {
                    $error = "Please fill price";
                } else if (empty(trim($size))) {
                    $error = "Please fill size";
                } else if (empty(trim($discription))) {
                    $error = "Please fill discription";
                } else if (empty(trim($total_item))) {
                    $error = "Please fill total_item";
                }
                //sending user inputs database
                else {
                    $client = "INSERT INTO cloths (name,price,size,men_women_kid,discription,total_item) 
                    VALUES ('$name','$price','$size','$men_women_kid','$discription','$total_item')";
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
                    <p id='label'><label for="name">Name: </label></p>
                    <p><input type="text" name="name" placeholder="" required></p>
                    <p id='label'><label for="price">Price: </label></p>
                    <p><input type= number step=0.01 name="price" placeholder="" required></p>
                    <p id='label'><label for="size">Size: </label></p>
                    <p><input type="number" name="size" placeholder=""><p>
                    <p id='label'><label for="men_women_kid">Choose a one:</label></p>
                    <p><select name="men_women_kid">
                        <option value="1">Men</option>
                        <option value="2">Women</option>
                        <option value="3">kid</option>
                    </select></p>
                    <p id='label'><label for="discription">Discription: </label></p>
                    <p><input type="text" name="discription" placeholder=""></p>
                    <p id='label'><label for="total_item">Total Item: </label></p>
                    <p><input type="number" name="total_item" placeholder=""></p>
                    <div class="row">
                        <div class="col"><button class="btn btn-secondary" type="reset">Clear</button></div>
                        <div class="col"><button class="btn btn-primary" type="submit" name="submit">Add</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
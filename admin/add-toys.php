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
    <link rel="stylesheet" href="../styles/add-item.css">
    <title>add toys</title>
</head>

<body>
<?php $id=null;
        $name = null;
        $price = null;
        $total_item = null;
        $update=false;
        ?>
    <div class="container-fluid">
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
                $total_item = $_REQUEST['total_item'];

                //checking user input fields are empty or not
                if (empty(trim($name))) {
                    $error = "Please fill name";
                } else if (empty(trim($price))) {
                    $error = "Please fill price";
                } else if (empty(trim($total_item))) {
                    $error = "Please fill total_item";
                }
                //sending user inputs database
                else {
                    $client = "INSERT INTO toys (name,price,total_item) 
                    VALUES ('$name','$price','$total_item')";
                    mysqli_query($connection, $client);
                    //header("Location: ./connection.php?sighup=success");
                }
            }
            if (isset($_REQUEST['update'])) {
                $id = $_REQUEST['id'];
                $name = $_REQUEST['name'];
                $price = $_REQUEST['price'];
                $total_item = $_REQUEST['total_item'];
            
                $client = "UPDATE toys SET name='$name',price='$price',total_item='$total_item' WHERE id=$id"; 
                    mysqli_query($connection, $client); 
                header('location: listing.php');
            }
        
            if (isset($_GET['del'])) {
                $id = $_GET['del'];
                $client = "DELETE FROM toys WHERE id=$id";
                    mysqli_query($connection, $client);
                header('location: listing.php');
            }
            ?>
            <?php 
                if (isset($_GET['edit'])) {
                    $id = $_GET['edit'];
                    $update = true;
                    $record = mysqli_query($connection, "SELECT * FROM toys WHERE id=$id");

                        $n = mysqli_fetch_array($record);
                        $id = $n['id'];
                        $name = $n['name'];
                        $price = $n['price'];
                        $total_item = $n['total_item'];
                        }
            ?>
            <!--admin registation form-->
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <?php if($update == true){?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <?php }?>
                <div class="row-lg">
                    <!--errer masseges write in webpage-->
                    <p colspan="2" align="center">
                    <p style="color: red;"><?php echo $error; ?></p>
                    </p>
                    <!--gettng input from user-->
                    <p id='label'><label for="name">Name: </label></p>
                    <p><input type="text" name="name" value="<?php echo $name; ?>" placeholder="" required></p>
                    <p id='label'><label for="price">Price: </label></p>
                    <p><input type= number step=0.01 name="price" value="<?php echo $price; ?>" placeholder="" required></p>
                    <p id='label'><label for="total_item">Total Item: </label></p>
                    <p><input type="number" name="total_item" value="<?php echo $total_item; ?>" placeholder=""></p>
                    <div class="row">
                        <div class="col"><button class="btn btn-secondary" type="reset">Clear</button></div>
                        <div class="col"><?php if ($update == true): ?>
                            <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                        <?php else: ?>
                            <button class="btn" type="submit" name="submit" >Add</button>
                        <?php endif ?></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
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
    <title>add cloths</title>
</head>

<body>
<?php $id=null;
        $name = null;
        $price = null;
        $size = null;
        $men_women_kid = null;
        $discription = null;
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
            if (isset($_REQUEST['update'])) {
                $id = $_REQUEST['id'];
                $name = $_REQUEST['name'];
                $price = $_REQUEST['price'];
                $size = $_REQUEST['size'];
                $men_women_kid = $_REQUEST['men_women_kid'];
                $discription = $_REQUEST['discription'];
                $total_item = $_REQUEST['total_item'];
            
                $client = "UPDATE cloths SET name='$name',price='$price',size='$size',men_women_kid='$men_women_kid',discription='$discription',total_item='$total_item' WHERE id=$id"; 
                    mysqli_query($connection, $client); 
                header('location: listing.php');
            }
        
            if (isset($_GET['del'])) {
                $id = $_GET['del'];
                $client = "DELETE FROM cloths WHERE id=$id";
                    mysqli_query($connection, $client);
                header('location: listing.php');
            }
            ?>
            <?php 
                if (isset($_GET['edit'])) {
                    $id = $_GET['edit'];
                    $update = true;
                    $record = mysqli_query($connection, "SELECT * FROM cloths WHERE id=$id");

                        $n = mysqli_fetch_array($record);
                        $id = $n['id'];
                        $name = $n['name'];
                        $price = $n['price'];
                        $size = $n['size'];
                        $men_women_kid = $n['men_women_kid'];
                        $discription = $n['discription'];
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
                    <p id='label'><label for="size">Size: </label></p>
                    <p><input type="number" name="size" value="<?php echo $size; ?>" placeholder=""><p>
                    <p id='label'><label for="men_women_kid">Choose a one:</label></p>
                    <p><select name="men_women_kid" value="<?php echo $men_women_kid; ?>">
                        <option value="1">Men</option>
                        <option value="2">Women</option>
                        <option value="3">kid</option>
                    </select></p>
                    <p id='label'><label for="discription">Discription: </label></p>
                    <p><input type="text" name="discription" value="<?php echo $discription; ?>" placeholder=""></p>
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
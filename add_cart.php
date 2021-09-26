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
    <title>Add data cart</title>
</head>

<body>
    <div class="container-fluid">
    <?php

        $id= $_GET['id'];
        $catagery = $_GET['catagery'];
        $id= str_replace(" ","",$id);

        $query1 = "SELECT * FROM $catagery WHERE id=$id";
        $select1 = mysqli_query($connection, $query1);
        $recodes1 = mysqli_fetch_assoc($select1);

        $product_id = $recodes1['id'];
        $name = $recodes1['name'];
        $price = $recodes1['price'];
        if($catagery=="cloths" or $catagery=="shoes"){
            $men_women_kid=$recodes1['men_women_kid'];
            echo $men_women_kid;
        }

        $quentity = $_REQUEST['quentity'];
        if($catagery=='shoes'||$catagery=='cloths'){
            $size = $_REQUEST['size'];
        }
        else{
            $size='';
        }
        $insert=0;
        $query = "SELECT * FROM cart";
        $select = mysqli_query($connection, $query);

        while ($recodes = mysqli_fetch_assoc($select)) {
            if(($catagery == $recodes['catagory'])&&($id == $recodes['product_id'])){
                $insert=0;
                break;
            }
            else{
                $insert=1;
            }
        }
        
        if (empty($recodes['id'])){
            $insert=1;
        }
        
        if($insert===1){
            if($catagery=="cloths" or $catagery=="shoes"){
                $cart = "INSERT INTO cart (product_id,catagory,name,price,size,men_women_kid,quentity) 
                VALUES ('$product_id','$catagery','$name','$price','$size','$men_women_kid','$quentity' )";
                mysqli_query($connection, $cart);
            } else {
            $cart = "INSERT INTO cart (product_id,catagory,name,price,size,quentity) 
            VALUES ('$product_id','$catagery','$name','$price','$size','$quentity' )";
            mysqli_query($connection, $cart);
            }
        }
            header("Location: cart.php?");
        ?>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
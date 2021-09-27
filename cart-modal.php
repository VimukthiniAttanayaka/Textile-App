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
    </head>
    <body>
        <div class="row">
            <div class="col">
                <center><b>Photo</b></center>
            </div>
            <div class="col">
                <center><b>Name</b></center>
            </div>
            <div class="col">
                <center><b>Price</b></center>
            </div>
        </div><br>
        <?php 
            if (isset($_SESSION["email"])) {
                $email=$_SESSION["email"];
            } else {
                $email="";
            }
            $query2 = "SELECT * FROM cart WHERE user_email='$email'";
            $select2 = mysqli_query($connection, $query2);
            while ($recodes2 = mysqli_fetch_assoc($select2)) {
            $id = $recodes2['product_id'];
            $catagery=$recodes2['catagory'];
            if($catagery=="cloths" or $catagery=="shoes"){
                if ($recodes2['men_women_kid'] == 1) {
                    $path = "./images/$catagery/men/$id.0.png";
                } else if ($recodes2['men_women_kid'] == 2) {
                    $path = "./images/$catagery/women/$id.0.png";
                } else if ($recodes2['men_women_kid'] == 3) {
                    $path = "./images/$catagery/kid/$id.0.png";
                }
            }
            else{
                $path = "./images/$catagery/$id.0.png";
            }
            ?>
            <div class="row">
                <div class="col">
                    <img src="<?php echo $path ?>" alt="cloth" style="width:100px">
                </div>
                <div class="col">
                    <?php echo $recodes2['name']; ?>
                </div>
                <div class="col">
                    <?php echo $recodes2['price']; ?>
                </div>                    
            </div>
        <?php } ?>
    </body>
</html>
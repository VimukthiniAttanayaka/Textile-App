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
    <title>index array</title>
</head>

<body>
    <div class="container-fluid">
    <?php
        
        $query = "SELECT * FROM cart";
        $select = mysqli_query($connection, $query);

            while ($recodes = mysqli_fetch_assoc($select)) {
                echo $recodes['id'];
            }
        ?> 
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>

if (empty($recodes['id'])){
            $insert=1;
        }
        else if ($recodes['id']==1){
            if(($catagery == $recodes['catagory'])&&($id == $recodes['product_id'])){
                $insert=0;
            }
            else{
                $insert=1;
            }
        }
        if (!empty($recodes['id'])){
            while ($recodes = mysqli_fetch_assoc($select)) {
                echo $recodes['id'];
                if(($catagery == $recodes['catagory'])&&($id == $recodes['product_id'])){
                    $insert=0;
                    break;
                }
                else{
                    $insert=1;
                }
            }
        }
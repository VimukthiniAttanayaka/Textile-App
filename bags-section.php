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
    <link rel="stylesheet" href="./styles/section.css">
    <title>Bags Section</title>
</head>

<body>
    <div class="container-fluid">
        <!--include navbar for home page-->
        <?php include 'navbar.php'; ?>
        <!--set main image-->
        <img src="images/bags.png" style="width:100%;"><br><br>

        <div class="row">
            <?php
                //select all bag details in 'bags table'
                $query1 = "SELECT * FROM bags";
                $select1 = mysqli_query($connection, $query1);
                while ($recodes1 = mysqli_fetch_assoc($select1)) {
                    $id=$recodes1['id'];
                    //get image path as a variable
                    $bag = "images/bags/$id.0.png";
                    $catagery = "bags";
                    //make variable for import data to item page
                    $url="item_page1.php?id={$id} & catagery={$catagery}";
                ?> 

                <div class="col-md-4 col-sm-6 col-xs-6">
                    <!--set link pass data to item page -->
                    <a id='url' href="<?php echo $url;?>">
                        <div>    
                            <center><img src=<?php echo $bag ?> alt="cloth" style="width:80%"></center>
                        </div>
                    </a>
                    <div>
                        <center><?php echo $recodes1['name']; ?></center>
                    </div>
                    <div>
                        <center>
                            <h5>Rs.<?php echo $recodes1['price']; ?></h5>
                        </center>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php include 'before_footer.php'; ?>
        <!--include footer for home page-->
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
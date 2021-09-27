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
    <title>Kids Section</title>
</head>

<body>
    <div class="container-fluid">
        <!--include navbar for home page-->
        <?php include 'navbar.php'; ?>
        <img src="images/kids.jpg" style="width:100%;"><br><br>

        <div class="row">
            <!-- cloths-->
            <?php
                $query1 = "SELECT * FROM cloths WHERE men_women_kid =3";
                $select1 = mysqli_query($connection, $query1);
                while ($recodes1 = mysqli_fetch_assoc($select1)) {
                    $id=$recodes1['id'];
                    $cloth = "images/cloths/kid/$id.0.png";
                    $catagery = "cloths";
                    $url="item_page1.php?id={$id} & catagery={$catagery}";
                ?> 

                <div class="col-md-4 col-sm-6 col-xs-6">
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $cloth ?> alt="cloth" style="width:80%"></center>
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
            <!--shoes-->
            <?php
                $query1 = "SELECT * FROM shoes WHERE men_women_kid =3";
                $select1 = mysqli_query($connection, $query1);
                while ($recodes1 = mysqli_fetch_assoc($select1)) {
                    $id=$recodes1['id'];
                    $shoe = "images/shoes/kid/$id.0.png";
                    $catagery = "shoes";
                    $url="item_page1.php?id={$id} & catagery={$catagery}";
                ?> 

                <div class="col-4">
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $shoe ?> alt="shoes" style="width:80%"></center>
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

            <!--toys-->
            <?php
                $query1 = "SELECT * FROM toys";
                $select1 = mysqli_query($connection, $query1);
                while ($recodes1 = mysqli_fetch_assoc($select1)) {
                    $id=$recodes1['id'];
                    $toy = "images/toys/$id.0.png";
                    $catagery = "toys";
                    $url="item_page1.php?id={$id} & catagery={$catagery}";
                ?> 

                <div class="col-4">
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $toy ?> alt="cloth" style="width:80%"></center>
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

            <!--bags-->
            <?php
                $query1 = "SELECT * FROM bags";
                $select1 = mysqli_query($connection, $query1);
                while ($recodes1 = mysqli_fetch_assoc($select1)) {
                    $id=$recodes1['id'];
                    $bag = "images/bags/$id.0.png";
                    $catagery = "bags";
                    $url="item_page1.php?id={$id} & catagery={$catagery}";
                ?> 

                <div class="col-4">
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $bag ?> alt="bag" style="width:80%"></center>
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
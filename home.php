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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/home.css">
    <title>Home</title>
</head>

<body>
    <div class="container-fluid">
        <!--include navbar for home page-->
        <?php include 'navbar.php'; ?>
        <!--home page image-->
        <img src="images/home.jpg" alt="home" style="width:100%;">
        <hr>
        <!--cloths section-->
        <h1>
            <center>Cloths Section</center>
        </h1>
        <!-- cloths main image-->
        <img src="images/cloths.png" style="width:100%;"><br><br>
        <h3>
            <!--link for view all cloths(cloth section page)-->
            <center><a id='view-all' href="cloths-section.php">View All</a></center>
        </h3><br>
        <div class="row">
            <?php
            //home page displayed cloth id's
            $cloths_index = array("1", "2", "5", "7", "13", "9");
            for ($i = 0; $i < count($cloths_index); $i++) {
                $query = "SELECT * FROM `cloths` WHERE id=$cloths_index[$i]";
                $select = mysqli_query($connection, $query);
                $recodes = mysqli_fetch_assoc($select);
                //set image paths
                if ($recodes['men_women_kid'] == 1) {
                    $cloth = "images/cloths/men/$cloths_index[$i].0.png";
                } else if ($recodes['men_women_kid'] == 2) {
                    $cloth = "images/cloths/women/$cloths_index[$i].0.png";
                } else if ($recodes['men_women_kid'] == 3) {
                    $cloth = "images/cloths/kid/$cloths_index[$i].0.png";
                }
                $id=$cloths_index[$i];
                $catagery = "cloths";
                //make variable for import data to item page
                $url="item_page1.php?id={$id} & catagery={$catagery}";
            ?>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <!--set link pass data to item page -->
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $cloth ?> alt="cloth" style="width:80%"></center>
                        </div>
                    </a>
                    <div>
                        <center><?php echo $recodes['name']; ?></center>
                    </div>
                    <div>
                        <center>
                            <h5>Rs.<?php echo $recodes['price']; ?></h5>
                        </center>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
        <!--shoes section-->
        <h1>
            <center>Shoes Section</center>
        </h1>
        <!-- shoes main image-->
        <img src="images/shoes.png" style="width:100%;"><br><br><br>
        <h3>
            <!--link for view all shoes(shoes section page)-->
            <center><a id='view-all' href="shoes-section.php">View All</a></center>
        </h3><br><br>
        <div class="row">
            <?php
            //home page displayed shoe id's
            $shoes_index = array("5", "3", "4", "7", "8", "9");
            for ($i = 0; $i < count($shoes_index); $i++) {
                $query = "SELECT * FROM `shoes` WHERE id=$shoes_index[$i]";
                $select = mysqli_query($connection, $query);
                $recodes = mysqli_fetch_assoc($select);
                //set image paths
                if ($recodes['men_women_kid'] == 1) {
                    $shoe = "images/shoes/men/$shoes_index[$i].0.png";
                } else if ($recodes['men_women_kid'] == 2) {
                    $shoe = "images/shoes/women/$shoes_index[$i].0.png";
                } else if ($recodes['men_women_kid'] == 3) {
                    $shoe = "images/shoes/kid/$shoes_index[$i].0.png";
                }
                $id=$shoes_index[$i];
                $catagery = "shoes";
                //make variable for import data to item page
                $url="item_page1.php?id={$id}& catagery={$catagery}";
            ?>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <!--set link pass data to item page -->
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $shoe ?> alt="cloth" style="width:85%"></center>
                        </div>
                    </a>
                    <div>
                        <center><?php echo $recodes['name']; ?></center>
                    </div>
                    <div>
                        <center>
                            <h5>Rs.<?php echo $recodes['price']; ?></h5>
                        </center>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
        <!--bags section-->
        <h1>
            <center>Bags Section</center>
        </h1>
        <!-- bags main image-->
        <img src="images/bags.png" style="width:100%;"><br><br><br>
        <h3>
            <!--link for view all bagss(bags section page)-->
            <center><a id='view-all' href="bags-section.php">View All</a></center>
        </h3><br><br>
        <div class="row">
            <?php
            //home page displayed bag id's
            $bags_index = array("5", "3", "4");
            for ($i = 0; $i < count($bags_index); $i++) {
                $query = "SELECT * FROM `bags` WHERE id=$bags_index[$i]";
                $select = mysqli_query($connection, $query);
                $recodes = mysqli_fetch_assoc($select);
                //set image paths
                $bag = "images/bags/$bags_index[$i].0.png";

                $id=$bags_index[$i];
                $catagery = "bags";
                //make variable for import data to item page
                $url="item_page1.php?id={$id} & catagery={$catagery}";
            ?>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <!--set link pass data to item page -->
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $bag ?> alt="bag" style="width:85%"></center>
                        </div>
                    </a>
                    <div>
                        <center><?php echo $recodes['name']; ?></center>
                    </div>
                    <div>
                        <center>
                            <h5>Rs.<?php echo $recodes['price']; ?></h5>
                        </center>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
        <!--toys section-->
        <h1>
            <center>Toys Section</center>
        </h1>
        <!-- toys main image-->
        <img src="images/toys.png" style="width:100%;"><br><br><br>
        <h3>
            <!--link for view all toys(toys section page)-->
            <center><a id='view-all' href="toys-section.php">View All</a></center>
        </h3><br><br>

        <div class="row">

            <?php
            //home page displayed toy id's
            $toys_index = array("5", "3", "4");
            for ($i = 0; $i < count($toys_index); $i++) {
                $query = "SELECT * FROM `toys` WHERE id=$toys_index[$i]";
                $select = mysqli_query($connection, $query);
                $recodes = mysqli_fetch_assoc($select);
                //set image paths
                $toy = "images/toys/$toys_index[$i].0.png";

                $id=$toys_index[$i];
                $catagery = "toys";
                //make variable for import data to item page
                $url="item_page1.php?id={$id} & catagery={$catagery}";
            ?>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <!--set link pass data to item page -->
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $toy ?> alt="toy" style="width:85%"></center>
                        </div>
                    </a>
                    <div>
                        <center><?php echo $recodes['name']; ?></center>
                    </div>
                    <div>
                        <center>
                            <h5>Rs.<?php echo $recodes['price']; ?></h5>
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
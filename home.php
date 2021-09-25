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
    <title>Home</title>
    <style>
        .container-fluid {
            padding: 0px !important;
            margin: 0px !important;
        }

        h1 {
            color: darkblue;
            font-size: 500%;
        }

        #view-all {
            text-decoration: none;
            color: white;
            background-color: black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!--include navbar for home page-->
        <?php include 'navbar.php'; ?>
        <!--home page image-->
        <img src="images/home.jpg" alt="home" style="width:100%;">
        <!--cloths section-->
        <h1>
            <center>Cloths Section</center>
        </h1>
        <img src="images/cloths.png" style="width:100%;"><br><br><br>
        <h3>
            <center><a id='view-all' href="cloths-section.php">View All</a></center>
        </h3><br><br>
        <div class="row">

            <?php
            $cloths_index = array("1", "2", "5", "7", "13", "9");
            for ($i = 0; $i < count($cloths_index); $i++) {
                $query = "SELECT * FROM `cloths` WHERE id=$cloths_index[$i]";
                $select = mysqli_query($connection, $query);
                $recodes = mysqli_fetch_assoc($select);
                if ($recodes['men_women_kid'] == 1) {
                    $cloth = "images/cloths/men/$cloths_index[$i].0.png";
                } else if ($recodes['men_women_kid'] == 2) {
                    $cloth = "images/cloths/women/$cloths_index[$i].0.png";
                } else if ($recodes['men_women_kid'] == 3) {
                    $cloth = "images/cloths/kid/$cloths_index[$i].0.png";
                }
                $id=$cloths_index[$i];
                $catagery = "cloths";
                $url="item_page1.php?id={$id} & catagery={$catagery}";
            ?>
                <div class="col-4">
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
        <!--shoes section-->
        <h1>
            <center>Shoes Section</center>
        </h1>
        <img src="images/shoes.png" style="width:100%;"><br><br><br>
        <h3>
            <center><a id='view-all' href="shoes-section.php">View All</a></center>
        </h3><br><br>

        <div class="row">

            <?php
            $shoes_index = array("5", "3", "4", "7", "8", "9");
            for ($i = 0; $i < count($shoes_index); $i++) {
                $query = "SELECT * FROM `shoes` WHERE id=$shoes_index[$i]";
                $select = mysqli_query($connection, $query);
                $recodes = mysqli_fetch_assoc($select);
                if ($recodes['men_women_kid'] == 1) {
                    $shoe = "images/shoes/men/$shoes_index[$i].0.png";
                } else if ($recodes['men_women_kid'] == 2) {
                    $shoe = "images/shoes/women/$shoes_index[$i].0.png";
                } else if ($recodes['men_women_kid'] == 3) {
                    $shoe = "images/shoes/kid/$shoes_index[$i].0.png";
                }
                $id=$shoes_index[$i];
                $catagery = "shoes";
                $url="item_page1.php?id={$id}& catagery={$catagery}";
            ?>
                <div class="col-4">
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
        <!--bags section-->
        <h1>
            <center>Bags Section</center>
        </h1>
        <img src="images/bags.png" style="width:100%;"><br><br><br>
        <h3>
            <center><a id='view-all' href="bags-section.php">View All</a></center>
        </h3><br><br>

        <div class="row">

            <?php
            $bags_index = array("5", "3", "4", "7", "8", "9");
            for ($i = 0; $i < count($bags_index); $i++) {
                $query = "SELECT * FROM `bags` WHERE id=$bags_index[$i]";
                $select = mysqli_query($connection, $query);
                $recodes = mysqli_fetch_assoc($select);
                $bag = "images/bags/$bags_index[$i].0.png";

                $id=$bags_index[$i];
                $catagery = "bags";
                $url="item_page1.php?id={$id} & catagery={$catagery}";
            ?>
                <div class="col-4">
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
        <!--toys section-->
        <h1>
            <center>Toys Section</center>
        </h1>
        <img src="images/toys.png" style="width:100%;"><br><br><br>
        <h3>
            <center><a id='view-all' href="toys-section.php">View All</a></center>
        </h3><br><br>

        <div class="row">

            <?php
            $toys_index = array("5", "3", "4", "7", "8", "9");
            for ($i = 0; $i < count($toys_index); $i++) {
                $query = "SELECT * FROM `toys` WHERE id=$toys_index[$i]";
                $select = mysqli_query($connection, $query);
                $recodes = mysqli_fetch_assoc($select);
                $toy = "images/toys/$toys_index[$i].0.png";

                $id=$toys_index[$i];
                $catagery = "toys";
                $url="item_page1.php?id={$id} & catagery={$catagery}";
            ?>
                <div class="col-4">
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
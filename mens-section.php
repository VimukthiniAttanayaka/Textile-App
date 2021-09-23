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
    <title>Mens Section</title>
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
            color: black;
            border: 5px solid darkblue;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!--include navbar for home page-->
        <?php include 'navbar.php'; ?>
        <img src="images/mens.jpg" style="width:100%;"><br><br>

        <div class="row">
            <!-- cloths-->
            <?php
                $query1 = "SELECT * FROM cloths WHERE men_women_kid =1";
                $select1 = mysqli_query($connection, $query1);
                while ($recodes1 = mysqli_fetch_assoc($select1)) {
                    $id=$recodes1['id'];
                    $query = "SELECT * FROM `cloths` WHERE id=$id";
                    $select = mysqli_query($connection, $query);
                    $recodes = mysqli_fetch_assoc($select);
                    $cloth = "images/cloths/men/$id.0.png";
                    $id=$id;
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
            <!--shoes-->
            <?php
                $query1 = "SELECT * FROM shoes WHERE men_women_kid =1";
                $select1 = mysqli_query($connection, $query1);
                while ($recodes1 = mysqli_fetch_assoc($select1)) {
                    $id=$recodes1['id'];
                    $query = "SELECT * FROM `shoes` WHERE id=$id";
                    $select = mysqli_query($connection, $query);
                    $recodes = mysqli_fetch_assoc($select);
                    $shoe = "images/shoes/men/$id.0.png";
                    $id=$id;
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
                        <center><?php echo $recodes['name']; ?></center>
                    </div>
                    <div>
                        <center>
                            <h5>Rs.<?php echo $recodes['price']; ?></h5>
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
                    $query = "SELECT * FROM `bags` WHERE id=$id";
                    $select = mysqli_query($connection, $query);
                    $recodes = mysqli_fetch_assoc($select);
                        $bag = "images/bags/$id.0.png";
                    $id=$id;
                    $catagery = "bags";
                    $url="item_page1.php?id={$id} & catagery={$catagery}";
                ?> 

                <div class="col-4">
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $bag ?> alt="cloth" style="width:80%"></center>
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
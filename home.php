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

        <img src="./images/home.jpg" alt="home" style="width:100%;">

        <br>
        <h1>
            <center>Cloths Section</center>
        </h1>
        <img src="./images/cloths.png" style="width:100%;">
        <h3>
            <center><a id='view-all' href="client_register.php">View All</a></center>
        </h3>

        <h1>
            <center>Shoes Section</center>
        </h1>
        <img src="./images/shoes.png" style="width:100%;">
        <h3>
            <center><a id='view-all' href="./section/shoes-section.php">View All</a></center>
        </h3>

        <div class="row">

            <?php
            $cloths_index = array("5", "3", "4", "7", "8", "9");
            for ($i = 0; $i < count($cloths_index); $i++) {
                $query = "SELECT * FROM `shoes` WHERE id=$cloths_index[$i]";
                $select = mysqli_query($connection, $query);
                $recodes = mysqli_fetch_assoc($select);
                if ($recodes['men_women_kid'] == 1) {
                    $shoe = "./images/shoes/men/$cloths_index[$i].0.jpg";
                } else if ($recodes['men_women_kid'] == 2) {
                    $shoe = "./images/shoes/women/$cloths_index[$i].0.jpg";
                } else if ($recodes['men_women_kid'] == 3) {
                    $shoe = "./images/shoes/kid/$cloths_index[$i].0.jpg";
                }
                $id=$cloths_index[$i];
                $catagery = "shoes";
                $url="item_page1.php?id={$id} & catagery={$catagery}";
            ?>
                <div class="col-4">
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $shoe ?> alt="cloth" style="width:300px;height:200px"></center>
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
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
    <title>Cloths Section</title>
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
        <?php include '../navbar.php'; ?>
        <img src="../images/cloths.png" style="width:100%;"><br><br>

        <div class="row">

            <?php
                $query1 = "SELECT * FROM cloths";
                $select1 = mysqli_query($connection, $query1);
                while ($recodes1 = mysqli_fetch_assoc($select1)) {
                    $id=$recodes1['id'];
                    $query = "SELECT * FROM `cloths` WHERE id=$id";
                    $select = mysqli_query($connection, $query);
                    $recodes = mysqli_fetch_assoc($select);
                    if ($recodes['men_women_kid'] == 1) {
                        $cloth = "../images/cloths/men/$id.0.png";
                    } else if ($recodes['men_women_kid'] == 2) {
                        $cloth = "../images/cloths/women/$id.0.png";
                    } else if ($recodes['men_women_kid'] == 3) {
                        $cloth = "../images/cloths/kid/$id.0.png";
                    }
                    $id=$id;
                    $catagery = "cloths";
                    $url="../components/item_page1.php?id={$id} & catagery={$catagery}";
                ?> 

                <div class="col-4">
                    <a id='url' href="<?php echo $url;?>">
                        <div>
                            <center><img src=<?php echo $cloth ?> alt="cloth" style="width:300px;height:300px"></center>
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
        <?php include '../before_footer.php'; ?>
        <!--include footer for home page-->
        <?php include '../footer.php'; ?>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
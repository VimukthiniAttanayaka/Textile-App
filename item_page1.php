<?php
//connect with database
require_once('connection.php');
?>
<!--start session-->
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Item Page</title>
    <style>
        #item_detail {
            padding-top: 75px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!--include navbar for home page-->
        <?php include 'navbar.php'; ?>

        <?php
        $id = $_GET['id'];
        $catagery = $_GET['catagery'];

        $query = "SELECT * FROM `shoes` WHERE id=$id";
        $select = mysqli_query($connection, $query);
        $recodes = mysqli_fetch_assoc($select);
        $id = $recodes['id'];
        if ($recodes['men_women_kid'] == 1) {
            $shoe1 = "./images/shoes/men/$id.0.jpg";
            $shoe2 = "./images/shoes/men/$id.1.jpg";
            $shoe3 = "./images/shoes/men/$id.2.jpg";
        } else if ($recodes['men_women_kid'] == 2) {
            $shoe1 = "./images/shoes/women/$id.0.jpg";
            $shoe2 = "./images/shoes/women/$id.1.jpg";
            $shoe3 = "./images/shoes/women/$id.2.jpg";
        } else if ($recodes['men_women_kid'] == 3) {
            $shoe1 = "./images/shoes/kid/$id.0.jpg";
            $shoe2 = "./images/shoes/kid/$id.1.jpg";
            $shoe3 = "./images/shoes/kid/$id.2.jpg";
        }
        $shoe_name = $shoe1;
        ?>

        <script>
            function imageChange(num) {
                <?php echo $shoe_name; ?>
                <?php
                if ($num == 1) {
                    $shoe_name = $shoe1;
                } else if ($num == 2) {
                    $shoe_name = $shoe2;
                } else if ($num == 3) {
                    $shoe_name = $shoe3;
                } ?>
            }
        </script>
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <center><img src=<?php echo $shoe_name ?> alt="cloth" style="width:750px;height:500px"></center>
                </div>
                <div class="row">
                    <div class="col-2">
                        <button onclick="imageChange(1)"><img src=<?php echo $shoe1 ?> style="width:150px;height:100px"></button>
                    </div>
                    <div class="col-2">
                        <button onclick="imageChange(2)"><img src=<?php echo $shoe2 ?> style="width:150px;height:100px"></button>
                    </div>
                    <div class="col-2">
                        <button onclick="imageChange(3)"><img src=<?php echo $shoe3 ?> style="width:150px;height:100px"></button>
                    </div>
                </div>
            </div>
            <div class="col-4" id="item_detail">
                <h3><?php echo $recodes['name']; ?></h3>
                <h5>Rs.<?php echo $recodes['price']; ?></h5>

                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <?php if($catagery=='shoes'||$catagery=='cloths'){?>
                    <p id='label'><label for="size">Size:</label>
                    <?php if($recodes['men_women_kid']==1){ ?>
                        <select name="size">
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                        </select>
                        <?php } else if($recodes['men_women_kid']==2){?>
                            <select name="size">
                            <option value="37">33</option>
                            <option value="38">34</option>
                            <option value="39">35</option>
                            <option value="40">36</option>
                            <option value="41">37</option>
                        </select>
                        <?php } ?>
                    </p>
                    <?php } ?>
                    <p id='label'><label for="quentity">Quentity: </label>
                        <input type="number" min="0" name="quentity" placeholder="">
                    <p>

                        <center><button class="btn btn-primary" type="submit" name="submit" style="width: 250px;">Add To Cart</button></center>
                </form>
                <div>
                    <br><?php echo $recodes['discription']; ?>
                </div>
            </div>
        </div>

        <?php include 'before_footer.php'; ?>
        <!--include footer for home page-->
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
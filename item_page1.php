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
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="./styles/item_list.css">
    <title>Item Page</title>
</head>

<body>
    <div class="container-fluid">
        <!--include navbar for home page-->
        <?php include 'navbar.php'; ?>
        <?php
            if (isset($_SESSION["email"])) {
                $_SESSION["is_logged"] = true;
            } else {
                $_SESSION["is_logged"] = false;
            } ?>
        <?php
        $id = $_GET['id'];
        $catagery = $_GET['catagery'];

        $recodes['men_women_kid'] = 0;
        if ($catagery == 'cloths') {
            $query = "SELECT * FROM `cloths` WHERE id=$id";
        } else if ($catagery == 'shoes') {
            $query = "SELECT * FROM `shoes` WHERE id=$id";
        } else if ($catagery == 'bags') {
            $query = "SELECT * FROM `bags` WHERE id=$id";
        } else if ($catagery == 'toys') {
            $query = "SELECT * FROM `toys` WHERE id=$id";
        }
        $select = mysqli_query($connection, $query);
        $recodes = mysqli_fetch_assoc($select); ?>

        <div class="row">
            <div class="col-8" id="item_img">
                <?php
                if ($catagery == 'shoes' || $catagery == 'cloths') {
                    if ($recodes['men_women_kid'] == 1) {
                        $gender = "/men/";
                    } else if ($recodes['men_women_kid'] == 2) {
                        $gender = "/women/";
                    } else if ($recodes['men_women_kid'] == 3) {
                        $gender = "/kid/";
                    }
                } else {
                    $gender = "/";
                }

                ?>
                <div class="row">
                    <center>
                        <img id="image" src="images/<?php echo $catagery . $gender . $recodes['id']; ?>.0.png" alt="cloth">
                    </center>
                </div>
                <div class="row">
                    <div class="col-2">
                        <button onclick="document.getElementById('image').src='images/<?php echo $catagery . $gender . $recodes['id']; ?>.0.png'" id="img-btn">
                            <img src='images/<?php echo $catagery . $gender . $recodes['id']; ?>.0.png' id="img-sm">
                        </button>
                    </div>
                    <div class="col-2">
                        <button onclick="document.getElementById('image').src='images/<?php echo $catagery . $gender . $recodes['id']; ?>.1.png'" id="img-btn">
                            <img src='images/<?php echo $catagery . $gender . $recodes['id']; ?>.1.png' id="img-sm">
                        </button>
                    </div>
                    <div class="col-2">
                        <button onclick="document.getElementById('image').src='images/<?php echo $catagery . $gender . $recodes['id']; ?>.2.png'" id="img-btn">
                            <img src='images/<?php echo $catagery . $gender . $recodes['id']; ?>.2.png' id="img-sm">
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-4" id="item_detail">
                <h3 id="name"><?php echo $recodes['name']; ?></h3>
                <h5 id="name">Rs.<?php echo $recodes['price']; ?></h5>

                <?php $url = "add_cart.php?id={$id}& catagery={$catagery}"; ?>

                <form method="post" action="<?php echo $url; ?>">
                    <?php if ($catagery == 'shoes' || $catagery == 'cloths') { ?>
                        <p id='label'><label for="size">Size:</label>
                            <?php if ($recodes['men_women_kid'] == 1) { ?>
                                <select name="size">
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                </select>
                            <?php } else if ($recodes['men_women_kid'] == 2) { ?>
                                <select name="size">
                                    <option value="37">33</option>
                                    <option value="38">34</option>
                                    <option value="39">35</option>
                                    <option value="40">36</option>
                                    <option value="41">37</option>
                                </select>
                            <?php } else if ($recodes['men_women_kid'] == 3) { ?>
                                <select name="size">
                                    <option value="37">10</option>
                                    <option value="38">11</option>
                                    <option value="39">12</option>
                                    <option value="40">13</option>
                                    <option value="41">14</option>
                                </select>
                            <?php } ?>
                        </p>
                    <?php } ?>
                    <form>
                        <p id='label'><label for="quentity">Quentity: </label>
                            <input class="plus" onclick="quentity.value++">
                            <input type="number" id="quentity" min="1" name="quentity" placeholder=1 value="1">
                            <input class="minus" onclick="quentity.value--">
                        <p>
                        <div>
                            <?php if ($_SESSION["is_logged"] == true) : ?>
                                <center>
                                    <button class="btn btn-primary" type="submit" name="submit">
                                        Add To Cart
                                    </button>
                                </center>
                            <?php else : ?>
                                <center>
                                    <button class="btn btn-primary" disabled>
                                        Add To Cart
                                    </button>
                                </center>
                                <div class="alert alert-danger" style="margin:20px" role="alert">
                                    Please Login/Signup to system!
                                </div>
                            <?php endif ?>
                        </div>
                    </form>
                    <div>
                        <br><?php echo $recodes['discription']; ?>
                    </div>
            </div>
        </div>

        <br>
        <center>
            <a id='back_to_shopping' href="./home.php">
                <button class="btn btn-info">
                    <i class='fas fa-angle-double-down' style='font-size:50px;color:darkblue;'></i>
                    <h2>Back To Shopping</h2>
                </button>
            </a>
        </center>
        <br>
        <?php include 'before_footer.php'; ?>
        <!--include footer for home page-->
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
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
        //checking client loging or not to the system
        if (isset($_SESSION["email"])) {
            $_SESSION["is_logged"] = true;
        } else {
            $_SESSION["is_logged"] = false;
        }
        //alert for user chose item already added cart or not
        if (isset($_SESSION["msg"])) {
            if ($_SESSION["msg"] == 1) { ?>
                <div class="alert alert-danger" role="alert" style="text-align: center;">
                    This item already in your cart!
                </div>
            <?php $_SESSION["msg"] = 0;
            }
        }
        //get item id and catagery
        $id = $_GET['id'];
        $catagery = $_GET['catagery'];
        //write sql query for select that item
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
                //getting gender as a variable for set item path
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
                    <!--big image-->
                    <center>
                        <img id="image" src="images/<?php echo $catagery . $gender . $recodes['id']; ?>.0.png" alt="cloth">
                    </center>
                </div>
                <div class="row">
                    <!-- router images-->
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
                <!-- write item name and price-->
                <h3 id="name"><?php echo $recodes['name']; ?></h3>
                <h5 id="name">Rs.<?php echo $recodes['price']; ?></h5>
                <!--variable for set form sending path-->
                <?php $url = "add_cart.php?id={$id}& catagery={$catagery}"; ?>
                <!-- form for getting size and quentity-->
                <form method="post" action="<?php echo $url; ?>">
                    <?php if ($catagery == 'shoes' || $catagery == 'cloths') { ?>
                        <p id='label'><label for="size">Size:</label>
                        <!--imput field for get item size-->
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
                    <!--put avalible item count in web page-->
                    <span>Avalible Item: </span>
                    <span id="demo"><?php echo $recodes['total_item']; ?></span>

                    <script>
                        var p = 1;
                        //function for get user input quentity
                        function getQuentity() {
                            var p = document.getElementById('quentity').value;
                            var avalible_item = total_item();
                            updated_value = avalible_item - p;
                            if (updated_value > -1) {
                                document.getElementById("demo").innerHTML = updated_value;
                            } else {
                                document.getElementById("demo").innerHTML = 0;
                            }
                        }
                        //function for get avalible item count in the db
                        function total_item() {
                            var avalible_item = document.getElementById("avalible_item").innerHTML;
                            return avalible_item;
                        }
                        //function for incresing user quentity
                        function quentity_inc() {
                            if (quentity.value < document.getElementById("avalible_item").innerHTML) {
                                quentity.value++;
                            }
                        }
                        //function for dicresing user quentity
                        function quentity_dic() {
                            if (quentity.value > 1) {
                                quentity.value--;
                            }
                        }
                    </script>
                    <!--getting avalible item in db -->
                    <span style="visibility: hidden" id="avalible_item"><?php echo $recodes['total_item']; ?></span>
                    <!--user input field for getting quentity-->
                    <p id='label'><label for="quentity">Quentity: </label>
                        <input class="plus" onclick="quentity_inc(),getQuentity()">
                        <input type="number" id="quentity" min="1" max=<?php echo $recodes['total_item']; ?> name="quentity" placeholder=1 value="1">
                        <input class="minus" onclick="quentity_dic(),getQuentity()">
                    </p>
                    <div>
                        <!--submit button for sending user input for db-->
                        <?php if ($_SESSION["is_logged"] == true) : ?>
                            <center>
                                <button class="btn btn-primary" type="submit" name="submit">
                                    Add To Cart
                                </button>
                            </center>
                        <?php else : ?>
                            <!--if user is not login this system setsubmit button as a disable-->
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
                    <!--write item discription-->
                    <br><?php echo $recodes['discription']; ?>
                </div>
            </div>
        </div>

        <br>
        <center>
            <!--link for home page-->
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
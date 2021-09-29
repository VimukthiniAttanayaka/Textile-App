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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/listing.css">
    <title>Product list</title>
    <style>
        #btn{
            background-color: rgb(45, 219, 45);
            border-radius: 10%;
            margin-right: 20px;
        }
    </style>
</head>

<body style="background-color: rgb(221, 220, 220);">
        <!--include navbar for home page-->
        <?php include 'admin_navbar.php'; ?>
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Chose Catagery :-</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (isset($_REQUEST['submit1'])) {
                        $catagery = $_REQUEST['catagery'];
                        if ($catagery == "bags") {
                            echo '<script>window.location = "./add-bags.php";</script>';
                        } else if ($catagery == "cloths") {
                            echo '<script>window.location = "./add-cloths.php";</script>';
                        } else if ($catagery == "shoes") {
                            echo '<script>window.location = "./add-shoes.php";</script>';
                        } else {
                            echo '<script>window.location = "./add-toys.php";</script>';
                        }
                    } ?>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <p id='label'><label for="catagery">Catagery:</label>
                            <select name="catagery">
                                <option value="bags">bags</option>
                                <option value="cloths">cloths</option>
                                <option value="shoes">shoes</option>
                                <option value="toys">toys</option>
                            </select>
                        <div><center><button class="btn btn-primary" type="submit" name="submit1">Continue</button></center></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
        <div class="col-1">
                <a id='url' href="overview.php">Overview</a>
            </div>
            <div class="col-1">
                <a id='url' href="user_details.php">User Details</a>
            </div>
            <div class="col-1">
                <a id='url' href="listing.php">Product</a>
            </div>
            <div class="col-1">
                <a id='url' href="orders.php">Orders</a>
            </div>
        </div>
        <div class="col">
        <?php
            $num = 0;
            if (array_key_exists('button0', $_POST)) {button0();}
            else if (array_key_exists('button1', $_POST)) {button1();}
            else if (array_key_exists('button2', $_POST)) {button2();}
            else if (array_key_exists('button3', $_POST)) {button3();}
            else if (array_key_exists('button4', $_POST)) {button4();}
            else if (array_key_exists('button5', $_POST)) {button5();}
            else if (array_key_exists('button6', $_POST)) {button6();}
            else if (array_key_exists('button7', $_POST)) {button7();}

            function button0(){$GLOBALS['num']=0;}
            function button1(){$GLOBALS['num']=1;}
            function button2(){$GLOBALS['num']=2;}
            function button3(){$GLOBALS['num']=3;}
            function button4(){$GLOBALS['num']=4;}
            function button5(){$GLOBALS['num']=5;}
            function button6(){$GLOBALS['num']=6;}
            function button7(){$GLOBALS['num']=7;}
        ?>
        <hr>
        <form method="post">
            <input id="btn" type="submit" name="button0" class="button" value="All" />
            <input id="btn" type="submit" name="button1" class="button" value="Men's" />
            <input id="btn" type="submit" name="button2" class="button" value="Women's" />
            <input id="btn" type="submit" name="button3" class="button" value="Kid's" />
            <input id="btn" type="submit" name="button4" class="button" value="Cloths" />
            <input id="btn" type="submit" name="button5" class="button" value="Bags" />
            <input id="btn" type="submit" name="button6" class="button" value="shoes" />
            <input id="btn" type="submit" name="button7" class="button" value="toys" />
        </form>
        <hr>
        </div>
        <div class="row">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Avalible Qty.</th>
                    <th>Sold Qty.</th>
                </tr>
                <?php $query = "SELECT * FROM cloths";
                $select = mysqli_query($connection, $query);
                while ($recodes = mysqli_fetch_assoc($select)) {
                    $id = $recodes['id'];
                    if ($recodes['men_women_kid'] == 1) {
                        $path = "../images/cloths/men/$id.0.png";
                    } else if ($recodes['men_women_kid'] == 2) {
                        $path = "../images/cloths/women/$id.0.png";
                    } else if ($recodes['men_women_kid'] == 3) {
                        $path = "../images/cloths/kid/$id.0.png";
                    }
                    if ($num == 0 or $num == 4 ) { ?>
                        <tr>
                            <td><?php echo $recodes['id']?></td>
                            <td><center><img src="<?php echo $path ?>" alt="cloth" style="width:100px"></center></td>
                            <td><?php echo $recodes['name']; ?></td>
                            <td><?php echo $recodes['size']; ?></td>
                            <td><?php echo $recodes['price']; ?></td>
                            <td><?php echo $recodes['total_item']; ?></td>
                            <td><?php echo $recodes['sold_item']; ?></td>
                            <td><a href="add-cloths.php?edit=<?php echo $recodes['id']; ?>" class="btn btn-primary" >Edit</a></td>
                            <td><a href="add-cloths.php?del=<?php echo $recodes['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                <?php } else if ($num == $recodes['men_women_kid']) { ?>
                        <tr>
                            <td><?php echo $recodes['id']?></td>
                            <td>
                                <center><img src="<?php echo $path ?>" alt="cloth" style="width:100px"></center>
                            </td>
                            <td><?php echo $recodes['name']; ?></td>
                            <td><?php echo $recodes['size']; ?></td>
                            <td><?php echo $recodes['price']; ?></td>
                            <td><?php echo $recodes['total_item']; ?></td>
                            <td><?php echo $recodes['sold_item']; ?></td>
                            <td><a href="add-cloths.php?edit=<?php echo $recodes['id']; ?>" class="btn btn-primary" >Edit</a></td>
                            <td><a href="add-cloths.php?del=<?php echo $recodes['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                <?php }} ?>
                <?php $query = "SELECT * FROM bags";
                $select = mysqli_query($connection, $query);
                while ($recodes = mysqli_fetch_assoc($select)) {
                    if ($num == 0 or $num == 1 or $num == 2 or $num == 3 or $num == 5) { ?>
                        <tr>
                        <td><?php echo $recodes['id']?></td>
                            <td>
                                <center><img src="../images/bags/<?php echo $recodes['id'] ?>.0.png" alt="cloth" style="width:100px"></center>
                            </td>
                            <td><?php echo $recodes['name']; ?></td>
                            <td>-</td>
                            <td><?php echo $recodes['price']; ?></td>
                            <td><?php echo $recodes['total_item']; ?></td>
                            <td><?php echo $recodes['sold_item']; ?></td>
                            <td><a href="add-bags.php?edit=<?php echo $recodes['id']; ?>" class="btn btn-primary" >Edit</a></td>
                            <td><a href="add-bags.php?del=<?php echo $recodes['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                <?php }
                } ?>
                <?php $query = "SELECT * FROM shoes";
                $select = mysqli_query($connection, $query);
                while ($recodes = mysqli_fetch_assoc($select)) {
                    $id = $recodes['id'];
                    if ($recodes['men_women_kid'] == 1) {
                        $path = "../images/shoes/men/$id.0.png";
                    } else if ($recodes['men_women_kid'] == 2) {
                        $path = "../images/shoes/women/$id.0.png";
                    } else if ($recodes['men_women_kid'] == 3) {
                        $path = "../images/shoes/kid/$id.0.png";
                    }
                    if ($num == 0 or $num == 6) { ?>
                        <tr>
                        <td><?php echo $recodes['id']?></td>
                            <td>
                                <center><img src="<?php echo $path ?>" alt="shoe" style="width:100px"></center>
                            </td>
                            <td><?php echo $recodes['name']; ?></td>
                            <td><?php echo $recodes['size']; ?></td>
                            <td><?php echo $recodes['price']; ?></td>
                            <td><?php echo $recodes['total_item']; ?></td>
                            <td><?php echo $recodes['sold_item']; ?></td>
                            <td><a href="add-shoes.php?edit=<?php echo $recodes['id']; ?>" class="btn btn-primary" >Edit</a></td>
                            <td><a href="add-shoes.php?del=<?php echo $recodes['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php } else if ($num == $recodes['men_women_kid']) { ?>
                        <tr>
                        <td><?php echo $recodes['id']?></td>
                            <td>
                                <center><img src="<?php echo $path ?>" alt="shoe" style="width:100px"></center>
                            </td>
                            <td><?php echo $recodes['name']; ?></td>
                            <td><?php echo $recodes['size']; ?></td>
                            <td><?php echo $recodes['price']; ?></td>
                            <td><?php echo $recodes['total_item']; ?></td>
                            <td><?php echo $recodes['sold_item']; ?></td>
                            <td><a href="add-shoes.php?edit=<?php echo $recodes['id']; ?>" class="btn btn-primary" >Edit</a></td>
                            <td><a href="add-shoes.php?del=<?php echo $recodes['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                <?php }} ?>
                <?php $query = "SELECT * FROM toys";
                $select = mysqli_query($connection, $query);
                while ($recodes = mysqli_fetch_assoc($select)) {
                    if ($num == 0 or $num == 7 or $num == 3) { ?>
                        <tr>
                            <td><?php echo $recodes['id']?></td>
                            <td>
                                <center><img src="../images/toys/<?php echo $recodes['id'] ?>.0.png" alt="toy" style="width:100px"></center>
                            </td>
                            <td><?php echo $recodes['name']; ?></td>
                            <td>-</td>
                            <td><?php echo $recodes['price']; ?></td>
                            <td><?php echo $recodes['total_item']; ?></td>
                            <td><?php echo $recodes['sold_item']; ?></td>
                            <td><a href="add-toys.php?edit=<?php echo $recodes['id']; ?>" class="btn btn-primary" >Edit</a></td>
                            <td><a href="add-toys.php?del=<?php echo $recodes['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                <?php }
                } ?>
            </table>
        </div>
        <center><button id="addnew" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Add New</button></center>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
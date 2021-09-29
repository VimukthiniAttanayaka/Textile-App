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
    <title>Orders</title>
</head>

<body style="text-align: center; background-color: rgb(221, 220, 220);">
    <!--include navbar for home page-->
    <?php include 'admin_navbar.php'; ?>
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
        <div class="col-12"><hr>
            <div class="row">
                <div class="col-1"><h4>ID</h4></div>
                <div class="col-2"><h4>Email</h4></div>
                <div class="col-4"><h4>List</h4></div>
                <div class="col-2"><h4>Address</h4></div>
                <div class="col-1"><h4>Total Price</h4></div>
                <div class="col-2">
                    <div class="row">
                        <div class="col-6"><h4>shipped</h4></div>
                        <div class="col-6"><h4>delivered</h4></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <?php $query = "SELECT * FROM orders";
                    $select = mysqli_query($connection, $query);
                    while ($recodes = mysqli_fetch_assoc($select)) {
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-1"><?php echo $recodes['id']?></div>
                            <div class="col-2">
                                <div class="row"><?php echo $recodes['email']; ?></div>
                                <div class="row"><?php echo $recodes['name']; ?></div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-3"><b>Photo</b></div>
                                    <div class="col-3"><b>Name</b></div>
                                    <div class="col-3"><b>Price</b></div>
                                    <div class="col-3"><b>Quentity</b></div>
                                </div>
                                    <?php 
                                    $item_list =$recodes['list'];
                                    $item_list_ar = explode(",", $item_list);
                                    for($i=0;$i<count($item_list_ar);$i++){
                                        $pos1=strpos($item_list_ar[$i], ":");
                                        $pos2=strpos($item_list_ar[$i], ">");
                                        $pos3=strlen($item_list_ar[$i]);
                                        $id_length=$pos2-$pos1-1;
                                        $quentity_length=$pos3-$pos2;
                                        $catagery = substr($item_list_ar[$i] ,0,1);
                                        if($catagery=='c'){ 
                                            $catagery="cloths";
                                        }else if($catagery=='s'){ 
                                            $catagery="shoes";
                                        }else if($catagery=='b'){ 
                                            $catagery="bags";
                                        }else if($catagery=='t'){ 
                                            $catagery="toys";
                                        }
                                        $id = substr($item_list_ar[$i] ,$pos1+1,$id_length);
                                        $quentity= substr($item_list_ar[$i] ,$pos2+1,$quentity_length);
                                        if($catagery=='cloths'){
                                            $query1 = "SELECT * FROM cloths WHERE id=$id";
                                        }else if($catagery=='shoes'){
                                            $query1 = "SELECT * FROM shoes WHERE id=$id";
                                        }else if($catagery=='bags'){
                                            $query1 = "SELECT * FROM bags WHERE id=$id";
                                        }else if($catagery=='toys'){
                                            $query1 = "SELECT * FROM toys WHERE id=$id";
                                        }
                                        $select1 = mysqli_query($connection, $query1);
                                        $recodes1 = mysqli_fetch_assoc($select1);
                                        if ($catagery == 'cloths' || $catagery == 'shoes') {
                                            if ($recodes1['men_women_kid'] == 1) {
                                                $gender = "/men/";
                                            } else if ($recodes1['men_women_kid'] == 2) {
                                                $gender = "/women/";
                                            } else if ($recodes1['men_women_kid'] == 3) {
                                                $gender = "/kid/";
                                            }
                                        } else {
                                            $gender = "/";
                                        }
                        
                                    ?>
                                <div class="row">
                                    <div class="col-3">
                                        <center>
                                            <img id="image" style="width:100px;" src="../images/<?php echo $catagery . $gender . $recodes1['id']; ?>.0.png">
                                        </center>
                                    </div>
                                    <div class="col-3"><?php echo $recodes1['name'];?></div>
                                    <div class="col-3"><?php echo $recodes1['price'];?></div>
                                    <div class="col-3"><?php echo $quentity?></div>
                                </div>
                                <?php }?>
                            </div>
                            <div class="col-2">
                                <div class="row"><?php echo $recodes['address']; ?></div>
                                <div class="row"><?php echo $recodes['phone_no']; ?></div>
                            </div>

                            <div class="col-1"><?php echo $recodes['total_price']; ?></div>
                            <div class="col-2">
                                <div class="row">
                                    <div class="col-6"><input type="checkbox"></div>
                                    <div class="col-6"><input type="checkbox"></div>
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
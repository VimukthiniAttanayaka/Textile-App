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
    <title>User details</title>
    <style>
</style>
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
        </div><br><br><br>
        <center><h3 style="background-color: lightpink;padding:1%; width:70%;">Customer Details</h3></center>
        <div class="col-12"><hr>
            <div class="row">
                <div class="col-1"><h4>ID</h4></div>
                <div class="col-2"><h4>Email</h4></div>
                <div class="col-2"><h4>Password</h4></div>
                <div class="col-1"></div>
                <div class="col-2"><h4>Action</h4></div>
            </div>
            <div class="col-12">
                <?php $query = "SELECT * FROM client";
                    $select = mysqli_query($connection, $query);
                    while ($recodes = mysqli_fetch_assoc($select)) {
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-1"><?php echo $recodes['id']?></div>
                            <div class="col-2"><?php echo $recodes['email']; ?></div>
                            <div class="col-2"><?php echo $recodes['password']; ?></div>
                            <div class="col-1"></div>
                            <div class="col-2">
                                <div class="row">
                                    <a href="../client_register.php?del=<?php echo $recodes['id']; ?>" class="btn btn-danger">Delete</a>                               
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </div>
        </div><br><br><br>

        <center><h3 style="background-color: lightblue;padding:1%; width:70%">Admin Details</h3></center>
        <div class="col-12"><hr>
            <div class="row">
                <div class="col-1"><h4>ID</h4></div>
                <div class="col-2"><h4>Email</h4></div>
                <div class="col-2"><h4>Company ID</h4></div>
                <div class="col-2"><h4>Password</h4></div>
                <div class="col-1"></div>
                <div class="col-2"><h4>Action</h4></div>
            </div>
            <div class="col-12">
                <?php $query = "SELECT * FROM admin";
                    $select = mysqli_query($connection, $query);
                    while ($recodes = mysqli_fetch_assoc($select)) {
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-1"><?php echo $recodes['id']?></div>
                            <div class="col-2"><?php echo $recodes['email']; ?></div>
                            <div class="col-2"><?php echo $recodes['company_id']; ?></div>
                            <div class="col-2"><?php echo $recodes['password']; ?></div>
                            <div class="col-1"></div>
                            <div class="col-2">
                                <div class="row">
                                <div class="col">
                                    <a href="../admin_register.php?del=<?php echo $recodes['id']; ?>" class="btn btn-danger">Delete</a>                               </div>
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </div>
        </div><br><br><br>

        <center><h3 style="background-color: lightgreen;padding:1%; width:70%">Admin Compani ID</h3></center>
        <div class="col-12"><hr>
            <div class="row">
            <div class="col-4"></div>
                <div class="col-1"><h4>ID</h4></div>
            <div class="col-4"></div>
            </div>
            <div class="col-12">
                <?php $query = "SELECT * FROM compani_id";
                    $select = mysqli_query($connection, $query);
                    while ($recodes = mysqli_fetch_assoc($select)) {
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-2"><?php echo $recodes['id_no']; ?></div>
                            <div class="col-1"></div>
                            <div class="col-1"></div>
                            <div class="col-2">
                                <div class="row">
                                    <a href="company_id.php?del=<?php echo $recodes['id']; ?>" class="btn btn-danger">Delete</a>                              
                                </div>                                                
                            </div>
                        </div>
                <?php } ?>
                <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <center><a href="company_id.php" id="addnew" class="btn btn-primary">Add New Admin ID</a></center>
            </div>
        </div>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
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
        $id = 4;
        $catagery = 'shoes';

        $query = "SELECT * FROM `shoes` WHERE id=$id";
        $select = mysqli_query($connection, $query);
        $recodes = mysqli_fetch_assoc($select); ?>

        <script>
            var id = "<?php echo $recodes['id']; ?>";
            var name = "<?php echo $recodes['name']; ?>";
            var price = "<?php echo $recodes['price']; ?>";
            var men_women_kid = "<?php echo $recodes['men_women_kid']; ?>";
            var discription = "<?php echo $recodes['discription']; ?>";
        </script>
        <div class="row">
            <div class="col-8">
                <?php if ($recodes['men_women_kid'] == 1) { ?>
                    <div class="row">
                        <center><img id="image" src="./images/shoes/men/<?php echo $recodes['id']; ?>.0.jpg" alt="cloth" style="width:750px;height:500px"></center>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <button onclick="document.getElementById('image').src='./images/shoes/men/<?php echo $recodes['id']; ?>.0.jpg'"><img src='./images/shoes/men/<?php echo $recodes['id']; ?>.0.jpg' style="width:150px;height:100px"></button>
                        </div>
                        <div class="col-2">
                            <button onclick="document.getElementById('image').src='./images/shoes/men/<?php echo $recodes['id']; ?>.1.jpg'"><img src='./images/shoes/men/<?php echo $recodes['id']; ?>.1.jpg' style="width:150px;height:100px"></button>
                        </div>
                        <div class="col-2">
                            <button onclick="document.getElementById('image').src='./images/shoes/men/<?php echo $recodes['id']; ?>.2.jpg'"><img src='./images/shoes/men/<?php echo $recodes['id']; ?>.2.jpg' style="width:150px;height:100px"></button>
                        </div>

                    <?php } else if ($recodes['men_women_kid'] == 2) { ?>
                        <div class="row">
                            <center><img id="image" src="./images/shoes/women/<?php echo $recodes['id']; ?>.0.jpg" alt="cloth" style="width:750px;height:500px"></center>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <button onclick="document.getElementById('image').src='./images/shoes/women/<?php echo $recodes['id']; ?>.0.jpg'"><img src='./images/shoes/women/<?php echo $recodes['id']; ?>.0.jpg' style="width:150px;height:100px"></button>
                            </div>
                            <div class="col-2">
                                <button onclick="document.getElementById('image').src='./images/shoes/women/<?php echo $recodes['id']; ?>.1.jpg'"><img src='./images/shoes/women/<?php echo $recodes['id']; ?>.1.jpg' style="width:150px;height:100px"></button>
                            </div>
                            <div class="col-2">
                                <button onclick="document.getElementById('image').src='./images/shoes/women/<?php echo $recodes['id']; ?>.2.jpg'"><img src='./images/shoes/women/<?php echo $recodes['id']; ?>.2.jpg' style="width:150px;height:100px"></button>
                            </div>

                        <?php } else if ($recodes['men_women_kid'] == 3) { ?>
                            <div class="row">
                                <center><img id="image" src="./images/shoes/kid/<?php echo $recodes['id']; ?>.0.jpg" alt="cloth" style="width:750px;height:500px"></center>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <button onclick="document.getElementById('image').src='./images/shoes/kid/<?php echo $recodes['id']; ?>.0.jpg'"><img src='./images/shoes/kid/<?php echo $recodes['id']; ?>.0.jpg' style="width:150px;height:100px"></button>
                                </div>
                                <div class="col-2">
                                    <button onclick="document.getElementById('image').src='./images/shoes/kid/<?php echo $recodes['id']; ?>.1.jpg'"><img src='./images/shoes/kid/<?php echo $recodes['id']; ?>.1.jpg' style="width:150px;height:100px"></button>
                                </div>
                                <div class="col-2">
                                    <button onclick="document.getElementById('image').src='./images/shoes/kid/<?php echo $recodes['id']; ?>.2.jpg'"><img src='./images/shoes/kid/<?php echo $recodes['id']; ?>.2.jpg' style="width:150px;height:100px"></button>
                                </div>
                            <?php } ?>
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
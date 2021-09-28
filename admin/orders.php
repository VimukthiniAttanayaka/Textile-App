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
    <title>Item List</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">
                <a id='url' href="overview.php">Overview</a>
            </div>
            <div class="col-1">
                <a id='url' href="listing.php">Listings</a>
            </div>
            <div class="col-1">
                <a id='url' href="orders.php">Orders</a>
            </div>
        </div>
        <div class="row">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>List</th>
                    <th>Address</th>
                    <th>Total Price</th>
                    <th>shipped</th>
                    <th>delivered</th>
                </tr>
                <?php $query = "SELECT * FROM orders";
                $select = mysqli_query($connection, $query);
                while ($recodes = mysqli_fetch_assoc($select)) {
                    ?>
                        <tr>
                            <td><?php echo $recodes['id']?></td>
                            <td><?php echo $recodes['email']; ?></td>
                            <td><table>
                                <?php echo $recodes['list']; ?>
                            </table></td>
                            <td><?php echo $recodes['address']; ?></td>
                            <td><?php echo $recodes['total_price']; ?></td>
                        </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
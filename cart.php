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
    <title>Add data cart</title>
</head>

<body>
    <div class="container-fluid">
        <center>
            <a id='back_to_shopping' href="./home.php">
                <button class="btn btn-info">
                    <h2>Back To Shopping</h2>
                </button>
            </a>
        </center>
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
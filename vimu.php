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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>index array</title>
    
</head>

<body>
    <div class="container-fluid">
    <form>
                    <p id='label'><label for="quentity">Quentity: </label>
                    <input onclick="quentity.value++">up</button>
                        <input type="number" min="1" name="quentity" placeholder=1 value="1">
                    <p>
                        <div>
                        <center>
                            <button class="btn btn-primary" type="submit" name="submit" style="width: 250px;">
                                Add To Cart
                            </button>
                        </center>
                        </div>
                </form>

    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
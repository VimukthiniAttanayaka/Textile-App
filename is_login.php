<?php
//connect with database
require_once('connection.php');
?>
<?php
// Start the session
session_start();
if(isset($_SESSION["email"])){
    
}
?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
        <title>islogin</title>
    
</head>

<body>
    <div class="container-fluid">
    </div>
</body>

</html>
<!--end connection with database-->
<?php mysqli_close($connection); ?>
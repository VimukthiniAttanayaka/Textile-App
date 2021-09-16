<?php
    $connection =new mysqli('localhost','root','','shopping');

    //Chacking to connection
    if(mysqli_connect_errno()){
        die('Database connection failed'. mysqli_connect_error());
    }
    else{
        //echo "Connection Sucessfull";
    }
?>
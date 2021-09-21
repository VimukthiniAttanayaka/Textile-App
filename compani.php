<?php 
    //connect with database
    require_once('connection.php');
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
            crossorigin="anonymous">
        <title>compani id</title>
        <style>
            .hello-lg{
                color: red;
            }
            .dog-sm{
                color: green;
            }
            .bye-md{
                color: blue;
            }
        </style>

    </head>
    <body>
        <div id="form">
            <?php
                if(isset($_REQUEST['submit'])){
                    $compani_id = $_REQUEST['compani_id'];
                    $client = "INSERT INTO compani_id (id_no) VALUES ('$compani_id')";
                    mysqli_query($connection,$client);  
                }
            ?>
            <p class="hello-lg bye-md dog-sm">hello everyone</p>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <table>
                    <tr>
                        <td id='label'><label for ="compani_id">id: </label></td>
                        <td><input type ="text" name="compani_id" placeholder="" required></td>
                    </tr>
                    <td><button type="submit" name="submit">Register</button></td>
                </table>
            </form>
        </div>
    </body>
</html>
<!--end connection with database-->
<?php mysqli_close($connection);?>
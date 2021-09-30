<?php
session_start();
require_once '../cart/phpOperations/cartQty.php';
?>
<!DOCTYPE html>
<html>

<head lang="en">
  <meta charset="UTF-8">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!--icon -->
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="../styles/navbar.css">
  <title>navbar</title>
</head>

<body>

  <?php
  if (isset($_SESSION['email'])) {
    $cart_item = ($_SESSION['cartQty']);
  } else {
    $cart_item = 0;
  }
  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="opacity: 0.8;">
    <div class="container-fluid">
      <div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-5-lg col-2-md col-1-sm">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../mens-section.php">Men's</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../womens-section.php">Women's</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../kids-section.php">Kids</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-4-lg col-4-md">
        <img src="../images/logo.png" alt="home" id="logo">
      </div>
      <div class="col-1-lg col-2-sm">
        <!-- Button trigger modal -->
        <div id="icon" class="col">
          <span><i class='fas fa-shopping-cart' id="cart-icon"></i></span>
          <span class="cart_no">
            <?php echo $cart_item ?>
          </span>
        </div>
        <div class="row">
          <p><button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Your Cart</button>
        </div>
      </div>
      <div class="col-1-lg col-2-sm">
        <div class="row" id="icon">
          <i class='fas fa-user-circle' id="login-icon"></i>
        </div>
        <div class="row">
          <p><a id='nav-url' href="../client_register.php">SignUp</a> / <a id='nav-url' href="../client_login.php">LogIn</a></p>
        </div>
      </div>
    </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Your Cart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php include '../cart-modal.php'; ?>
        </div>
        <div class="modal-footer">
          <a href="../cartMain.php" class="link-success"><button type="button" class="btn btn-primary">View Cart</button></a>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>
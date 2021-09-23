<!DOCTYPE html>
<html>

<head lang="en">
  <meta charset="UTF-8">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <!--icon -->
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <title>navbar</title>
  <style>
        #nav-url{
          color: black;
        }
        .col-5-lg{
          padding-left: 10%;
        }
    </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="col-5-lg col-2-md col-0-sm">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../components/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../section/mens-section.php">Men's</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../section/womens-section.php">Women's</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../section/kids-section.php">Kids</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-4">
        <img src="../images/logo.png" alt="home" style="width:250px;">
      </div>
      <div class="col-1">
        <!-- Button trigger modal -->
        <div class="row">
          <i class='fas fa-shopping-cart' style='font-size:36px'></i>
        </div>
        <div class="row">
          <p><button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Your Cart</button></p>
        </div>
      </div>
      <div class="col-1">
        <div class="row" style="vertical-align: middle;">
          <i class='fas fa-user-circle' style='font-size:36px;vertical-align: middle;'></i>
        </div>
        <div class="row">
          <p><a id='nav-url' href="../login/client_register.php">SignUp</a> / <a id='nav-url' href="../login/client_login.php">LogIn</a></p>
        </div>
      </div>
    </div>
  </nav>
  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>

</html>
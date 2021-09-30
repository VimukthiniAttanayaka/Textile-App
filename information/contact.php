<?php
//connect with database
require_once('../connection.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Contact Us </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="contact.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="row">
<div class="col">
<div class="row">
    <!--include navbar-->
	<?php include 'navbar.php'; ?>
</div>
  <div class="row" id="ful">
  <?php if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $msg = $_REQUEST['msg'];
    $mess = "INSERT INTO message (name,email,msg) VALUES ('$name','$email','$msg')";
    mysqli_query($connection, $mess); ?>
    <div class="alert alert-success" role="alert">
      Your Message Send successfully!
    </div>
  <?php
    $name = "";
    $email = "";
    $msg = "";
  } ?>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">29/18, Mount Road,</div>
          <div class="text-two">Dehiwala, Colombo </div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one"><a href="tel:+94 76 1234567">+94 76 1234567</a></div>
          <div class="text-two"><a href="tel:+94 71 9876543">+94 71 9876543</a></div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one"><a href="mailto:etextile@gmail.com">etextile@gmail.com</a></div>
          <div class="text-two"><a href="mailto:info.etextile@gmail.com">info.etextile@gmail.com</a></div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send a message to <b><i>eTextiles</i></b></div>
        <p>If you want to ask something from us or any types of quries related to our products and service, send us message from here. It's our pleasure to help you.</p>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <div class="input-box">
            <input name="name" type="text" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <input name="email" type="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box message-box">
            <textarea name="msg" placeholder="Enter your message" required></textarea>
          </div>
          <div class="button">
            <input type="submit" name="submit" class="btn btn-primary" value="Send Now">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</body>

</html>
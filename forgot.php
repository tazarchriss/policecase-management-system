<?php
require_once 'path.php';
require_once ROOT_PATH . '/connect.php';
session_start();


?>
<?php

if (isset($_POST['login'])) {


    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    $query = "SELECT * FROM `policeofficer` 
    WHERE userName='$uname' AND email='$email'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        if($pass1==$pass2){
            $sql = "UPDATE `policeofficer` SET `password` = SHA1('$pass1') WHERE `policeofficer`.`email` = '$email'";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Pasword updating succeeded'); window.location='index.php'</script>";
            } else {
                echo "<script>alert('Erro!'); window.location='forgot.php'</script>";
            }
        }else {
            echo "<script>alert('Erro! New Password And Confirm Password Mismatched. you must put the same password for in both fields'); window.location='forgot.php'</script>";
        }

      
    } else{
        echo "<script>alert('You Have entered Incorrect username or email.. try again!'); window.location='forgot.php'</script>"; 
    }    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="<?php echo BASE_URL . '/assets/img/favicon.png' ?>">

  <title>Police management system</title>

  <!-- Bootstrap CSS -->
  <link href="<?php echo BASE_URL . '/assets/css/bootstrap.min.css' ?>" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo BASE_URL . '/assets/css/bootstrap-theme.css' ?>" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?php echo BASE_URL . '/assets/css/elegant-icons-style.css' ?>" rel="stylesheet" />
  <link href="<?php echo BASE_URL . '/assets/css/font-awesome.css' ?>" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?php echo BASE_URL . '/assets/css/style.css' ?>" rel="stylesheet">
  <link href="<?php echo BASE_URL . '/assets/css/style-responsive.css' ?>" rel="stylesheet" />
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Your Username" name="uname" required autocomplete=off>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" class="form-control" placeholder="Your Email" name="email" required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="New Password" name="pass1" required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Confirm New Password" name="pass2" required>
        </div>
       
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Forgot</button>
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          Designed by <a href="tazarchriss@gmail.com">Tazar Chriss</a>
        </div>
    </div>
  </div>


</body>

</html>

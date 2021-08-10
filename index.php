<?php
require_once 'path.php';
require_once ROOT_PATH . '/connect.php';
session_start();


?>
<?php

if (isset($_POST['login'])) {


    $uname = $_POST['uname'];
    $pass = ($_POST['pass']);
    $pass=($_POST['pass']);

    $query = "SELECT * FROM `policeofficer` 
    INNER JOIN user ON policeofficer.userID=user.userId
    INNER JOIN rank ON policeofficer.rankId=rank.rankId
    WHERE userName='$uname' AND password='$pass'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['rankId'] == 1) {
            $_SESSION["user"] = $uname;
            $_SESSION["fname"] = $row['firstName'];
            $_SESSION["lname"] = $row['lastName'];
            $_SESSION['message'] = "your logged in successfully";
            $_SESSION["id"] = $row['userId'];
            header('location: admin/index.php');
        } 
        else if ($row['rankId'] == 4 ||$row['rankId'] == 5 ||$row['rankId'] == 6 ) {
            $_SESSION["user"] = $uname;
            $_SESSION["fname"] = $row['firstName'];
            $_SESSION["mname"] = $row['middleName'];
            $_SESSION["lname"] = $row['lastName'];
            $_SESSION["rank"] = $row['rankName'];
            $_SESSION['message'] = "your logged in successfully";
            $_SESSION["id"] = $row['officerId'];
            header('location: police/index.php');
        }else if ($row['rankId'] == 2) {
          $_SESSION["user"] = $uname;
          $_SESSION["fname"] = $row['firstName'];
          $_SESSION["mname"] = $row['middleName'];
          $_SESSION["lname"] = $row['lastName'];
          $_SESSION["rank"] = $row['rankName'];
          $_SESSION['message'] = "your logged in successfully";
          $_SESSION["id"] = $row['officerId'];
          header('location: OCS/index.php');
      }else if ($row['rankId'] == 3) {
        $_SESSION["user"] = $uname;
        $_SESSION["fname"] = $row['firstName'];
        $_SESSION["mname"] = $row['middleName'];
        $_SESSION["lname"] = $row['lastName'];
        $_SESSION["rank"] = $row['rankName'];
        $_SESSION['message'] = "your logged in successfully";
        $_SESSION["id"] = $row['officerId'];
        header('location: OCCID/index.php');
    }
         else {
            $_SESSION["user"] = $uname;
            $_SESSION['message'] = "your logged in successfully";
            $_SESSION["id"] = $row['userId'];
            header('location: user/index.php');
        }
    } else {
        echo "<script>alert(' incorect username or password'); window.location='index.php'</script>";
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

<body class="login-img3-body" >

  <div class="container">
<!-- Start of the login form -->
    <form class="login-form" action="" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" name="uname" required autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Password" name="pass" required>
        </div>
        <label class="checkbox">
                <span class="pull-right"> <a href="forgot.php"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
      </div>
    </form>
    <!-- End of login form -->
    <div class="text-right">
      <div class="credits">
          Designed by <a href="https://web.whatsapp.com/">Tazar Chriss</a>
        </div>
    </div>
  </div>


</body>

</html>

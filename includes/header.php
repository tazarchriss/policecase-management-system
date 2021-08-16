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
  <link href="<?php echo BASE_URL . '/assets/css/font-awesome.min.css' ?>" rel="stylesheet' ?>" />

  <!-- owl carousel -->
  <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/owl.carousel.css' ?>" type="text/css">
  <link href="<?php echo BASE_URL . '/assets/css/jquery-jvectormap-1.2.2.css' ?>" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/fullcalendar.css' ?>">
  <link href="<?php echo BASE_URL . '/assets/css/widgets.css' ?>" rel="stylesheet">
  <link href="<?php echo BASE_URL . '/assets/css/style.css' ?>" rel="stylesheet">
  <link href="<?php echo BASE_URL . '/assets/css/style-responsive.css' ?>" rel="stylesheet" />
  <link href="<?php echo BASE_URL . '/assets/css/xcharts.min.css' ?>" rel=" stylesheet">
  <link href="<?php echo BASE_URL . '/assets/css/jquery-ui-1.10.4.min.css' ?>" rel="stylesheet">


  <!-- Custome Master CSS -->
  <link href="<?php echo BASE_URL . '/assets/css/master.css' ?>" rel="stylesheet">


  <script src="<?php echo BASE_URL . '/assets/js/all.min.js' ?>" crossorigin="anonymous"></script>
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="" class="logo">POLICE CASE MANAGEMENT  system </a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
       
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              
              <span class="username"><?php echo $_SESSION['rank']; ?>&nbsp;&nbsp;<?php echo $_SESSION['fname']; ?>&nbsp;<?php echo $_SESSION['lname']; ?></span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              
           
              <li>
                <a href="<?php echo BASE_URL . '/logout.php' ?>"><i class="icon_key_alt"></i> Log Out</a>
              </li>
           
              </li> -->
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

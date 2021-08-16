<?php
require_once '../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/sidebar.php'; ?>

<?php 
$id=$_SESSION['id'];
$s="select * from policecase where officerId='$id'";
$resu=mysqli_query($conn,$s);

$case = mysqli_num_rows($resu);

$sq="select * from investigation where officerId='$id'";
$resul=mysqli_query($conn,$sq);

$invest = mysqli_num_rows($resul);

?>
 <!--main content start-->
 <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
              <div class="count"><?php echo $case; ?></div>
              <div class="title">Total Case You Registered</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-eye"></i>
              <div class="count"><?php echo $invest; ?></div>
              <div class="title">Total Case Investigation You have Assigned</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->


        </div>
        <!--/.row-->


        
       


<?php require_once ROOT_PATH . '/includes/footer.php'; ?>

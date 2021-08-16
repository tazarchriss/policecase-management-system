<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/OCS/sidebar.php'; ?>


 <!--main content start-->
 <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo BASE_URL . '/OCS/index.php' ?>">Home</a></li>
              <li><i class="fa fa-laptop"></i>Officers</li>
              <li><i class="fa fa-laptop"></i>View officers</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Registerd Officers
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_number"></i> # </th>
                    <th><i class="icon_profile"></i> Full Name</th>
                    <th><i class="icon_calendar"></i> Date</th>
                    <th><i class="icon_mail_alt"></i> Email</th>
                    <th><i class="icon_pin_alt"></i> Address</th>
                    <th><i class="icon_mobile"></i> Mobile</th>
                    <th><i class="icon_mobile"></i> Rank</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  <?php

$ret = mysqli_query($conn, "SELECT * FROM `policeofficer` 
INNER JOIN user ON policeofficer.userID=user.userId
INNER JOIN rank ON policeofficer.rankId=rank.rankId");
 
$cnt=1;
$row=mysqli_num_rows($ret);
if($row>0){
while ($row=mysqli_fetch_array($ret)) {

?>
            <!--Fetch the Records -->
            <tr>
                <td><?php echo $cnt;?></td>
                <td><?php echo $_SESSION['fname']; ?>&nbsp;<?php echo $_SESSION['lname']; ?></td>
                <td><?php  echo $row['dob'];?></td>
                <td><?php  echo $row['email'];?></td>
                <td><?php  echo $row['address'];?></td>
                <td><?php  echo $row['phone'];?></td>
                <td><?php  echo $row['rankName'];?></td>
                <td>
                               <div class="btn-group">
                        <a class="btn btn-success" href="browse.php?browseid=<?php echo $row['officerId'] ?>"><i class="far fa-eye"></i></i></a>
                        <a class="btn btn-danger" href="delete.php?deleteid=<?php echo $row['userId'] ?>"><i class="fas fa-trash"></i></i></a>
                      </div>
                    </td>
            </tr>
            <?php 
$cnt=$cnt+1;
} } else {?>
            <tr>
                <th style="text-align:center; color:red;" colspan="6">No police officers registered</th>
            </tr>
            <?php } ?>
                </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->





<?php require_once ROOT_PATH . '/includes/footer.php'; ?>

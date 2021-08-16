<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/OCS/sidebar.php'; ?>
<?php $id = $_GET['id']; ?>
<?php
if (isset($_POST['yes'])) {
  $pro=$_POST['progress'];
$sql="UPDATE `policecase` SET `progress` = ' $pro' WHERE `policecase`.`caseId` = '$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
  echo "<script>alert('Case investigation allowed successfuly '); window.location='index.php'</script>";

} else {
echo "<script>alert(' Error try again'); window.location='index.php'</script>";
}
}else if (isset($_POST['no'])) {
  $pro=$_POST['progress'];
$sql="UPDATE `policecase` SET `progress` = ' $pro' WHERE `policecase`.`caseId` = '$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
  echo "<script>alert('Case investigation allowed successfuly '); window.location='index.php'</script>";

} else {
echo "<script>alert(' Error try again'); window.location='index.php'</script>";
}
}else {

?>


<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> INVESTIGATION</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo BASE_URL . '/OCS/index.php' ?>">Home</a></li>
                    <li><i class="fa fa-laptop"></i><a href="<?php echo BASE_URL . '/OCS/cases/index.php' ?>">Cases</a>
                    </li>
                    <li><i class="fa fa-laptop"></i>Investigation</li>
                </ol>
            </div>
        </div>

        <!--modal start-->
        <section class="panel">
            <header class="panel-heading">
                Investigation Buttons
            </header>
            <div class="panel-body">
                <a class="btn btn-success" data-toggle="modal" href="#myModal">
                    Press Here To Allow Investigation
                </a>
                <a class="btn btn-info" data-toggle="modal" href="#myModal2">
                    Click Here for Hindering investigation with reason
                </a>
                <?php
$query = mysqli_query($conn, "SELECT * FROM policeofficer, user where policeofficer.userId=user.userId AND policeofficer.rankId='3' LIMIT 1");
$row = mysqli_fetch_array($query);
               ?>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Allowing Investigation for case no: <?php echo $id ?></h4>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">

                                    <input type="hidden" value="Investigate" name="progress">
                                    <p>By clicking allow investigation button Case no: <?php echo $id ?> is going to be
                                        assigned investigator by OCCID
                                        <?php echo $row['firstName'] ?>&nbsp;<?php echo $row['middleName'] ?></p>

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-success" type="submit" name="yes">Allow
                                        Investigation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModal2" tabindex="-10" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Hindering Investigation for case no: <?php echo $id ?></h4>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <label for="desc">Resorn for hindering investigation</label><br>
                                    <textarea name="progress" id="desc" cols="40" rows="5"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-success" type="submit" name="no">Hinder
                                        Investigation</button>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
            </div>
        </section>
        <!--modal start-->
        <?php
}
?>



        <?php require_once ROOT_PATH . '/includes/footer.php'; ?>

<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/OCCID/sidebar1.php'; ?>


<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> Investigators</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo BASE_URL . '/OCCID/index.php' ?>">Home</a></li>
                    <li><i class="fa fa-laptop"></i><a href="<?php echo BASE_URL . '/OCCID/investigation/index.php' ?>">Investigtion</a></li>
                    <li><i class="fa fa-laptop"></i> Cases Investigators</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        All Registered Cases Investigators
                    </header>
                    <table class="table">
                        <thead>
                            
                            <tr>
                                <th colspan="4" style="border: 1px solid black;"><center>CASE</center></th>
                                <th colspan="4" style="border: 1px solid black;"><center>POLICE ASSIGNED TO INVESTIGATE</center></th>
                            </tr>
                            <tr>
                                <th>Case Number</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Time Occurred</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Rank</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ret = mysqli_query($conn, "SELECT * FROM investigation,policeofficer,user,rank,policecase WHERE investigation.officerId=policeofficer.officerId AND policeofficer.userId=user.userId AND policeofficer.rankId=rank.rankId AND investigation.caseId=policecase.caseId");

                            $row = mysqli_num_rows($ret);
                            if ($row > 0) {
                                while ($row = mysqli_fetch_array($ret)) {

                            ?>
                                    <!--Fetch the Records -->
                                    <tr>
                                        <td> <a href="case-view.php?id=<?= $row['caseId']; ?>"><?php echo $row['caseId']; ?></a></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['whenOccur']; ?></td>
                                        <td><?php echo $row['firstName']; ?></td>
                                        <td><?php echo $row['middleName']; ?></td>
                                        <td><?php echo $row['lastName']; ?></td>
                                        <td><?php echo $row['rankName']; ?></td>
                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <tr>
                                    <th style="text-align:center; color:red;" colspan="6">no investigators registered</th>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </section>
        </div>



<?php require_once ROOT_PATH . '/includes/footer.php'; ?>

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
                <h3 class="page-header"><i class="fa fa-laptop"></i> Evidences</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo BASE_URL . '/OCCID/index.php' ?>">Home</a></li>
                    <li><i class="fa fa-laptop"></i><a href="<?php echo BASE_URL . '/OCCID/investigation/investigation.php' ?>">Investigtion</a></li>
                    <li><i class="fa fa-laptop"></i>Evidences</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        All Registered Cases for Investigation with  evidence
                    </header>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            
                            <tr>
                                <th colspan="4" style="border: 1px solid black;"><center>CASE</center></th>
                                <th colspan="4" style="border: 1px solid black;"><center>POLICE ASSIGNED</center></th>
                                <th colspan="4" style="border: 1px solid black;"><center>EVIDENCES</center></th>
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
                                <th>Description</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Downloads</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id=$_SESSION['id'];
                            $ret = mysqli_query($conn, "SELECT * FROM evidence,investigation, policecase , policeofficer,user,rank WHERE evidence.investId=investigation.investId AND investigation.caseId=policecase.caseId AND investigation.officerId=policeofficer.officerId AND policeofficer.userId=user.userId AND policeofficer.rankId=rank.rankId");

                            $row = mysqli_num_rows($ret);
                            if ($row > 0) {
                                while ($row = mysqli_fetch_array($ret)) {

                            ?>
                                    <!--Fetch the Records -->
                                    <tr>
                                        <td><?php echo $row['caseId']; ?></a></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['whenOccur']; ?></td>
                                        <td><?php echo $row['firstName']; ?></td>
                                        <td><?php echo $row['middleName']; ?></td>
                                        <td><?php echo $row['lastName']; ?></td>
                                        <td><?php echo $row['rankName']; ?></td>
                                        <td><?php echo $row['edescription']; ?></td>
                                        <td><?php echo $row['attachment_name']; ?></td>
                                        <td><?php echo floor($row['attachment_size'] / 1000) . ' KB'; ?></td>
                                        <td><?php echo $row['downloads']; ?></td>
                                        <td><a href="file.php?file_id=<?php echo $row['evidenceId'] ?>"><i class="fas fa-download"></i>download</a></td>
                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <tr>
                                    <th style="text-align:center; color:red;" colspan="12">no available evidences</th>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                            </div>

                </section>
        </div>



<?php require_once ROOT_PATH . '/includes/footer.php'; ?>

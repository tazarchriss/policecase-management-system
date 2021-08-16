<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/sidebar.php'; ?>


<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> CASES</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo BASE_URL . '/police/index.php' ?>">Home</a></li>
                    <li><i class="fa fa-laptop"></i>Cases</li>
                    <li><i class="fa fa-laptop"></i>View Cases</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        All Registered Cases
                    </header>
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="4" style="border: 1px solid green;">CASE</th>
                                <th colspan="4" style="border: 1px solid blue;">POLICE REGISTERED CASE</th>
                            </tr>
                            <tr>
        <th>CASE NUMBER</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
        <th>TIME OCCURED</th>
        <th>FIRST NAME</th>
        <th>MIDDLE NAME</th>
        <th>LAST NAME</th>
        <th>RANK</th>
        
        </tr>
                        </thead>
                        <tbody>
                            <?php

                            $ret = mysqli_query($conn, "SELECT * FROM policecase,policeofficer,user,rank WHERE policecase.officerId=policeofficer.officerId AND policeofficer.userId=user.userId AND policeofficer.rankId=rank.rankId");

                            $row = mysqli_num_rows($ret);
                            if ($row > 0) {
                                while ($row = mysqli_fetch_array($ret)) {

                            ?>
                                    <!--Fetch the Records -->
                                    <tr>
                                        <td><?php echo $row['caseId']; ?></td>
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
                                    <th style="text-align:center; color:red;" colspan="6">no case registered</th>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </section>
            </div>


    </section>
    <!--main content end-->
</section>
<!-- container section start -->


<?php require_once ROOT_PATH . '/includes/footer.php'; ?>

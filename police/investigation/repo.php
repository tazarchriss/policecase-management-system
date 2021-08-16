<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/sidebar.php'; ?>

<?php

if (isset($_POST['accuser'])) {

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $marital = $_POST['marital'];
    $dob = $_POST['dob'];
    $cfname = $_POST['cfname'];
    $cphone = $_POST['cphone'];
    $occupation = $_POST['occupation'];
    $id = $_SESSION['id'];

    $sql = "INSERT INTO `user` (`userId`, `stationId`, `firstName`, `middleName`, `lastName`, `phone`, `address`, `gender`, `maritalStatus`, `dob`, `created_at`) 
    VALUES (NULL, '1', ' $fname', '$mname', '$lname', '$phone', '$address', '$gender', '$marital', '$dob', current_timestamp());";
    if ($conn->query($sql) === TRUE) {

        $last_id = $conn->insert_id;


        $query = "INSERT INTO `accuser` (`accuserId`, `userId`, `officerId`, `cfname`, `cphone`, `occupation`) 
       VALUES (NULL, '$last_id', '$id', '$cfname', '$cphone', '$occupation')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Accuser Registered succeeded'); window.location='accused.php'</script>";
        } else {
            echo "<script>alert('Accuser Registration failed'); window.location='index.php'</script>";
        }
    } else {
        echo "<script>alert('Accuser Registration failed'); window.location='index.php'</script>";
    }

    $conn->close();
} 
?>


<!--main content start-->
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        INVESTIGATION REPORT
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " id="register_form" method="POST" action="report.php">
                                <div class="form-group ">
                                    <label for="fullname" class="control-label col-lg-2">Date:<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="fullname" name="date" type="date" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="middle" class="control-label col-lg-2">Investigator name <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="middle" name="InvName" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="last" class="control-label col-lg-2">Case Name <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="last" name="cname" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="phone" class="control-label col-lg-2">Description <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <textarea name="desc" id="" cols="60" rows="10"></textarea>
                                    </div>
                                </div>
                              
                              
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit" name="pdf">GENERATE REPORT</button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- End accuser Section -->


    </section>
    <!--main content end-->
</section>
<!-- container section start -->


<?php require_once ROOT_PATH . '/includes/footer.php'; ?>

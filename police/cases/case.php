
<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/sidebar.php'; ?>

<?php

if (isset($_POST['accused'])) {

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

        $query = "INSERT INTO `accused` (`accusedId`, `userId`, `accusedcfname`, `accusedcphone`, `occupation`) 
        VALUES (NULL, '$last_id', '$cfname', '$cphone', '$occupation')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Accused Registered succeeded'); window.location='case.php'</script>";
        } else {
            echo "<script>alert('Accused Registration failed'); window.location='accused.php'</script>";
        }
    } else {
        echo "<script>alert('Accused Registration failed'); window.location='index.php'</script>";
    }

    $conn->close();
} 
?>


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
                    <li><i class="fa fa-laptop"></i>Register Accused</li>
                </ol>
            </div>
        </div>

        <!-- ======= accused Section ======= -->

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Accused Registration
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " id="register_form" method="POST" action="">
                                <div class="form-group ">
                                    <label for="fullname" class="control-label col-lg-2">First name <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="fullname" name="fname" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="middle" class="control-label col-lg-2">Middle name <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="middle" name="mname" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="last" class="control-label col-lg-2">Last name <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="last" name="lname" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="phone" class="control-label col-lg-2">Phone <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="phone" name="phone" type="tel" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Address <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="address" name="address" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address" class="control-label col-lg-2">Occupation <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="address" name="occupation" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="gender" class="control-label col-lg-2">Gender <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-bot15" id="gender" name="gender" required>
                                            <option value="">Choose Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="marital" class="control-label col-lg-2">Marital Status <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-bot15" id="marital" name="marital" required>
                                            <option value="">select marital status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="dob" class="control-label col-lg-2">Date of Birth <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control " id="dob" name="dob" type="date" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="fullname" class="control-label col-lg-2">ChairP Fullname <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="fullname" name="cfname" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="confirm_password" class="control-label col-lg-2">ChairP phone <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control " id="confirm_password" name="cphone" type="tel" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit" name="accused">Save</button>
                                        <button class="btn btn-default" type="reset">Cancel</button>
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

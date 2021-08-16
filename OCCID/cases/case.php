<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/OCCID/sidebar1.php'; ?>


<?php

if (isset($_POST['case'])) {

    $accuser = $_POST['accuser'];
    $accused = $_POST['accused'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $when = $_POST['when'];
    $id = $_SESSION['id'];

    $sql = "INSERT INTO `policecase` (`caseId`, `accuserId`, `accusedId`, `officerId`, `title`, `description`, `whenOccur`)
    VALUES ('', '$accuser', '$accused', '$id', '$title', '$desc', '2021-07-01 16:40:39')";
    if ($conn->query($sql) === TRUE) {

  
            echo "<script>alert('Case Registration succeeded!'); window.location='index.php'</script>";

    } else {
        echo "<script>alert('Accuser Registration failed'); window.location='case.php'</script>";
    }

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
                    <li><i class="fa fa-home"></i><a href="<?php echo BASE_URL . '/OCCID/index.php' ?>">Home</a></li>
                    <li><i class="fa fa-laptop"></i>Cases</li>
                    <li><i class="fa fa-laptop"></i>Register Case</li>
                </ol>
            </div>
        </div>

        <!-- case registration -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        New Case Registration
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                                <div class="form-group ">
                                    <label for="marital" class="control-label col-lg-2">Accuser <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-bot15" id="marital" name="accuser" required>
                                            <?php

                                            $sql = "SELECT * FROM accuser, user WHERE accuser.userId=user.userId";
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <option value="<?php echo $row["accuserId"]; ?>"><?php
                                                                                                        echo $row["firstName"];
                                                                                                        echo "   ";
                                                                                                        echo $row["middleName"];
                                                                                                        echo "   ";
                                                                                                        echo $row["lastName"]; ?></option>

                                            <?php
                                                }
                                            } else {
                                                echo "No accuser registered";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="marital" class="control-label col-lg-2">Accused <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-bot15" id="marital" name="accused" required>
                                            <?php

                                            $sql = "SELECT * FROM accused, user WHERE accused.userId=user.userId";
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <option value="<?php echo $row["accusedId"]; ?>"><?php
                                                                                                        echo $row["firstName"];
                                                                                                        echo "   ";
                                                                                                        echo $row["middleName"];
                                                                                                        echo "   ";
                                                                                                        echo $row["lastName"]; ?></option>

                                            <?php
                                                }
                                            } else {
                                                echo "No accuser registered";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Case Title <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="subject" name="title" type="text" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="desc" class="control-label col-lg-2">Case Description</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control " id="desc" name="description" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="when" class="control-label col-lg-2">When Occured?</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="when" name="when" type="datetime-local" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit" name="case">Save</button>
                                        <button class="btn btn-default" type="reset">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>


    </section>
    <!--main content end-->
</section>
<!-- container section start -->


<?php require_once ROOT_PATH . '/includes/footer.php'; ?>

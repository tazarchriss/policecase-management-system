
<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/OCCID/sidebar1.php'; ?>
<?php

if (isset($_POST['asign'])) {

    $officer = $_POST['officer'];
    $case = $_POST['case'];

    $sql="INSERT INTO `investigation` (`investId`, `officerId`, `caseId`) VALUES (NULL, '$officer', '$case')";
    if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Police officer case investigation Registered successfuly'); window.location='investigator.php'</script>";
            } else {
                echo "<script>alert('Police officer case investigation Registration failed'); window.location='index.php'</script>";
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
                <h3 class="page-header"><i class="fa fa-laptop"></i> ASSIGNING INVESTIGATOR</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo BASE_URL . '/OCCID/index.php' ?>">Home</a></li>
                    <li><i class="fa fa-laptop"></i><a href="<?php echo BASE_URL . '/OCCID/investigation/investigator.php' ?>">Investigation</a></li>
                    <li><i class="fa fa-laptop"></i>Assigning investigator</li>
                </ol>
            </div>
        </div>
        <?php $id = $_GET['id']; ?>
        <?php 
$s="SELECT * FROM `policecase` WHERE caseId='$id'";
$res=mysqli_query($conn,$s);
if(mysqli_num_rows($res)>0){
    $ro=mysqli_fetch_assoc($res);
    if($ro['progress']=="investigate" || $ro['progress']=="Investigate"){
        ?>
        <!-- ======= investigation Section ======= -->
       
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Assignment of investigator to  Case no: <?php echo $id; ?>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " id="register_form" method="POST" action="investigation.php">
                                <div class="form-group ">
                                    <label for="fullname" class="control-label col-lg-2">   Case No<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="fullname" type="text" value="<?php echo $id; ?>" disabled/>
                                        <input class=" form-control" id="fullname" name="case" type="hidden" value="<?php echo $id; ?>"/>
                                    </div>
                                </div>
                               
                                <div class="form-group ">
                                    <label for="marital" class="control-label col-lg-2">Police Officer <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-bot15" id="marital" name="officer" required>
                                            <?php

                                            $sql = "SELECT * FROM policeOfficer, rank, user WHERE policeofficer.userId=user.userId AND policeofficer.rankId=rank.rankId AND rank.rankId!=2 AND rank.rankId!=3";
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <option value="<?php echo $row["officerId"]; ?>"><?php
                                                                                                        echo $row["firstName"]; 
                                                                                                        echo " ";
                                                                                                        echo $row["middleName"]; 
                                                                                                        echo " ";
                                                                                                        echo $row["lastName"]; 
                                                                                                        echo " ";
                                                                                                        echo $row["rankName"]; 
                                                                                                        
                                                                                                        ?></option>

                                            <?php
                                                }
                                            } else {
                                                echo "No officer available";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit" name="asign">Asign Investigator</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- End accuser Section -->
<?php

    }else{
        echo "<script>alert('This Case is not approved for investigation. You are able to assign investigator for approved cases only'); window.location='index.php'</script>"; 
    }
}
        ?>
       
   
<?php require_once ROOT_PATH . '/includes/footer.php'; ?>

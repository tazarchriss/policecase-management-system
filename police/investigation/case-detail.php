<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/sidebar.php'; ?>
<?php $id = $_GET['id']; ?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> Review case</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo BASE_URL . '/police/index.php' ?>">Home</a></li>
                    <li><i class="fa fa-laptop"></i><a href="<?php echo BASE_URL . '/police/investigation/investigation.php' ?>">Cases</a></li>
                    <li><i class="fa fa-laptop"></i>Review Cases</li>
                </ol>
            </div>
        </div>



        <?php $query = $conn->query("SELECT * FROM `policecase` as pc, accuser as acr INNER JOIN user as u WHERE pc.accuserId = acr.accuserId AND acr.userId=u.userId AND caseId='$id'"); ?>
        <?php foreach ($query as $key => $row) : ?>
                    
        

        <div id="profile" class="tab-pane">
                    <section class="panel">
                      <div class="bio-graph-heading">
                        CASE No: <?php echo $row['caseId']; ?>
                      </div>
                      <div class="panel-body bio-graph-info">
                        <div class="row">
                          <div class="bio-row">
                            <p><span>Case Title </span>:<?php echo $row['title']; ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Case Description </span>:<?php echo $row['description']; ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Time Occured </span>:<?php echo $row['whenOccur']; ?></p>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <div id="profile" class="tab-pane">
                    <section class="panel">
                      
                      <div class="panel-body bio-graph-info">
                    <h1>Accuser Bio Graph</h1>
                    <div class="row">
                      <div class="bio-row">
                        <p><span>First Name </span>:<?php echo $row['firstName']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Middle Name </span>:<?php echo $row['middleName']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Last Name </span>:<?php echo $row['lastName']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Address </span>: <?php echo $row['address']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Gender </span>: <?php echo $row['gender']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Marital Status </span>: <?php echo $row['maritalStatus']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Birthday</span>:<?php echo $row['dob']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Registered On </span>:<?php echo $row['created_at']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Phone </span>: <?php echo $row['phone']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Chair person Full Name </span>: <?php echo $row['cfname']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Chair person Phone  </span>: <?php echo $row['cphone']; ?></p>
                      </div>
                    </div>
                    </section>
                  </div>
                  <?php endforeach; ?>

                  <?php $quer = $conn->query("SELECT * FROM `policecase` as pc, accused as acr INNER JOIN user as u WHERE pc.accusedId = acr.accusedId AND acr.userId=u.userId AND caseId='$id'"); ?>
        <?php foreach ($quer as $key => $rows) : ?>

                  <div id="profile" class="tab-pane">
                    <section class="panel">
                      
                      <div class="panel-body bio-graph-info">
                      <h1>Accused Bio Graph</h1>
                      <div class="row">
                      <div class="bio-row">
                        <p><span>First Name </span>:<?php echo $rows['firstName']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Middle Name </span>:<?php echo $rows['middleName']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Last Name </span>:<?php echo $rows['lastName']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Address </span>: <?php echo $rows['address']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Gender </span>: <?php echo $rows['gender']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Marital Status </span>: <?php echo $rows['maritalStatus']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Birthday</span>:<?php echo $rows['dob']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Reported On </span>:<?php echo $rows['created_at']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Phone </span>: <?php echo $rows['phone']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Chair person Full Name </span>: <?php echo $rows['accusedcfname']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>Chair person Phone  </span>: <?php echo $rows['accusedcphone']; ?></p>
                      </div>
                    </div>
                    </section>
                  </div>
                  <?php endforeach; ?>


<?php require_once ROOT_PATH . '/includes/footer.php'; ?>




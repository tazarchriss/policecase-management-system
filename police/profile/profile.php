<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/sidebar.php'; ?>
<?php

if (isset($_POST['profile'])) {

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$marital = $_POST['marital'];
$email = $_POST['email'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$uid = $_POST['uid'];
$oid = $_POST['oid'];

$sql = "UPDATE `user` SET `firstName` = '$fname', `middleName` = '$mname', `lastName` = '$lname', `phone` = '$phone', `address` = '$address', `maritalStatus` = '$marital' WHERE `user`.`userId` = '$uid'";
if ($conn->query($sql) === TRUE) {

    

    $query = "UPDATE `policeofficer` SET `email` = '$email', `userName` = '$uname', `password` = SHA1('$pass') WHERE `policeofficer`.`officerId` = '$oid'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Profile updating succeeded'); window.location='profile.php'</script>";
    } else {
        echo "<script>alert('police officer profile updation failed'); window.location='profile.php'</script>";
    }
} else {
    echo "<script>alert('User update failed'); window.location='profile.php'</script>";
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
        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-user-md"></i>Profile</li>
        </ol>
      </div>
    </div>
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading tab-bg-info">
            <ul class="nav nav-tabs">
              <li class="active">
                <a data-toggle="tab" href="#recent-activity">
                  <i class="icon-home"></i>
                  Daily Activity
                </a>
              </li>
              <li>
                <a data-toggle="tab" href="#profile">
                  <i class="icon-user"></i>
                  Profile
                </a>
              </li>
              <li class="">
                <a data-toggle="tab" href="#edit-profile">
                  <i class="icon-envelope"></i>
                  Edit Profile
                </a>
              </li>
            </ul>
          </header>
          <div class="panel-body">
            <div class="tab-content">
              <div id="recent-activity" class="tab-pane active">
                <div class="profile-activity">
                  <div class="act-time">
                    <div class="activity-body act-in">
                      <span class="arrow"></span>
                      <div class="text">
                        <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                        <p class="attribution"><a href="#">Jonatanh Doe</a> at 4:25pm, 30th Octmber 2014</p>
                        <p>It is a long established fact that a reader will be distracted layout</p>
                      </div>
                    </div>
                  </div>
                  <div class="act-time">
                    <div class="activity-body act-in">
                      <span class="arrow"></span>
                      <div class="text">
                        <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                        <p class="attribution"><a href="#">Jhon Loves </a> at 5:25am, 30th Octmber 2014</p>
                        <p>Knowledge speaks, but wisdom listens.</p>
                      </div>
                    </div>
                  </div>
                  <div class="act-time">
                    <div class="activity-body act-in">
                      <span class="arrow"></span>
                      <div class="text">
                        <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                        <p class="attribution"><a href="#">Rose Crack</a> at 5:25am, 30th Octmber 2014</p>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                      </div>
                    </div>
                  </div>
                  <div class="act-time">
                    <div class="activity-body act-in">
                      <span class="arrow"></span>
                      <div class="text">
                        <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                        <p class="attribution"><a href="#">Jimy Smith</a> at 5:25am, 30th Octmber 2014</p>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                          ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                      </div>
                    </div>
                  </div>
                  <div class="act-time">
                    <div class="activity-body act-in">
                      <span class="arrow"></span>
                      <div class="text">
                        <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                        <p class="attribution"><a href="#">Maria Willyam</a> at 5:25am, 30th Octmber 2014</p>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                          ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt
                          condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros
                          eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
                      </div>
                    </div>
                  </div>
                  <div class="act-time">
                    <div class="activity-body act-in">
                      <span class="arrow"></span>
                      <div class="text">
                        <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                        <p class="attribution"><a href="#">Sarah saw</a> at 5:25am, 30th Octmber 2014</p>
                        <p>Knowledge speaks, but wisdom listens.</p>
                      </div>
                    </div>
                  </div>
                  <div class="act-time">
                    <div class="activity-body act-in">
                      <span class="arrow"></span>
                      <div class="text">
                        <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                        <p class="attribution"><a href="#">Layla night</a> at 5:25am, 30th Octmber 2014</p>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                      </div>
                    </div>
                  </div>
                  <div class="act-time">
                    <div class="activity-body act-in">
                      <span class="arrow"></span>
                      <div class="text">
                        <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                        <p class="attribution"><a href="#">Andriana lee</a> at 5:25am, 30th Octmber 2014</p>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                          ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                      </div>
                    </div>
                  </div>
                  <div class="act-time">
                    <div class="activity-body act-in">
                      <span class="arrow"></span>
                      <div class="text">
                        <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                        <p class="attribution"><a href="#">Maria Willyam</a> at 5:25am, 30th Octmber 2014</p>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                          ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt
                          condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros
                          eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- profile -->
              <div id="profile" class="tab-pane">
                <section class="panel">
                  <?php
                  $id = $_SESSION['id'];
                  $query = mysqli_query($conn, "SELECT * FROM policeofficer, user where policeofficer.userId=user.userId AND policeofficer.officerId='$id'");
                  $row = mysqli_fetch_array($query);

                  ?>
                  <div class="panel-body bio-graph-info">
                    <h1>Bio Graph</h1>
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
                        <p><span>Email </span>: <?php echo $row['phone']; ?></p>
                      </div>
                      <div class="bio-row">
                        <p><span>User Name </span>: <?php echo $row['userName']; ?></p>
                      </div>
                    </div>
                  </div>
                </section>
                <section>
                  <div class="row">
                  </div>
                </section>
              </div>
              <!-- edit-profile -->
              <div id="edit-profile" class="tab-pane">
                <section class="panel">
                  <div class="panel-body bio-graph-info">
                    <h1> Profile Info</h1>
                    <form class="form-horizontal" role="form" method="post" action="profile.php">
                      <div class="form-group">
                        <label class="col-lg-2 control-label">First Name</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="f-name" placeholder=" " value="<?php echo $row['firstName']; ?>" name="fname">
                          <input type="hidden" class="form-control" id="f-name" placeholder=" " value="<?php echo $row['userId']; ?>" name="uid">
                          <input type="hidden" class="form-control" id="f-name" placeholder=" " value="<?php echo $row['officerId']; ?>" name="oid">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Middle Name</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="l-name" placeholder=" " value="<?php echo $row['middleName']; ?>" name="mname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Last Name</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="l-name" placeholder=" " value="<?php echo $row['lastName']; ?>" name="lname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Phone</label>
                        <div class="col-lg-10">
                          <input type="tel" class="form-control" id="phone" placeholder=" " value="<?php echo $row['phone']; ?>" name="phone">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Address</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="address" placeholder=" " value="<?php echo $row['address']; ?>" name="address">
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="marital" class="control-label col-lg-2">Marital Status <span class="required">*</span></label>
                        <div class="col-lg-6">
                          <select class="form-control m-bot15" id="marital" name="marital" required>
                            <option value="">select marital status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-6">
                          <input type="email" class="form-control" id="occupation" placeholder=" " value="<?php echo $row['email']; ?>" name="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">User Name</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="email" placeholder=" " value="<?php echo $row['userName']; ?>" name="uname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-6">
                          <input type="password" class="form-control" id="mobile" placeholder="If you don't want to change your paasword write old password " name="pass" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                          <button type="submit" class="btn btn-primary" type="submit" name="profile">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>





    <?php require_once ROOT_PATH . '/includes/footer.php'; ?>

 45"
<!-- //include the database connection -->
<?php require_once '../../path.php'; ?>
<?php require_once ROOT_PATH . '/connect.php'; ?>
<?php require_once ROOT_PATH . '/session.php'; ?>

<?php

$id = $_GET['deleteid'];


$sql = "DELETE FROM `user` WHERE `user`.`userId` ='$id'";
if(mysqli_query($conn, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="view.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Error in deleting!");';
	echo 'window.location="view.php";';
	echo '</script>';
}
?>

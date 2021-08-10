<?php
require_once 'path.php'; ?>
<!-- //include the database connection -->
<?php require_once ROOT_PATH . '/connect.php'; ?>

<?php
session_start();
   
if(!isset($_SESSION['id'])){
	header('location:' . BASE_URL . '/index.php'); 
}
?>
<!-- <div class="alert alert-primary role=alert">Your online now!!</div> -->

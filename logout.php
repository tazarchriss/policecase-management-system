<?php
require_once  'path.php';

session_start();

    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['manager']);
    unset($_SESSION['message']);

session_destroy();
header('location:' . BASE_URL . '/index.php');    
?>

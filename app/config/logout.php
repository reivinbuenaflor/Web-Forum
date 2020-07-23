<?php 
session_start();
$username = $_SESSION['user'];

unset($username);
	
session_destroy();
header('location: ../../public/login.php');
exit();
?>
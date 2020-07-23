<?php 
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/router.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$toReg = new AuthCont();
	$toReg->toRegister($_POST['username'],$_POST['password'],$_POST['email'],$_POST['fname'],$_POST['mname'],$_POST['lname'],$_POST['num']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<form action="singup.php" method="post">
		Username: <input type="text" name="username">
		Password: <input type="password" name="password">
		Email: <input type="email" name="email">
		User Details
		Firstname: <input type="text" name="fname">
		Middlename: <input type="text" name="mname">
		Lastname: <input type="text" name="lname">
		Phone Number: <input type="text" name="num">
		<button type="submit">Register</button>
	</form>
</body>
</html>
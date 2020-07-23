<?php 
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/router.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$toLog = new AuthCont();
	$toLog->toLogin($_POST['logUser'],$_POST['logPass']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<form action="login.php" method="post">
		Username: <input type="text" name="logUser">
		Password: <input type="password" name="logPass">
		<button type="submit" name="login">Login</button>
	</form>
</body>
</html>
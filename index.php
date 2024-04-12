<?php
session_start();

	include("connection.php");
	include("functions.php");

		$user_data = check_login($con);
	
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="style.css">

<head>
	<title>vip concert connect</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

	<a href="logut.php">logout</a>
	<h1>main page </h1>
	
	<br>
	hello, <?php echo $user_data['user_name']; ?>
</body>
</html>
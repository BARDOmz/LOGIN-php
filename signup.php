<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if(!empty($user_name) && !empty($password))
		{
			
			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) value ('$user_id','$user_name','$password')";
			
			mysqli_query($con, $query);
			
			header("location: login.php");
			die;
		}else
		{
			echo "please enter some valid information!"; 
		}
		
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{
		
		height: 20px;
		border-radius: 4px;
		padding: 2px;
		border: solid thin #fff;
		width: 100%;
		
	}
	
	#button{
		
		padding: 7px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}
	
	#box{
		
		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	
	</style>
	
	<div id= "box">
	
		<form method="post" >
			<div style="font-size: 20px;margin: 10px;color: white;">signup</div>
				<input id="text" type="text" name="user_name"><br><br>
				<input id="text"type="password" name="password"><br><br>
			
				<input id="button"type="submit" value="signup"><br><br>
			
				<a href="login.php">click to login</a><br><br>
		</form>
	
	</div>
	 
</body>
</html>
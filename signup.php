<?php 
session_start();

	include("db_conn.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			$user_id = random_num(5);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($conn, $query);

			header("Location: index.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>		
		<form method="POST">
		<div class="signup">
			<label>USERNAME</label><br><br>
			<input type="text" name="user_name" class="un" placeholder="username" required=""><br><br>
			<label>PASSWORD</label><br><br>
			<input type="password" name="password" class="pw" placeholder="password" required=""><br><br>
			<button type="submit">signup</button><br><br>
			<a href="index.php">Login</a>
		</div>
		</form>
	</div>
</body>
</html>
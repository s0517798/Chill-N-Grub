<?php 

session_start();

	include("db_conn.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: admin.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="loginform">
		<form method="POST">
		<div class="login">
			<label>USERNAME</label><br><br>
			<input type="text" name="user_name" class="un" placeholder="username" required=""><br><br>
			<label>PASSWORD</label><br><br>
			<input type="password" name="password" class="pw" placeholder="password" required=""><br><br>
			<button type="submit" class="loginbtn">log-in</button><br><br>
			<label>Not a member?</label>
			<a href="Signup.php">Sign-up</a>
		</div>
		</form>
</body>
</html>

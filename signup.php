<?php

include './database/config.php';

date_default_timezone_set("Asia/Dhaka");

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
	header("Location: index.php");
}

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$date = date("Y-m-d");
	$last_login = date("Y-m-d h:i:s");
	$p = $_POST['password'];

	if ($password == $cpassword) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			if (strlen($p) > 5) {

				$sql = "SELECT * FROM users WHERE email='$email'";
				$result = mysqli_query($conn, $sql);

				if (!$result->num_rows > 0) {
					$sql = "INSERT INTO users (username, email, password, register_date, last_login)
						VALUES ('$username', '$email', '$password', '$date', '$last_login')";
					$result = mysqli_query($conn, $sql);
					if ($result) {

						echo "<script>alert('Wow! User Registration Completed.')</script>";
						$username = "";
						$email = "";
						$_POST['password'] = "";
						$_POST['cpassword'] = "";
						$date = "";
						$last_login = "";

					} else {
						echo "<script>alert('Woops! Something Wrong Went.')</script>";
					}
				} else {
					echo "<script>alert('Woops! Email Already Exists.')</script>";
				}
			} else {
				echo "<script>alert('Password has to be minimum of 6 charecters')</script>";
			}
		} else {
			echo "<script>alert('Woops! Incorrect Email')</script>";
		}
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="./includes/login_styles.css">
</head>

<body>

	<form action="" method="POST" class="login-email">
		<h2>SIGN UP</h2>
		<div class="input-group">
			<label for="username">User Name</label>
			<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required> <br>
		</div>
		<div class="input-group">
			<label for="email">Email</label>
			<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required> <br>
		</div>
		<div class="input-group">
			<label for="password">Password</label>
			<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required> <br>
		</div>
		<div class="input-group">
			<label for="cpassword">Confirm Password</label>
			<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required> <br>
		</div>
		<div class="input-group">
			<button name="submit" class="btn">Sign Up</button>
		</div>
		<a href="index.php" class="ca">Already have an account?</a>
	</form>

</body>

</html>
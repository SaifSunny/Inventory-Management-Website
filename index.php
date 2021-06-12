<?php

include './database/config.php';
date_default_timezone_set("Asia/Dhaka");

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
	header("Location: home.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$last_login = date("Y-m-d h:i:s");

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$sql = "UPDATE users SET last_login='$last_login' WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		header("Location: home.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="./includes/login_styles.css">
</head>

<body>

	<form action="" method="POST" class="login-email">
		<h2>LOG IN</h2>
		<div class="form-group">
			<label>Email</label>
			<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required><br>

		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required><br>
		</div>
		<div class="input-group">
			<button name="submit" class="btn">Login</button>
		</div>
		<a href="signup.php" class="ca ">Create an account</a>
	</form>
</body>

</html>
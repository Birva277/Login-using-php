<?php
	session_start();
	include 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js">
	</script>
</head>
<body style="background-color: lightgrey;">

<div class="modal-dialog text-center">
	<div class="col-sm-12 main-section">
		<div class="modal-content">
			<br>
			<h3 align="text-center">Login Form</h3>
			<div class="col-12 user-img">
				<img src="imgs/registerimg2.png" width="50%" height="50%">
			</div>
				<br>
				<form class="col-sm-10" action="index.php" method="post">
					<div class="form-group">
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-user"></i>
								</span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="Enter Username" required>
						</div>
						
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-lock"></i>
								</span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
						</div>		
					</div>
					<button type="submit" class="btn btn-success" style="margin-right: 3px;" name="login">
						<i class="fas fa-sign-in-alt" style="padding-right: 4px;width: 17px;"></i>Login
					</button>
					<button type="submit" class="btn btn-primary"><a href="register.php" style="color: white; text-decoration: none;">Register here</a>
					</button><br>
					<a href="#">Forgot Password?</a>
				</form>
				<br>

				<?php
					if(isset($_POST['login'])){
						//to login
						$username = $_POST['username'];
						$password = $_POST['password'];
						$query = "select * from userinfotable WHERE username='$username' AND password='$password'";

						$query_run = mysqli_query($con,$query);
						//to check whether 2 entries are not same
						if(mysqli_num_rows($query_run)>0){
							//valid
							$_SESSION['user']=$username;
							header('location:homepage.php');
						}
						else {
							echo '<script type="text/javascript">alert("Invalid credentials.")</script>';//invalid
						}
					}
					
				?>
			</div>
	</div>
</div>

</body>
</html>
<?php
	include 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
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
			<h3 align="text-center">Registration Form</h3>
			<div class="col-12 user-img">
				<img src="imgs/registerimg2.png" width="50%" height="50%">
			</div>
				<br>
				<form class="col-sm-10" action="register.php" method="post">
					<div class="form-group">
						<input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
						<div class="row" style="margin: 5px 0px;">
							<h11 class="col-sm-3">Gender : </h11>
							<div class="col-sm-3 custom-control custom-radio">
								<input type="radio" id="g1"class="custom-control-input" name="gender" value="male"><label class="custom-control-label" for="g1"><h11>Male</h11></label>
							</div>
							<div class="col-sm-3 custom-control custom-radio">
								<input type="radio" id="g2"class="custom-control-input" name="gender" value="female"><label class="custom-control-label" for="g2"><h11>Female</h11></label>
							</div>
						</div>
						<div class="row" style="margin: 5px 0px;">
							<h11 class="col-sm-7">Educational Qualification</h11>
							<select class="col-sm-4" name="qualification">
								<option>B.Tech</option>
								<option>M.Tech</option>
								<option>BBA</option>
								<option>MBA</option>
							</select>
						</div>

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

						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-lock"></i>
								</span>
							</div>
							<input type="password" name="confirmp" class="form-control" placeholder="Confirm Password" required>
						</div>					
					</div>
					
					<button type="submit" class="btn btn-success" name="submit_btn"></i>Sign Up
					</button>
					<button type="submit" class="btn btn-info" name="back_btn"><a href="index.php" style="color: white; text-decoration: none;"></i>Back</a>
					</button><br>
				</form>
				<br>

				<?php
					if (isset($_POST['submit_btn'])) {
						//echo '<script type="text/javascript"> alert("Sign Up button clicked")</script>';
						$fullname = $_POST['fullname'];
						$gender = $_POST['gender'];
						$qualification = $_POST['qualification'];

						$username = $_POST['username'];
						$password = $_POST['password'];
						$confirmp = $_POST['confirmp'];

						if ($password == $confirmp) {
							$query = "select * from userinfotable where username='$username' ";
							$query_run = mysqli_query($con,$query);
							if(mysqli_num_rows($query_run)>0){
								//there is already a user with the same username
								echo '<script type="text/javascript"> alert("User already exists, try another username.")</script>';
							}
							else {
								$query = "insert into userinfotable values('','$username','$fullname','$gender','$qualification','$password')";//acc to  column
								$query_run = mysqli_query($con,$query);

								if($query_run){
									echo '<script type="text/javascript"> alert("User registered, go to login page to login.")</script>';
								}
								else {
									echo '<script type="text/javascript"> alert("Error!")</script>';
								}
							}
							
						}
						else {
							echo '<script type="text/javascript"> alert("Password and Confirm Password does not match!")</script>';
						}
					}
				?>
			</div>
	</div>
</div>

</body>
</html>
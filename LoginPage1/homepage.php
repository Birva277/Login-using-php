<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
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
			<h3 align="text-center">Home Page</h3>
			<h5 align="text-center">Welcome 
				<?php echo $_SESSION['user'] ?>
			</h5>
			<div class="col-12">
				<img src="imgs\registerimg2.png" width="50%" height="50%">
			</div>
			<br>
			<form action="homepage.php" class="col-sm-10" method="post">
				<button type="submit" class="btn btn-danger" name="logout">
						<i class="fas fa-sign-out-alt" style="padding-right: 4px;width: 17px;"></i>Log out
					</button><br><br>
			</form>
			<?php
				if (isset($_POST['logout'])) {
					session_destroy();
					header('location:index.php');
				}
			?>
		</div>
	</div>
</div>

</body>
</html>
<!-- Establish connection to data base-->

<?php
	$con = mysqli_connect("localhost","root","") or die("Unable to connect"); //ip_address username password

	mysqli_select_db($con,'loginpage1db');//connection_obj or var ,db_name 
	//as the method used in form is post (order vice-versa)
?>
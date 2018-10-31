<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "db";

	$conn = new mysqli($servername, $username, $password, $dbname);


	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	}

	$email = $_POST['email'];
	$password = $_POST['password'];
		
	$sql = "SELECT * FROM register WHERE email = '" .$email. "' and password = '" .$password. "'";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0) {
		$row = $result->fetch_assoc();
		
		?>


		<h2 style ="text-align :center;"> Welcome <?php echo $row['fname']. "    " .$row['lname'] ?> </h2>



	
		<?php
		exit();
	}
} 
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>

	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


		<h1 style="  margin-left : 500px; font-weight:  bold;">Login</h1>
		<form method  = "POST" style="  margin-left : 500px;" >
	
			
		<div class="form-group tab">
					<label>Email </label> 
					<input type="Email" class="form-control" name="email"   id="email" style="width: 300px;">
				</div>
				<div class="form-group">
					<label>Password </label>
					 <input type="password" class="form-control" name="password"  id="email" style="width: 300px;">
				</div>
				<div style="margin-left: 220px; ">
					<input type ="submit" class = "btn btn-success" name = "login" id = "login" style="width: 80px;" value = "Login" >
				</div>
		</div>    
	</form>




	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


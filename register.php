<h2 style="  margin-left : 550px; font-weight:  bold;">Registration </h2> <br>

<?php
session_start();

if(isset($_POST["step2"])) {
	$_SESSION["fname"] =  $_POST['fname'];
	$_SESSION["lname"] =  $_POST['lname'];
	displayLogin();
} else {
	displayStep1();
}

function setValue( $feildName ) {
	if(isset($_POST[$feildName])) {
		echo $_POST[$feildName];
	}
}

if(isset($_POST['login'])) {
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		// Database Connection and Insertion....
		$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$dbname = "db";

		$conn = new mysqli($servername, $username, $password, $dbname);


		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
		}
		
		$fname = $_SESSION['fname'];
		$lname = $_SESSION['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//echo $fname. "     " .$lname. "     " .$email. "     " .$password;
		$sql = "INSERT INTO register(fname, lname, email, password) VALUES('" . $fname ."','".$lname."','" .$email."','". $password."')";
		echo $sql;
		if( mysqli_query($conn, $sql) == true) {
			header('Location: http://localhost/demo/example.php');
			exit();
		} else {
	    	echo "Error: " . $sql . "<br>" . $conn->error;
		}


}
		
}
?>
<html>
<head>
	<title>Registration</title>
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
	<?php function displayStep1() {  ?>
		
		<form method  = "POST" style="  margin-left : 500px; " >
				<label>First Name </label> 
				<input type="text" class="form-control" name="fname"  id="fname" value ="<?php echo $_SESSION['fname']  ?>" style="width: 300px;">
			</div>
			<div class="form-group">
				<label>Last Name </label>
				<input type="text" class="form-control" name="lname" value ="<?php setValue("lname") ?>"  id="lname" style="width: 300px;">
			</div>
			
			<div style="position: absolute; right: 735;">
				<input type ="submit" class = "btn btn-success" name ="step2" value = "next" >
			</div>

	<?php } ?>


	<?php function displayLogin() {  ?>
		<form method  = "POST" style="  margin-left : 500px;" >
	
		<input type="hidden" name="first" value="<?php setValue("first") ?>">
		<input type="hidden" name="second" value="<?php setValue("second") ?>">
			
		<div class="form-group tab">
					<label>Email </label> 
					<input type="Email" class="form-control" name="email" value =" <?php setValue("email") ?>"  id="email" style="width: 300px;">
				</div>
				<div class="form-group">
					<label>Password </label>
					 <input type="password" class="form-control" name="password"  id="email" style="width: 300px;">
				</div>
				<div style="position: absolute; right: 735;">
					<input type ="submit" class = "btn btn-success" name ="step1" value = "previous" >
					<input type ="submit" class = "btn btn-success" name = "login" id = "login" value = "Login" >

				</div>
		</div>		
	</form>

<?php } ?>
<br>
	

</body>

</html>

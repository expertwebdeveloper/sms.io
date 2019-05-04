<?php
	session_start();
	if(isset($_SESSION['uid']))
	{
		header('location:admin/admindash.php');
	}






?>
<!DOCTYPE html>
<html>
<head>
	<title>admin lgin</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
	.abc{
		position:relative;
		left:30%;
		
	}
	</style>
</head>
<body class="container abc">
	<div class="row">
	<div class="col-sm-4">

	<h1>Admin Login</h1>
	<form action="login.php" method="post">
		
				<div class="form-group">
					<label for="name">Username</label>
					<input type="text" name="name" class="form-control">
				</div>
				
				<div class="form-group">
					<label for="pass">Password</label>
					<input type="Password" name="pass" class="form-control">
					
				</div>
			
				<button type="submit" name="login" class="btn btn-success">Login</button>
				
			
				
				
	
		

	</form>
</div>
</div>
</body>
</html>
<?php
	include('dbcon.php');

	if(isset($_POST['login']))
	{
		$name = $_POST['name'];
		$pass = $_POST['pass'];

		$sql = "SELECT * FROM admin WHERE username = '$name' AND password = '$pass'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_num_rows($result);
		if($row<1)
		{
			?>
			<h6 class="alert alert-danger">Username or Password not match!! pls try again</h6>

			<?php
		}
		else
		{
			$data = mysqli_fetch_assoc($result);
		 	$id = $data['id'];
		 
		 	$_SESSION['uid']=$id;
		 	header('location:admin/admindash.php');

		}
		
	}


?>
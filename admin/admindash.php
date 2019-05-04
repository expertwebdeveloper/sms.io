<?php

	session_start();
	if(isset($_SESSION['uid']))
	{
		echo $_SESSION['uid'];
	}
	else
	{
		header('location:../login.php');
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>welcome to admin dashbord</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div style="margin-left:100px; margin-right:100px;">
		
		<div class="jumbotron">
			<h4 align="right"><a href="logout.php">Logout</a></h4>
			<h1 align="center">welcome to admin dashboard</h1>
		</div>
			
			<table class="table table-striped table-hover">
				<tr>
					<td>1</td>
					<td><a href="addstudent.php">insert student details</a></td>

				</tr>
				<tr>
					<td>2</td>
					<td><a href="updatestudent.php">update student details</a></td>

				</tr>
				<tr>
					<td>3</td>
					<td><a href="deletestudent.php">delete student details</a></td>

				</tr>


			</table>

</div>
		

	</div>
	

</body>
</html>
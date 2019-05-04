<!DOCTYPE html>
<html>
<head>
	<title>add sstudent dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
		
		
		*{
			margin: 0px;
			padding: 0px;
		}
	</style>
</head>
<body>
		<div class="container">
		<div class="jumbotron">
			<h4 align="left"><a href="admindash.php">Back to dashboard</a></h4>
			<h4 align="right"><a href="logout.php">Logout</a></h4>
			
			
			<h1 align="center" class="text text-success">welcome to admin dashboard</h1>
		</div>
		
		<div>
			<h2 align="center" class="text text-success">Add students in database</h2>
		<form action="addstudent.php" method="post" enctype="multipart/form-data">

			<table class="table">

				<tr>
					<th class="text text-success">Roll No</th>
					<td><input type="text" name="roll" id="r" placeholder=" enter your roll no"><br><span id="username"></span></td>
				</tr>
				<tr>
					<th class="text text-success">Full Name</th>
					<td><input type="text" name="name" id="n" placeholder=" enter your full name"></td>
				</tr>
				<tr>
					<th class="text text-success">Enter City</th>
					<td><input type="text" name="city" id="c" placeholder=" enter your city"></td>
				</tr>
				<tr>
					<th class="text text-success">Parents Cont No</th>
					<td><input type="text" name="pcont" id="p" placeholder=" enter your parents no"></td>
				</tr>
				<tr>
					<th class="text text-success">Standard</th>
					<td><select name="std">
						<option value="1">1st</option>
						<option value="2">2nd</option>
						<option value="3">3rd</option>
						<option value="4">4th</option>
						<option value="5">5th</option>
						<option value="6">6st</option>

					</select></td>
				</tr>
				<tr>
					<th class="text text-success">Choose Image</th>
					<td><input type="file" name="simg"></td>
				</tr>
				<tr>
					
					<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" class="btn btn-success" onclick="return validation();" style="cursor: pointer;"></td>
				</tr>



			</table>





		</form>
	</div>
		</div>

</body>
</html>
<?php
	include('../dbcon.php');
	session_start();
	if(isset($_SESSION['uid']))
	{
		echo $_SESSION['uid'];

	}
	else{
		header('location:../login.php');
	}

	if(isset($_POST['submit']))
	{
		if(($_POST['roll'] == '') || ($_POST['name'] == '') || ($_POST['city'] == '') || ($_POST['pcont'] == '') || ($_POST['std'] == '') || ($_POST['simg']))
		{
			echo "<script>alert('All fields are required!!');</script>";
		} 
		else
		{
		$roll = $_POST['roll'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcont = $_POST['pcont'];
		$std = $_POST['std'];
		$imgname = $_FILES['simg']['name'];
		$tempname = $_FILES['simg']['tmp_name'];
		$filepath = "../dataimages/".$imgname;

		move_uploaded_file($tempname,$filepath);

		$sql = "INSERT INTO student (roll, name, city, pcont, standard, image) VALUES ('$roll', '$name','$city', '$pcont', '$std','$imgname')";

		$result = mysqli_query($conn, $sql);

		if($result == true)
		{
			echo "<script>alert('Data inserted successfully');</script>";
		}
		else
		{
			echo "error";
		}
	   }
	}
?>

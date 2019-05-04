<!DOCTYPE html>
<html>
<head>
	<title>Student m=Management System</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
</head>
<body class="container">
	<div class="row">
		<div class="col-md-12">
	<h3 align="right" style="margin-top: 50px;"><a href="login.php">Admin Login</a></h3>
	<h1 align="center">welcome to student management system</h1>
	<div align="center">
	<form action="index.php" method="post">
		
		<table class="table table-striped">
			
				<tr>
					<td align="center" colspan="2"><font color="green" size="5">student information</font></td>
				</tr>
				<tr>
					<td>choose standard</td>
					<td>
						<select name="std">
							<option value="1">1st</option>
							<option value="2">2nd</option>
							<option value="3">3rd</option>
							<option value="4">4th</option>
							<option value="5">5th</option>
							<option value="6">6th</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Roll No</td>
					<td><input type="text" name="roll"></td>

				</tr>
				<tr>
				<td colspan="2">	
				<button type="submit" name="submit" class="btn btn-success btn-sm" style="cursor: pointer;">Show Info</button>
			</td>
			</tr>

			

		</table>



	</form>
</div>
</div>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['submit']))
	{
		include('dbcon.php');
		$standard = $_POST['std'];
		$roll = $_POST['roll'];

		$sql = "SELECT * FROM student WHERE standard='$standard' AND roll='$roll'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row = mysqli_fetch_assoc($result);
			?>
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<th colspan="5" class="text-center">Student Details</th>
					</tr>
					<tr>
						<td rowspan="6" align="center"><img src="dataimages/<?php echo $row['image'];?>" style="width: 140px; height: 150px;"  /></td>
						<th>Roll No</th>
						<td><?php echo $row['roll'];?></td>
					</tr>
					<tr>
						
						<th>Name</th>
						<td><?php echo $row['name'];?></td>
					</tr>
					<tr>
						
						<th>City</th>
						<td><?php echo $row['city'];?></td>
					</tr>
					<tr>
						
						<th>Parent's No</th>
						<td><?php echo $row['pcont'];?></td>
					</tr>


					<tr>
						
						<th>Standard</th>
						<td><?php echo $row['standard'];?></td>
					</tr>




				</table>
			<?php
		

		}
		else
		{
			echo "no records";
		}

	}


?>
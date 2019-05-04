<?php
	session_start();
	if(isset($_SESSION['uid']))
	{
		echo "";
	}
	else
	{
		header('location:login.php');
	}
	include('../dbcon.php');
	$sid = $_GET['sid'];
	$sql = "SELECT * FROM student WHERE id = '$sid'";
	$result = mysqli_query($conn,$sql);
	$data = mysqli_fetch_assoc($result);

?>
<style type="text/css">
		
		.jumbotron{
			height: 100px;
			margin-top: 10px;
			padding-top: 2px;
		}
		*{
			margin: 0px;
			padding: 0px;
		}
	</style>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<div class="container">
		<div class="jumbotron">
			<h1 align="center" class="text text-success">welcome to admin dashboard</h1>
			<h4 align="left"><a href="admindash.php">Back to dashboard</a></h4>

			<h4 align="right"><a href="logout.php">Logout</a></h4>
			
			
			
		</div>
		
		<div>
			<h2 align="center" class="text text-success"> Update formdata students in database</h2>
		<form action="updatedata.php" method="post" enctype="multipart/form-data">

			<table class="table">
				

				<tr>
					<th class="text text-success">Roll No</th>
					<td><input type="text" name="roll" id="r" value="<?php echo $data['roll']; ?>"><br><span id="username"></span></td>
				</tr>
				<tr>
					<th class="text text-success">Full Name</th>
					<td><input type="text" name="name" id="n" value="<?php echo $data['name']; ?>"></td>
				</tr>
				<tr>
					<th class="text text-success">Enter City</th>
					<td><input type="text" name="city" id="c" value="<?php echo $data['city']; ?>"></td>
				</tr>
				<tr>
					<th class="text text-success">Parents Cont No</th>
					<td><input type="text" name="pcont" id="p" value="<?php echo $data['pcont']; ?>"></td>
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
					
					<td colspan="2" align="center">

						<input type="hidden" name="sid" value="<?php echo $data['id'];?>"/>
						<input type="submit" name="submit" value="Submit" class="btn btn-success" style="cursor: pointer;">
					</td>
				</tr>



			</table>





		</form>
	</div>
		</div>
		
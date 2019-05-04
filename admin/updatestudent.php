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
?>
<!DOCTYPE html>
<html>
<head>
	<title>update student</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
		
		
		*{
			margin: 0px;
			padding: 0px;
		}
		#c{
			cursor: pointer;
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
		
		
			<h2 align="center" class="text text-success">Update students in database</h2>
		<div>
			<table class="table table-striped table-hover bg-success">
				<form action="updatestudent.php" method="post">
				<tr>
					<td><label for="std" class="text text-white">Enter Standard: </label></td>
					<td><input type="number" name="std"/></td>

					<td><label for="name" class="text text-white">Enter Name: </label></td>
					<td><input type="text" name="name"/></td>
					<td><input type="submit" name="update" value="Search" class="btn btn-white" id="c"/></td>
				</tr>

			</form>
			</table>
			<table class="table table-striped table-hover table-bordered">
				<tr class="text text-success">
					<th>No</th>
					<th>Image</th>
					<th>Name</th>
					<th>Roll</th>
					<th>Edit</th>

				</tr>
				<?php
					
					if(isset($_POST['update']))
					{
						include('../dbcon.php');
						$std = $_POST['std'];
						$name = $_POST['name'];

						$sql = "SELECT * FROM student WHERE standard='$std' AND name LIKE '%$name%'";

						$result = mysqli_query($conn,$sql);
						$row = mysqli_num_rows($result);
						if($row<1)
						{
							echo "<tr><td colspan='5'>No records</td></tr>";
						}
						else
						{	
							$cont=0;
							while($data=mysqli_fetch_assoc($result))
							{
								$cont++;
								?>	
								<tr align="center">
									<td><?php echo $cont; ?></td>
									<td><img src="../dataimages/<?php echo $data['image']; ?>" style="max-width:100px"/></td>
					            	<td><?php echo $data['name']; ?></td>
					            	<td><?php echo $data['roll']; ?></td>
					            	<td class="btn btn-warning"><a href="updateform.php?sid=<?php  echo $data['id']; ?>">Edit</a></td>
								</tr>
								<?php
							}
						}
					}



				?>


		</table>



		</div>
			
</body>
</html>
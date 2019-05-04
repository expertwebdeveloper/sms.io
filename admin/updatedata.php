
<?php
	

		include('../dbcon.php');
		$roll = $_POST['roll'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcont = $_POST['pcont'];
		$id=	$_POST['sid'];
		$std = $_POST['std'];
		

		$sql = "UPDATE student SET roll = '$roll', name = '$name', city = '$city', pcont = '$pcont', standard = '$std' WHERE id = $id";

		$result = mysqli_query($conn,$sql);

		if($result == TRUE)
		{
			?>
			<script type="text/javascript">
				window.alert('Data Updated Successfully');
				window.open('updateform.php?sid=<?php echo $id;?>','_self');

			</script>

			<?php
		}
		else
		{
			echo "error";
		}
	
	   
	
?>


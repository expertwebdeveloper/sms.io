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
	$sql = "DELETE FROM `student` WHERE id = '$sid'";
	$result = mysqli_query($conn,$sql);
	if($result == true)
	{
		?>
		<script type="text/javascript">
			alert('Data Delete Successfully');
			window.open('deletestudent.php','_self');

		</script>
		<?php
	}
	else
	{
		echo "error";
	}

?>

<?php


	$con = mysqli_connect('localhost', 'root', '', 'inventory');

	if(!$con)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

	if(isset($_POST['delete']))
	{
		$id = $_POST['creditor_id'];

		$sql = "DELETE FROM creditors WHERE creditor_id = '$id'";
		$query = mysqli_query($con, $sql);

		if($query)
		{
			echo "<script>alert('Creditor deleted Successfully')</script>";
			echo "<script>window.open('creditor.php', '_self')</script>";
		}
	}






?>
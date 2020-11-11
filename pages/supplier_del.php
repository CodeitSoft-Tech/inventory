<?php


	$con = mysqli_connect('localhost', 'root', '', 'inventory');

	if(!$con)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

	if(isset($_POST['delete']))
	{
		$id = $_POST['supplier_id'];

		$sql = "DELETE FROM supplier WHERE supplier_id = '$id'";
		$query = mysqli_query($con, $sql);

		if($query)
		{
			echo "<script>alert('Supplier deleted Successfully')</script>";
			echo "<script>window.open('supplier.php', '_self')</script>";
		}
	}


?>
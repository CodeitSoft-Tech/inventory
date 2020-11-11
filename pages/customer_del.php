<?php


	$con = mysqli_connect('localhost', 'root', '', 'inventory');

	if(!$con)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

	if(isset($_POST['delete']))
	{
		$id = $_POST['cust_id'];

		$sql = "DELETE FROM customer WHERE cust_id = '$id'";
		$query = mysqli_query($con, $sql);

		if($query)
		{
			echo "<script>alert('Customer deleted Successfully')</script>";
			echo "<script>window.open('customer.php', '_self')</script>";
		}
	}






?>
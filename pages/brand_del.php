<?php


	$con = mysqli_connect('localhost', 'root', '', 'inventory');

	if(!$con)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

	if(isset($_POST['delete']))
	{
		$id = $_POST['brand_id'];

		$sql = "DELETE FROM brands WHERE brand_id = '$id'";
		$query = mysqli_query($con, $sql);

		if($query)
		{
			echo "<script>alert('Brand deleted Successfully')</script>";
			echo "<script>window.open('brand.php', '_self')</script>";
		}
	}






?>
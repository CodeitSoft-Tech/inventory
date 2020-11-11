<?php


	$con = mysqli_connect('localhost', 'root', '', 'inventory');

	if(!$con)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

	if(isset($_POST['delete']))
	{
		$id = $_POST['prod_id'];

		$sql = "DELETE FROM product WHERE prod_id = '$id'";
		$query = mysqli_query($con, $sql);

		if($query)
		{
			echo "<script>alert('Product deleted Successfully')</script>";
			echo "<script>window.open('product.php', '_self')</script>";
		}
	}






?>
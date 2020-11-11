<?php


	$con = mysqli_connect('localhost', 'root', '', 'inventory');

	if(!$con)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

	if(isset($_POST['delete']))
	{
		$id = $_POST['cat_id'];

		$sql = "DELETE FROM category WHERE cat_id = '$id'";
		$query = mysqli_query($con, $sql);

		if($query)
		{
			echo "<script>alert('Category deleted Successfully')</script>";
			echo "<script>window.open('category.php', '_self')</script>";
		}
	}






?>
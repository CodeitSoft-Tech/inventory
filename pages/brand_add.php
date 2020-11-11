<?php 
session_start();
$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');

	$brand_name 	= $_POST['brand_name'];
	$brand_status 	= $_POST['brand_status'];
	

	
		$query2=mysqli_query($con,"SELECT * FROM brands WHERE brand_name='$brand_name'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count > 0)
		{
			echo "<script type='text/javascript'>alert('Brand already exist!');</script>";
			echo "<script>document.location='brand.php'</script>";  
		}
		

		mysqli_query($con,"INSERT INTO brands(brand_name, brand_status)
		VALUES('$brand_name','$brand_status')")or die(mysqli_error($con));

		echo "<script type='text/javascript'>alert('Successfully added new brand!');</script>";
		echo "<script>document.location='brand.php'</script>";  
		
?>
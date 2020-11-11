<?php 
session_start();
$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');

	$name 	  			= $_POST['prod_name'];
	$price 	  			= $_POST['prod_price'];
	$brand    			= $_POST['brand'];
	$category 			= $_POST['category'];
	$supplier 			= $_POST['supplier'];
	$barcode			= $_POST['barcode'];
	$prod_status		= $_POST['prod_status'];
	$reorder  			= $_POST['reorder'];

	
		$query2=mysqli_query($con,"select * from product where prod_name='$name' and branch_id='$branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count > 0)
		{
			echo "<script type='text/javascript'>alert('Product already exist!');</script>";
			echo "<script>document.location='product.php'</script>";  
		}
		
		

	mysqli_query($con,"INSERT INTO product(prod_name, prod_price, brand_id, cat_id, reorder, supplier_id, branch_id, prod_status , barcode) VALUES('$name','$price', '$brand','$category','$reorder', '$supplier','$branch', '$prod_status' , '$barcode')")or die(mysqli_error($con));

	echo "<script type='text/javascript'>alert('Successfully added new product!');</script>";
	echo "<script>document.location='product.php'</script>";  
		
?>
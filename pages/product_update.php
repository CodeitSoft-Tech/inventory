<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id 				= $_POST['id'];
	$name 				= $_POST['prod_name'];
	$supplier 			= $_POST['supplier'];
	$price 				= $_POST['prod_price'];
	$reorder 			= $_POST['reorder'];
	$brand				= $_POST['brand'];
	$barcode			= $_POST['barcode'];
	$category 			= $_POST['category'];
	$prod_status		= $_POST['prod_status'];

	
	

	mysqli_query($con,"update product set prod_name='$name',prod_price='$price', reorder='$reorder',supplier_id='$supplier',brand_id='$brand', cat_id='$category', prod_status = '$prod_status' , barcode = '$barcode' where prod_id='$id'")or die(mysqli_error($con));
	
echo "<script type='text/javascript'>alert('Successfully updated product details!');</script>";
echo "<script>document.location='product.php'</script>";  

	
?>

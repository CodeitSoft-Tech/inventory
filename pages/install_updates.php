<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$install_id 		= $_POST['install_id'];
	$lastname 	  		= $_POST['last_name'];
	$firstname 	  		= $_POST['first_name'];
	$address    		= $_POST['address'];
	$contact 			= $_POST['contact'];
	$product 	 		= $_POST['product'];
	$price 	 			= $_POST['price'];
	$qty				= $_POST['qty'];
	$amt_paid			= $_POST['amt_paid'];
	$install_status		= $_POST['install_status'];
	
	
	mysqli_query($con,"update installment set last_name='$lastname', first_name='$firstname', address = '$address', contact = '$contact', product_name = '$product', product_price = '$price', quantity = '$qty', amount_settled = '$amt_paid', install_status = '$install_status'  where install_id='$install_id'")or die( mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated customer details!');</script>";
	echo "<script>document.location='install.php'</script>";  

	
?>

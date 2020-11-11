<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$creditor_id 		= 	$_POST['creditor_id'];
	$cred_name			= 	$_POST['cred_name'];
	$contact			= 	$_POST['contact'];
	$pro_name 			= 	$_POST['pro_name'];
	$price				= 	$_POST['price'];
	$qty 				= 	$_POST['qty'];
	$down				=	$_POST['down'];
	$terms				= 	$_POST['terms'];
	$payable_for 		= 	$_POST['payable_for'];
	$creditor_status 	= 	$_POST['creditor_status'];
	
	
	mysqli_query($con,"update creditors set creditor_name='$cred_name', contact='$contact', product_name='$pro_name', product_price='$price', quantity = '$qty',down_paymt = '$down', term = '$terms', payable_for = '$payable_for',  creditor_status = '$creditor_status' where creditor_id='$creditor_id'")or die( mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated creditor details!');</script>";
	echo "<script>document.location='creditor.php'</script>";  

	
?>

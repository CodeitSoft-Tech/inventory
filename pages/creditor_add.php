<?php 
session_start();
$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');

	$cred_name 	  		= $_POST['cred_name'];
	$contact 			= $_POST['contact'];
	$pro_name 			= $_POST['pro_name'];
	$price  			= $_POST['price'];
	$qty  				= $_POST['qty'];
	$down				= $_POST['down'];
	$terms  			= $_POST['terms'];
	$payable_for  		= $_POST['payable_for'];
	$creditor_status  	= $_POST['creditor_status'];

	
		$query2=mysqli_query($con,"select * from creditors where creditor_name='$cred_name'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count > 0)
		{
			echo "<script type='text/javascript'>alert('Creditor already exist!');</script>";
			echo "<script>document.location='creditor.php'</script>";  
		}
		
		

			mysqli_query($con,"INSERT INTO creditors(creditor_name, contact, product_name, product_price, quantity, down_paymt, term, payable_for, payment_start, creditor_status)
			VALUES('$cred_name','$contact','$pro_name','$price', '$qty', '$down', '$terms', '$payable_for', NOW(), '$creditor_status')")or die(mysqli_error($con));

		echo "<script type='text/javascript'>alert('Successfully added new creditor!');</script>";
		echo "<script>document.location='creditor.php'</script>";  
		
?>
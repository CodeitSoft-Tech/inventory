<?php 
session_start();
$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');

	$lastname 	  		= $_POST['last_name'];
	$firstname 	  		= $_POST['first_name'];
	$address    		= $_POST['address'];
	$contact 			= $_POST['contact'];
	$product 	 		= $_POST['product'];
	$price 	 			= $_POST['price'];
	$qty				= $_POST['qty'];
	$amt_paid			= $_POST['amt_paid'];
	$install_status		= $_POST['install_status'];


	
		$query2=mysqli_query($con,"select * from installment where last_name='$lastname' and first_name='$firstname'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count > 0)
		{
			echo "<script type='text/javascript'>alert('Customer already exist!');</script>";
			echo "<script>document.location='install.php'</script>";  
		}
		
		

			mysqli_query($con,"INSERT INTO installment(last_name, first_name, address, contact, product_name, product_price, quantity, amount_settled, install_status, install_date, branch_id) 
				VALUES('$lastname','$firstname','$address','$contact','$product', '$price', '$qty','$amt_paid', '$install_status', NOW(), '$branch')")or die(mysqli_error($con));

		echo "<script type='text/javascript'>alert('Successfully added new installment Customer!');</script>";
		echo "<script>document.location='install.php'</script>";  
		
?>
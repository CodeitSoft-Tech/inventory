<?php 

include('../dist/includes/dbcon.php');

	$name 				= $_POST['name'];
	$address 			= $_POST['address'];
	$contact 			= $_POST['contact'];	
	$supplier_status 	= $_POST['supplier_status'];	
			
	mysqli_query($con,"INSERT INTO supplier(supplier_name,supplier_address,supplier_contact, supplier_status)VALUES('$name','$address','$contact', '$supplier_status')")or die(mysqli_error($con));

		echo "<script type='text/javascript'>alert('Successfully added new supplier!');</script>";
		echo "<script>document.location='supplier.php'</script>";  
	
?>
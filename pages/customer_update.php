<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id 		 = $_POST['id'];
	$last 		 = $_POST['last'];
	$first 		 = $_POST['first'];
	$address  	 = $_POST['address'];
	$contact 	 = $_POST['contact'];
	$balance 	 = $_POST['balance'];
	$cust_status = $_POST['cust_status']; 

	mysqli_query($con,"update customer set cust_last='$last',cust_first='$first',cust_address='$address', cust_contact='$contact', balance = '$balance', cust_status = '$cust_status' where cust_id='$id'")or die(mysqli_error());
	
echo "<script type='text/javascript'>alert('Successfully updated customer details!');</script>";
echo "<script>document.location='customer.php'</script>";  

	
?>

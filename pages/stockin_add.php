<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$name 				= $_POST['prod_name'];
	$qty 				= $_POST['qty'];
	$cost_per_product 	= $_POST['cost_per_product'];

	
	date_default_timezone_set('Africa/Accra');

	$date = date("Y-m-d");
	$id=$_SESSION['id'];
	
	$query=mysqli_query($con,"select prod_name from product where prod_id='$name'")or die(mysqli_error());
  
        $row=mysqli_fetch_array($query);
		$product=$row['prod_name'];
		$remarks="added $qty of $product";  
	
	mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks',NOW())")or die(mysqli_error($con));
		
		
	mysqli_query($con,"UPDATE product SET prod_qty=prod_qty+'$qty' where prod_id='$name' and branch_id='$branch'") or die(mysqli_error($con)); 

	
			
	mysqli_query($con,"INSERT INTO stockin(prod_id,qty,cost_per_product,date,branch_id) VALUES('$name','$qty', '$cost_per_product', NOW(),'$branch')")or die(mysqli_error($con));

	echo "<script type='text/javascript'>alert('Successfully added new stock!');</script>";
	echo "<script>document.location='stockin.php'</script>";  
	
?>
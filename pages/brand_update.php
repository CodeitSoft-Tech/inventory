<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$brand_id 		= 	$_POST['brand_id'];
	$brand_name		= 	$_POST['brand_name'];
	$brand_status	=	$_POST['brand_status'];
	
	
	mysqli_query($con,"UPDATE brands SET brand_name='$brand_name', brand_status = '$brand_status'WHERE brand_id='$brand_id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated brand details!');</script>";
	echo "<script>document.location='brand.php'</script>";  

	
?>

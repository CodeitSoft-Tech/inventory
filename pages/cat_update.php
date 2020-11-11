<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id 		= $_POST['id'];
	$category 	= $_POST['category'];
	$cat_status = $_POST['cat_status'];
	
	
	mysqli_query($con,"update category set cat_name='$category', cat_status='$cat_status'  where cat_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated category!');</script>";
	echo "<script>document.location='category.php'</script>";  

	
?>

<?php
session_start();

     $con = mysqli_connect('localhost', 'root', '', 'inventory');


if(isset($_POST['delete']))
	{
		$id 		= $_POST['stockin_id'];
		$user_id	= $_SESSION['id'];
		$qty 		= $_REQUEST['qty'];
		$pid 		= $_REQUEST['pid'];


		$sql = "DELETE FROM stockin WHERE stockin_id = '$id'";
		$query = mysqli_query($con, $sql);

		mysqli_query($con,"update product set prod_qty=prod_qty-'$qty' where prod_id='$pid'")or die(mysqli_error($con));

		$query=mysqli_query($con,"select prod_name from product where prod_id='$pid'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query);
		
			$name=$row['prod_name'];
			$unit=$row['prod_unit'];
			$date = date("Y-m-d H:i:s");
	
			$remarks="deleted $qty $name from stockin";
			mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$user_id','$remarks', NOW())")or die(mysqli_error($con));


		if($query)
		{
			echo "<script>alert('Stocking deleted Successfully')</script>";
			echo "<script>window.open('stockin.php', '_self')</script>";
		}
	}  
?>
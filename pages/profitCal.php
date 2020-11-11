<?php

	$ProfDB = mysqli_connect('localhost', 'root', '','inventory');

	$total = "";

	if(isset($_POST['btn_calculate'])) 
	{
		$branch				= $_SESSION['branch'];
		$net_sales 			= $_POST['net_sales'];
		$total_discount		= $_POST['total_discount'];
		$supplier_amt  		= $_POST['supplier_amt'];
		$interest_income  	= $_POST['interest_income'];
		$sale_expense		= $_POST['sale_expense'];
		$other_income		= $_POST['other_income'];
		$result 			= $_POST['result'];

		
		$total = $net_sales - $total_discount - $supplier_amt - $interest_income - $sale_expense - $other_income;

	}


	// Send profit info to database

	if(isset($_POST['btn_income'])) 
	{
		$branch				= $_SESSION['branch'];
		$net_sales 			= $_POST['net_sales'];
		$total_discount		= $_POST['total_discount'];
		$supplier_amt  		= $_POST['supplier_amt'];
		$interest_income  	= $_POST['interest_income'];
		$sale_expense		= $_POST['sale_expense'];
		$other_income		= $_POST['other_income'];
		$result 			= $_POST['result'];

		$sql = "INSERT INTO income(net_sales, total_discount, supplier_amount, interest_income,sale_expense, other_income,total_profit, branch_id, income_date) VALUES('$net_sales', '$total_discount', '$supplier_amt', '$interest_income', '$sale_expense', '$other_income','$result', '$branch', NOW())";

		$query = mysqli_query($ProfDB, $sql) or die("Error:".mysqli_error($ProfDB));

		if($query)
		{
			echo "<script>alert('Profit Details Sent successfully')</script>";
			echo "<script>window.open('income.php', '_self')</script>";
		}

	}





?>
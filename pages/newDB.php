<?php

	$db = mysqli_connect('localhost', 'root', '', 'inventory');

function ShowUsers()
	{
		global $db;

		$sql = "SELECT * FROM user WHERE status ='active'";

		$query = mysqli_query($db, $sql)or die();

		$count = mysqli_num_rows($query);


		echo $count;

	}

function ShowBrands()
	{
		global $db;

		$query = "SELECT * FROM brands WHERE brand_status ='active'";

		$run = mysqli_query($db, $query);

		$count_run = mysqli_num_rows($run);


		echo $count_run;

	}

function ShowCat()
	{
		global $db;

		$sql = "SELECT * FROM category WHERE cat_status ='active'";

		$query = mysqli_query($db, $sql);

		$count = mysqli_num_rows($query);

		echo $count;

	}

function ShowSupplier()
	{
		global $db;

		$sql = "SELECT * FROM supplier WHERE supplier_status ='active'";

		$query = mysqli_query($db, $sql);

		$count = mysqli_num_rows($query);

		echo $count;

	}

function ShowCust()
	{
		global $db;

		$sql = "SELECT * FROM customer WHERE cust_status ='active'";

		$query = mysqli_query($db, $sql);

		$count = mysqli_num_rows($query);

		echo $count;

	}

function ShowProd()
	{
		global $db;

		$sql = "SELECT * FROM product WHERE prod_status ='active'";

		$query = mysqli_query($db, $sql);

		$count = mysqli_num_rows($query);

		echo $count;

	}


function ShowCred()
	{
		global $db;

		$sql = "SELECT * FROM creditors WHERE creditor_status ='active'";

		$query = mysqli_query($db, $sql);

		$count = mysqli_num_rows($query);

		echo $count;

	}


	function ShowDiscount()
	{
			global $db;

            $query = "SELECT * FROM sales";
            $sql   = mysqli_query($db, $query);

            $sum = 0;

            while($num = mysqli_fetch_assoc($sql))
            {
                $sum += $num['discount'];
            }
        
        	echo "₵";
            echo number_format($sum, 2); 
	}

	function ShowSales()
	{
			global $db;

            $query = "SELECT * FROM sales_details"; 
            $sql   = mysqli_query($db, $query);

            $sum = 0;

            while($num = mysqli_fetch_assoc($sql))
            {
                $sum += $num['qty'] * $num['price'];
            }
        
        	echo "₵";
            echo number_format($sum, 2); 
	}



	function ShowCreditorAmt()
	{
			global $db;

            $query = "SELECT * FROM creditors";
            $sql   = mysqli_query($db, $query);

            $sum = 0;

            while($num = mysqli_fetch_assoc($sql))
            {
                $sum += $num['quantity']*$num['product_price'];
            }
        
        	echo "₵";
            echo number_format($sum, 2); 
	}


	function ShowCreditorAmtPaid()
	{
			global $db;

            $query = "SELECT * FROM creditors";
            $sql   = mysqli_query($db, $query);

            $sum = 0;

            while($num = mysqli_fetch_assoc($sql))
            {
                $sum += $num['down_paymt'];
            }
        
        	echo "₵";
            echo number_format($sum, 2); 
	}

	function ShowCreditorAmtleft()
	{
			global $db;

            $query = "SELECT * FROM creditors";
            $sql   = mysqli_query($db, $query);

            $sum = 0;

            while($num = mysqli_fetch_assoc($sql))
            {
                $sum += $num['quantity']*$num['product_price']-$num['down_paymt'];
            }
        
        	echo "₵";
            echo number_format($sum, 2); 
	}
?>
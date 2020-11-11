<?php
include('../dist/includes/dbcon.php');
if($_GET['barcode']) {
	
	$sql = "SELECT product.prod_id AS proid , product.prod_name AS productname , product.prod_qty AS quantity , product.prod_price AS price  FROM product JOIN supplier USING(supplier_id) JOIN  brands USING(brand_id) JOIN category USING(cat_id) WHERE  
	barcode='".$_GET['barcode']."'";
	$resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($conn));	
	
	while($rs = $resultset->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $rs;
	}
	
	
	
	echo json_encode($rows);
} else {
	echo 0;	
}
?>

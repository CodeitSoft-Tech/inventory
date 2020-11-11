<?php

  
  $connect = mysqli_connect('localhost', 'root', '', 'inventory');


 $sales_error = array();


 // For product

 if(isset($_POST['sale_admin']))
 {

  $sale_name         = mysqli_real_escape_string($connect, $_POST['sale_name']);
  $sale_password     = mysqli_real_escape_string($connect, $_POST['sale_password']);

  if(empty($sale_name) || empty($sale_password))
  {
    if($sale_name == "")
    {
      $sales_error[] = "Username is required";
    }

    if($sale_password == "")
    {
      $sales_error[] = "Password is required";
    }

  }

  else
  {
    $sql ="SELECT * FROM `admin` WHERE username = '$sale_name'";
    $result = $connect->query($sql)or die(mysqli_error());

    if($result->num_rows == 1)
    {
      $salepassword = md5($sale_password);
      $mainSql = "SELECT * FROM `admin` WHERE username = '$sale_name' AND password = '$salepassword'";
      $mainResult = $connect->query($mainSql)or die(mysqli_error());

      if($mainResult->num_rows == 1)
      {
        $value = $mainResult->fetch_assoc();

        $admin_id = $value['admin_id'];
        
        // set session

        $_SESSION['adminId'] = $admin_id;

        header('location:sales.php');

      } else
      {
        $sales_error[] = "Incorrect username/password combination";
      }

    }

    else
    {
      $sales_error[] = "username does not exists";
    }
  }

  }


  

?>
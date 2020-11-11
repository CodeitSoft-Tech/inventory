<?php

  
  $setDB = mysqli_connect('localhost', 'root', '', 'inventory');


 $miss = array();


 // For brand

 if(isset($_POST['log_pay_admin']))
 {

  $admin_pay_name = $_POST['admin_pay_name'];
  $admin_pay_password = $_POST['admin_pay_password'];

  if(empty($admin_pay_name) || empty($admin_pay_password))
  {
    if($admin_pay_name == "")
    {
      $miss[] = "Username is required";
    }

    if($admin_pay_password == "")
    {
      $miss[] = "Password is required";
    }

  }

  else
  {
    $query ="SELECT * FROM `admin` WHERE username = '$admin_pay_name'";
    $Result = $setDB->query($query);

    if($Result->num_rows == 1)
    {
      $Paypass = md5($admin_pay_password);
      $MainSql = "SELECT * FROM `admin` WHERE username = '$admin_pay_name' AND password = '$Paypass'";
      $MainResult = $setDB->query($MainSql);

      if($MainResult->num_rows == 1)
      {
        $value = $MainResult->fetch_assoc();

        $admin_id = $value['admin_id'];
        
        // set session

        $_SESSION['adminId'] = $admin_id;

        header('location:customer.php');

      } else
      {
        $miss[] = "Incorrect username/password combination";
      }

    }

    else
    {
      $miss[] = "username does not exists";
    }
  }

  }


  

?>
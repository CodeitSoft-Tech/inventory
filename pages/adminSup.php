<?php

  
  $SupDB = mysqli_connect('localhost', 'root', '', 'inventory');


  $handle_errors = array();


 // For brand

 if(isset($_POST['log_sup_admin']))
 {
  $admin_sup_name = $_POST['admin_sup_name'];
  $admin_sup_password = $_POST['admin_sup_password'];

  if(empty($admin_sup_name) || empty($admin_sup_password))
  {
    if($admin_sup_name == "")
    {
      $handle_errors[] = "Username is required";
    }

    if($admin_cat_password == "")
    {
      $handle_errors[] = "Password is required";
    }

  }

  else
  {
    $query ="SELECT * FROM `admin` WHERE username = '$admin_sup_name'";
    $Result = $SupDB->query($query);

    if($Result->num_rows == 1)
    {
      $Suppass = md5($admin_sup_password);
      $MainSql = "SELECT * FROM `admin` WHERE username = '$admin_sup_name' AND password = '$Suppass'";
      $MainResult = $SupDB->query($MainSql);

      if($MainResult->num_rows == 1)
      {
        $value = $MainResult->fetch_assoc();

        $admin_id = $value['admin_id'];
        
        // set session

        $_SESSION['adminId'] = $admin_id;

        header('location:supplier.php');

      } else
      {
        $wrong[] = "Incorrect username/password combination";
      }

    }

    else
    {
      $wrong[] = "username does not exists";
    }
  }

  }


  

?>
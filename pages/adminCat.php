<?php

  
  $conDB = mysqli_connect('localhost', 'root', '', 'inventory');


  $wrong = array();


 // For brand

 if(isset($_POST['log_cat_admin']))
 {
  $admin_cat_name = $_POST['admin_cat_name'];
  $admin_cat_password = $_POST['admin_cat_password'];

  if(empty($admin_cat_name) || empty($admin_cat_password))
  {
    if($admin_cat_name == "")
    {
      $wrong[] = "Username is required";
    }

    if($admin_cat_password == "")
    {
      $wrong[] = "Password is required";
    }

  }

  else
  {
    $query ="SELECT * FROM `admin` WHERE username = '$admin_cat_name'";
    $Result = $conDB->query($query);

    if($Result->num_rows == 1)
    {
      $Catpass = md5($admin_cat_password);
      $MainSql = "SELECT * FROM `admin` WHERE username = '$admin_cat_name' AND password = '$Catpass'";
      $MainResult = $conDB->query($MainSql);

      if($MainResult->num_rows == 1)
      {
        $value = $MainResult->fetch_assoc();

        $admin_id = $value['admin_id'];
        
        // set session

        $_SESSION['adminId'] = $admin_id;

        header('location:category.php');

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
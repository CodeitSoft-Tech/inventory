<?php

  
  $conn = mysqli_connect('localhost', 'root', '', 'inventory');


 $error = array();


 // For brand

 if(isset($_POST['log_brand_admin']))
 {
  $admin_name = $_POST['admin_name'];
  $admin_pword = $_POST['admin_password'];

  if(empty($admin_name) || empty($admin_pword))
  {
    if($admin_name == "")
    {
      $error[] = "Username is required";
    }

    if($admin_pword == "")
    {
      $error[] = "Password is required";
    }

  }

  else
  {
    $query ="SELECT * FROM `admin` WHERE username = '$admin_name'";
    $Result = $conn->query($query);

    if($Result->num_rows == 1)
    {
      $pass = md5($admin_pword);
      $MainSql = "SELECT * FROM `admin` WHERE username = '$admin_name' AND password = '$pass'";
      $MainResult = $conn->query($MainSql);

      if($MainResult->num_rows == 1)
      {
        $value = $MainResult->fetch_assoc();

        $admin_id = $value['admin_id'];
        
        // set session

        $_SESSION['adminId'] = $admin_id;

        header('location:brand.php');

      } else
      {
        $error[] = "Incorrect username/password combination";
      }

    }

    else
    {
      $error[] = "username does not exists";
    }
  }

  }


  

?>
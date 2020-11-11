<?php

  
  $con = mysqli_connect('localhost', 'root', '', 'inventory');


 $bug = array();


 // For record

 if(isset($_POST['log_record_admin']))
 {
  $ad_name = $_POST['ad_name'];
  $ad_password = $_POST['ad_password'];

  if(empty($ad_name) || empty($ad_password))
  {
    if($ad_name == "")
    {
      $bug[] = "Username is required";
    }

    if($ad_password == "")
    {
      $bug[] = "Password is required";
    }

  }

  else
  {
    $query ="SELECT * FROM `admin` WHERE username = '$ad_name'";
    $Result = $con->query($query);

    if($Result->num_rows == 1)
    {
      $adpass = md5($ad_password);
      $MainSql = "SELECT * FROM `admin` WHERE username = '$ad_name' AND password = '$adpass'";
      $MainResult = $con->query($MainSql);

      if($MainResult->num_rows == 1)
      {
        $value = $MainResult->fetch_assoc();

        $admin_id = $value['admin_id'];
        
        // set session

        $_SESSION['adminId'] = $admin_id;

        header('location:record.php');

      } else
      {
        $bug[] = "Incorrect username/password combination";
      }

    }

    else
    {
      $bug[] = "username does not exists";
    }
  }

  }


  

?>
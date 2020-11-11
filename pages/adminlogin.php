<?php

  
  $connect = mysqli_connect('localhost', 'root', '', 'inventory');


 $errors = array();


 // For product

 if(isset($_POST['admin_login']))
 {

  $admin_username = mysqli_real_escape_string($connect, $_POST['admin_username']);
  $admin_pass     = mysqli_real_escape_string($connect, $_POST['admin_pass']);

  if(empty($admin_username) || empty($admin_pass))
  {
    if($admin_username == "")
    {
      $errors[] = "Username is required";
    }

    if($admin_pass == "")
    {
      $errors[] = "Password is required";
    }

  }

  else
  {
    $sql ="SELECT * FROM `admin` WHERE username = '$admin_username'";
    $result = $connect->query($sql)or die(mysqli_error());

    if($result->num_rows == 1)
    {
      $password = md5($admin_pass);
      $mainSql = "SELECT * FROM `admin` WHERE username = '$admin_username' AND password = '$password'";
      $mainResult = $connect->query($mainSql)or die(mysqli_error());

      if($mainResult->num_rows == 1)
      {
        $value = $mainResult->fetch_assoc();

        $admin_id = $value['admin_id'];
        
        // set session

        $_SESSION['adminId'] = $admin_id;

        header('location:product.php');

      } else
      {
        $errors[] = "Incorrect username/password combination";
      }

    }

    else
    {
      $errors[] = "username does not exists";
    }
  }

  }


  

?>
<?php

  
  $connect = mysqli_connect('localhost', 'root', '', 'inventory');


 $invent_error = array();


 // For product

 if(isset($_POST['invent_admin']))
 {

  $invent_name         = mysqli_real_escape_string($connect, $_POST['invent_name']);
  $invent_password     = mysqli_real_escape_string($connect, $_POST['invent_password']);

  if(empty($invent_name) || empty($invent_password))
  {
    if($invent_name == "")
    {
      $invent_error[] = "Username is required";
    }

    if($invent_password == "")
    {
      $invent_error[] = "Password is required";
    }

  }

  else
  {
    $sql ="SELECT * FROM `admin` WHERE username = '$invent_name'";
    $result = $connect->query($sql)or die(mysqli_error());

    if($result->num_rows == 1)
    {
      $inventpassword = md5($invent_password);
      $mainSql = "SELECT * FROM `admin` WHERE username = '$invent_name' AND password = '$inventpassword'";
      $mainResult = $connect->query($mainSql)or die(mysqli_error());

      if($mainResult->num_rows == 1)
      {
        $value = $mainResult->fetch_assoc();

        $admin_id = $value['admin_id'];
        
        // set session

        $_SESSION['adminId'] = $admin_id;

        header('location:inventory.php');

      } else
      {
        $invent_error[] = "Incorrect username/password combination";
      }

    }

    else
    {
       $invent_error[] = "username does not exists";
    }
  }

  }


  

?>
<?php

  
  $connect = mysqli_connect('localhost', 'root', '', 'inventory');


 $rec_error = array();


 // For product

 if(isset($_POST['rec_admin']))
 {

  $rec_name         = mysqli_real_escape_string($connect, $_POST['rec_name']);
  $rec_password     = mysqli_real_escape_string($connect, $_POST['rec_password']);

  if(empty($rec_name) || empty($rec_password))
  {
    if($rec_name == "")
    {
      $rec_error[] = "Username is required";
    }

    if($rec_password == "")
    {
      $rec_error[] = "Password is required";
    }

  }

  else
  {
    $sql ="SELECT * FROM `admin` WHERE username = '$rec_name'";
    $result = $connect->query($sql)or die(mysqli_error());

    if($result->num_rows == 1)
    {
      $Recpassword = md5($rec_password);
      $mainSql = "SELECT * FROM `admin` WHERE username = '$rec_name' AND password = '$Recpassword'";
      $mainResult = $connect->query($mainSql)or die(mysqli_error());

      if($mainResult->num_rows == 1)
      {
        $value = $mainResult->fetch_assoc();

        $admin_id = $value['admin_id'];
        
        // set session

        $_SESSION['adminId'] = $admin_id;

        header('location:receivables.php');

      } else
      {
        $rec_error[] = "Incorrect username/password combination";
      }

    }

    else
    {
      $rec_error[] = "username does not exists";
    }
  }

  }


  

?>
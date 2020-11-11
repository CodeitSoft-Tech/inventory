<?php

  
  $connect = mysqli_connect('localhost', 'root', '', 'inventory');


 $income_error = array();


 // For product

 if(isset($_POST['income_admin']))
 {

  $income_name         = mysqli_real_escape_string($connect, $_POST['income_name']);
  $income_password     = mysqli_real_escape_string($connect, $_POST['income_password']);

  if(empty($income_name) || empty($income_password))
  {
    if($income_name == "")
    {
      $income_error[] = "Username is required";
    }

    if($income_password == "")
    {
      $income_error[] = "Password is required";
    }

  }

  else
  {
    $sql ="SELECT * FROM `admin` WHERE username = '$income_name'";
    $result = $connect->query($sql)or die(mysqli_error());

    if($result->num_rows == 1)
    {
      $Incomepassword = md5($income_password);
      $mainSql = "SELECT * FROM `admin` WHERE username = '$income_name' AND password = '$Incomepassword'";
      $mainResult = $connect->query($mainSql)or die(mysqli_error());

      if($mainResult->num_rows == 1)
      {
        $value = $mainResult->fetch_assoc();

        $admin_id = $value['admin_id'];
        
        // set session

        $_SESSION['adminId'] = $admin_id;

        header('location:income.php');

      } else
      {
        $income_error[] = "Incorrect username/password combination";
      }

    }

    else
    {
      $income_error[] = "username does not exists";
    }
  }

  }


  

?>
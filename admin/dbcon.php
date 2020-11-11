<?php
$con = mysqli_connect("localhost","root","","inventory");

// Check connection is working
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
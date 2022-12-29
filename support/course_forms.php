<?php
$con1 = mysqli_connect("localhost","root","","innovoskill");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$c_name = $_POST['c_name']; 
$cname_qry = "select c_short_form from courses where c_title='$c_name'";
$cname_res = mysqli_query($con1,$cname_qry);
$cname_out = mysqli_fetch_array($cname_res);
echo $cname_out[0];die;
?>
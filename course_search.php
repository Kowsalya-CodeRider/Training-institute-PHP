<?php
include('db_connect.php');
$course_search = $_POST['course_search'];
$sql = "select c_id,c_title,c_image from courses where c_title like '%$course_search%'";
$result = mysqli_query($con,$sql);
$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
print_r(json_encode($output));die;
?>
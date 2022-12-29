<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php 
include('db_connect.php');
session_start();
$u_email = $_SESSION["u_email"];
$u_sql = "select u_name from user where u_email='$u_email'";
$u_result = mysqli_query($con,$u_sql);
$u_out = mysqli_fetch_array($u_result);
$u_name = $u_out['u_name'];
?>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/inno_logo.png">
    <title>Innoskill Technologies </title>
    <!-- Custom CSS -->
    <link href="../innovoskill_admin/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../innovoskill_admin/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../innovoskill_admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<!-- Datatable css -->
	<!-- This page plugin CSS -->
    <link href="../innovoskill_admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Datatable css -->
    <!-- Custom CSS -->
    <link href="../innovoskill_admin/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

  
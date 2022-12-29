<?php 
include('admin_header.php');
include('db_connect.php');
if(isset($_POST['login_check']))
{
	$admin_email = $_POST['admin_email'];
	$admin_password = md5($_POST['admin_password']);
	$sql = "select admin_id from admin_login where admin_email='$admin_email' AND admin_password='$admin_password'";
	$result = mysqli_query($con,$sql);
	$output = mysqli_num_rows($result);	
	if($output>0)
	{
		header('Location: http://localhost/new/innovoskill_admin/courses.php');
	}
	else
	{
		$error = 'Invalid Login Credentials';
	}
}

?>


    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
   
   
        <div class="page-wrapper">
           
          <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
					<div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <center>
								<img src="../images/footer_logo.png">
								<h3 class="car">Admin Login</h3>
								<p style="color:red"><?php if (isset($error)){ echo $error; }?></p>
								</center>
								
								<form action="admin_login.php" method="POST">
								<div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Email</h4>                               
                                
                                    <div class="form-group">
                                        <input type="email" name="admin_email" class="form-control" placeholder="Enter Admin Email">
                                    </div>
								
								 <h4 class="card-title">Password</h4>
                                
                                    <div class="form-group">
                                        <input type="password" name="admin_password" class="form-control" id="passtext" placeholder="Enter Admin Password">
                                    </div>
                                <center><input type="submit" name="login_check" class="btn waves-effect waves-light btn-rounded btn-success" value="Login"></center>
                               
                            </div>
                        </div>
                    </div>
                    
                </div>
				</form>			
                            </div>
							
							
							
							
                        </div>
                    </div>
                </div>
                <!-- order table -->
                <!-- multi-column ordering -->
                 <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            
          
        </div>
       
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   <?php include('admin_footer.php');?>

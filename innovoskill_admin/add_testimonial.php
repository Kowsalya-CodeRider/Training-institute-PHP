<?php 
include('admin_header.php');
include('db_connect.php');
if(isset($_POST['add_testimonial']))
{
	
	$banner=$_FILES['t_image']['name']; 
	$expbanner=explode('.',$banner);
	$bannerexptype=$expbanner[1];
	date_default_timezone_set('Australia/Melbourne');
	$date = date('m/d/Yh:i:sa', time());
	$rand=rand(10000,99999);
	$encname=$date.$rand;
	$bannername=md5($encname).'.'.$bannerexptype;
	$bannerpath="uploads/testimonials/".$bannername;
	move_uploaded_file($_FILES["t_image"]["tmp_name"],$bannerpath);
	
	
	$t_name = $_POST['t_name'];
	$t_feedback = $_POST['t_feedback'];
	$t_company = $_POST['t_company'];
	$is_testimonial = $_POST['is_testimonial'];
	
	$sql = "insert into testimonials(t_name,t_image,t_feedback,t_company,is_testimonial) VALUES('$t_name','$bannerpath','$t_feedback','$t_company','$is_testimonial')";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		$data = 'Testimonial Added Successfully';
	}
	else
	{
		$data = 'Testimonial Data having an Error. pls try Again';
	}
}
?>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
		<?php include('header.php');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
		<?php include('admin_sidebar.php');?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
          <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<form action="add_testimonial.php" method="post" enctype="multipart/form-data">
                                <center><h3 class="car">Testimonial Details</h3>
								<p style="color:red"><?php if(isset($data)){echo $data;}?></p></center>
								
								<div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Name</h4>                               
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="t_name" placeholder="Name of Person">
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Image</h4>
                                
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="t_image" id="nametext" placeholder="Course Short Form">
                                        
                                    </div>
                                
                            </div>
							<div class="card-body">
                                <h4 class="card-title">Testimonials or Placement</h4>
                                
                                    <div class="form-group">
                                        <select class="form-control" name="is_testimonial">
										<option value="1">For Testimonial</option>
										<option value="0">For Placement</option>
										</select>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
					 <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Company Details</h4>
                                
                                    <div class="form-group">
                                       <textarea class="form-control" rows="7" name="t_company" placeholder="Company Details.."></textarea>
                                   
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Feedback</h4>
                                
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" name="t_feedback" placeholder="Feedback.."></textarea>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                  
                  
                   
                  
                </div>
							
								
							 <div class="card">
                            <div class="card-body">
                                <center><input type="submit" class="btn waves-effect waves-light btn-rounded btn-success" name="add_testimonial" value="Testimonial Submit"></center>
                               
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
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   <?php include('admin_footer.php');?>

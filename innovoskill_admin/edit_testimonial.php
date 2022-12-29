<?php 
include('admin_header.php');
include('db_connect.php');

$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url); 
parse_str($url_components['query'], $params); 

$t_sql = "select t_id,t_name,t_image,t_feedback,t_company,is_testimonial from testimonials where t_id='".$params['t_id']."'";
$t_result = mysqli_query($con,$t_sql);
$t_row = mysqli_fetch_array($t_result);
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
							<form action="../forms.php" method="post" enctype="multipart/form-data">
                                <center><h3 class="car">Testimonial Details</h3>
								<input type="hidden" class="form-control" name="t_id" value="<?php echo $t_row['t_id'];?>">
                                   
								
								<div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Name</h4>                               
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="t_name" value="<?php echo $t_row['t_name'];?>">
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Image</h4>
                                
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="t_image" id="nametext" placeholder="Image want to Update">
                                         <input type="hidden" name="t_image_1" id="nametext" value="<?php echo $t_row['t_image'];?>">
                                    
                                    </div>
                                
                            </div>
							<div class="card-body">
                                <h4 class="card-title">Testimonials or Placement</h4>
                                
                                    <div class="form-group">
                                        <select class="form-control" name="is_testimonial">
										<option value="1" <?=$t_row['is_testimonial']==1 ? 'selected' : '';?>>For Testimonial</option>
										<option value="0" <?=$t_row['is_testimonial']==0 ? 'selected' : '';?>>For Placement</option>
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
                                       <textarea class="form-control" rows="7" name="t_company"><?php echo $t_row['t_company'];?></textarea>
                                   
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Feedback</h4>
                                
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" name="t_feedback"><?php echo $t_row['t_feedback'];?></textarea>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                  
                  
                   
                  
                </div>
							
								
							 <div class="card">
                            <div class="card-body">
                                <center><input type="submit" class="btn waves-effect waves-light btn-rounded btn-success" name="edit_testimonial" value="Testimonial Update"></center>
                               
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

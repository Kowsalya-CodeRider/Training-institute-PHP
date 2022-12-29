<?php 
include('admin_header.php');
include('db_connect.php');
$b_id=$_GET['b_id'];
$sql = "select courses.c_title,blogs.b_id,blogs.b_title,blogs.b_description,blogs.b_learn,blogs.b_application, 
		blogs.b_company,blogs.b_role,blogs.b_who_learn from blogs 
		inner join courses on courses.c_id=blogs.b_course where blogs.b_id='$b_id'";
$result = mysqli_query($con,$sql);
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
							<?php while($row = mysqli_fetch_array($result)) { ?>
							<form enctype="multipart/form-data">
                                <center><h3 class="car">Blog Detail View</h3></center>
								
								<div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Blog Title</h4>                               
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="b_title" value="<?=$row['b_title'];?>" readonly>
                                    </div>									 
                            </div>
                        </div>
                    </div>
					  <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Blog Course</h4>                               
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="b_title" value="<?=$row['c_title'];?>" readonly>
                                    </div>									 
                            </div>
                        </div>
                    </div>
					<div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Blog Description</h4>                               
                                
                                    <div class="form-group">
                                       <textarea class="form-control" name="b_description" readonly><?=$row['b_description'];?></textarea>
                                    </div>									 
                            </div>
                        </div>
                    </div>                                                                            
                   <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">What You Will Learn?</h4>  								
                
							<div class="form-group">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> 
								<?php 
								$b_learn = explode(',',$row['b_learn']);
								for($i=0;$i<count($b_learn);$i++) 
								{ ?>
                                    <tr>                                           
										 <td><input type="text" name="b_learn[]" class="form-control name_list" value="<?=$b_learn[$i];?>" readonly></td>  
                                     </tr>
								<?php } ?>
                               </table>                               
                          </div>                     
						</div>                                            
                       </div>
                     </div>
                    </div> 
					 <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Application on <span id="c_head"></span></h4>  								
                
						 <div class="form-group">
						  <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> 
                                        <?php 
								$b_application = explode(',',$row['b_application']);
								for($i=0;$i<count($b_application);$i++) 
								{ ?>
                                    <tr>                                           
										 <td><center><img src="uploads/blog/<?=$b_application[$i];?>" height="200px" width="200px" class="img-responsive"></center></td>  
                                     </tr>
								<?php } ?>
								</table>                               
                          </div> 
                                    </div>	                                            
                       </div>
                     </div>
                    </div> 
					
					 <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Company using <span id="c_head_1"></span></h4>  								
                
						 <div class="form-group">
						  <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> 
                                        <?php 
								$b_company = explode(',',$row['b_company']);
								for($i=0;$i<count($b_company);$i++) 
								{ ?>
                                    <tr>                                           
										 <td><center><img src="uploads/blog/<?=$b_company[$i];?>" height="200px" width="200px" class="img-responsive"></center></td>  
                                     </tr>
								<?php } ?>
								</table>                               
                          </div> 
                                    </div>	                                            
                       </div>
                     </div>
                    </div>

				<div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Job Role</h4>  								
                
							<div class="form-group">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> 
								<?php 
								$b_role = explode(',',$row['b_role']);
								for($i=0;$i<count($b_role);$i++) 
								{ ?>
                                    <tr>                                           
										 <td><input type="text" name="b_learn[]" class="form-control name_list" value="<?=$b_role[$i];?>" readonly></td>  
                                     </tr>
								<?php } ?>
                               </table>                               
                          </div>                     
						</div>                                           
                       </div>
                     </div>
                    </div> 


					<div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Who can learn ?</h4>  								
                
							<div class="form-group">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> 
								<?php 
								$b_who_learn = explode(',',$row['b_who_learn']);
								for($i=0;$i<count($b_who_learn);$i++) 
								{ ?>
                                    <tr>                                           
										 <td><input type="text" name="b_learn[]" class="form-control name_list" value="<?=$b_who_learn[$i];?>" readonly></td>  
                                     </tr>
								<?php } ?>
                               </table>                               
                          </div>                     
						</div>                                             
                       </div>
                     </div>
                    </div> 




					
                </div>
						
							</form>		
							<?php } ?> 
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

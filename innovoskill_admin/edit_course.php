<?php 
include('admin_header.php');
include('db_connect.php');
$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url); 
  
// Use parse_str() function to parse the 
// string passed via URL 
parse_str($url_components['query'], $params); 

$c_sql = "select c_id,c_title,c_duration,c_short_form,c_description,c_image,c_content,is_kids from courses where c_id='".$params['c_id']."'";
$c_result = mysqli_query($con,$c_sql);
$c_row = mysqli_fetch_array($c_result);


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
                                <center><h3 class="car">Course Details - Update</h3>
								<p style="color:red"><?php if(isset($data)){echo $data;}?></p></center>
								<input type="hidden" class="form-control" name="c_id" value="<?php echo $c_row['c_id'];?>">
                                    
								<div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>                               
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_title" value="<?php echo $c_row['c_title'];?>">
                                    </div>
                               
                            </div>
                        </div>
                    </div>
					 <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">is this course for kids ?</h4>                               
                                
                                    <div class="form-group">
                                        <select class="form-control" name="c_kids">										
										<option value="1" <?php if($c_row['is_kids']==1){ echo 'selected';} ?>>Kids</option>
										<option value="0" <?php if($c_row['is_kids']==0){ echo 'selected';} ?>>Student</option>
										<option value="2" <?php if($c_row['is_kids']==2){ echo 'selected';} ?>>Diploma/PG</option>
										</select>
                                    </div>									 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Short Form (SH)</h4>
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_short_form" id="nametext" value="<?php echo $c_row['c_short_form'];?>">
                                        
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Duration</h4>
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_duration" id="passtext" value="<?php echo $c_row['c_duration'];?>">
                                    </div>
                               
                            </div>
                        </div>
                    </div>
					 <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Course Image</h4>
                                
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="c_image" id="nametext" placeholder="Course Image">
                                        <input type="hidden" name="c_image_1" id="nametext" value="<?php echo $c_row['c_image'];?>">
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Course Description</h4>
                                
                                    <div class="form-group">
                                        <textarea class="form-control" name="c_description"><?php echo $c_row['c_description'];?></textarea>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                  <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Course Content</h4>  
								
							<?php 
							$c_c1 = explode(',',$c_row['c_content']);
							for($i=0;$i<count($c_c1);$i++)
							{			
							?>
							<div class="form-group">
                                        <input type="text" class="form-control" name="c_content[]" id="passtext" value="<?php echo $c_c1[$i];?>">
                                    </div>
							<?php } ?>
							<div class="form-group" id="add_more_div">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="c_content[]" placeholder="Enter Course Content Titles" class="form-control name_list" /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
                              
                          </div>  
                    
                </div>  
           
                               
                            </div>
                        </div>
                    </div>
                   
                  
                </div>
							
								
							 <div class="card">
                            <div class="card-body">
                                <center><input type="submit" class="btn waves-effect waves-light btn-rounded btn-success" name="edit_course" value="Course Update"></center>
                               
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
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="c_content[]" placeholder="Enter Course Content Titles" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });
	 $('#add_content').click(function(){  
           i++;  
           $('#add_more_div').append('<tr id="row'+i+'"><td><input type="text" name="c_content[]" placeholder="Enter Course Content Titles" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      }); 
      
 });  
 </script>
   
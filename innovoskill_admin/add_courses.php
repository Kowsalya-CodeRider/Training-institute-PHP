<?php 
include('admin_header.php');
include('db_connect.php');
if(isset($_POST['add_course']))
{
	
	$banner=$_FILES['c_image']['name']; 
	$expbanner=explode('.',$banner);
	$bannerexptype=$expbanner[1];
	date_default_timezone_set('Australia/Melbourne');
	$date = date('m/d/Yh:i:sa', time());
	$rand=rand(10000,99999);
	$encname=$date.$rand;
	$bannername=md5($encname).'.'.$bannerexptype;
	$bannerpath="uploads/training/".$bannername;
	move_uploaded_file($_FILES["c_image"]["tmp_name"],$bannerpath);
	
	
	$c_title = $_POST['c_title'];
	$c_short_form = $_POST['c_short_form'];
	$c_duration = $_POST['c_duration'];
	$c_image = $bannerpath;
	$c_description = $_POST['c_description'];
	$c_kids = $_POST['c_kids'];
	$c_c1 = $_POST['c_content'];
	$c_content = implode(',',array_filter($c_c1));
	
	$sql = "insert into courses(c_title,c_short_form,c_duration,c_image,c_description,c_content,is_kids) VALUES('$c_title','$c_short_form','$c_duration','$c_image','$c_description','$c_content','$c_kids')";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		$data = 'Course Added Successfully';
	}
	else
	{
		$data = 'Course Data having an Error. pls try Again';
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
							<form action="add_courses.php" method="post" enctype="multipart/form-data">
                                <center><h3 class="car">Course Details</h3>
								<p style="color:red"><?php if(isset($data)){echo $data;}?></p></center>
								
								<div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>                               
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_title" placeholder="Course Title">
                                    </div>									 
                            </div>
                        </div>
                    </div>
					  <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">is this course for : kids | Student | Diploma/PG</h4>                               
                                
                                    <div class="form-group">
                                        <select class="form-control" name="c_kids">
										<option value="1">Kids</option>
										<option value="0" selected>Student</option>
										<option value="2" selected>Diploma/PG</option>
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
                                        <input type="text" class="form-control" name="c_short_form" id="nametext" placeholder="Course Short Form">
                                        
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Duration</h4>
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_duration" id="passtext" placeholder="Course Duration">
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
                                        
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Course Description</h4>
                                
                                    <div class="form-group">
                                        <textarea class="form-control" name="c_description"  placeholder="Course Description"></textarea>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                   <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Course Content</h4>  								
                
							<div class="form-group">  
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
                                <center><input type="submit" class="btn waves-effect waves-light btn-rounded btn-success" name="add_course" value="Course Submit"></center>
                               
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
      
 });  
 </script>
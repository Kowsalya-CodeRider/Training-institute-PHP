<?php 
include('admin_header.php');
include('db_connect.php');
$co_sql = "select c_title,c_id from courses";
$co_qry = mysqli_query($con,$co_sql);
$b_id=$_GET['b_id'];
$sql = "select blogs.b_course,blogs.b_id,blogs.b_title,blogs.b_description,blogs.b_learn,blogs.b_application, 
		blogs.b_company,blogs.b_role,blogs.b_who_learn from blogs 
		where blogs.b_id='$b_id'";
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
							<form method="post" action="../forms.php" enctype="multipart/form-data">
                                <center><h3 class="car">Update - Blog Details</h3></center>
								<p style="color:red"><?php if(isset($data)){echo $data;}?></p></center>
								<div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Blog Title</h4>                               
									<input type="hidden" name="b_id" value="<?=$row['b_id'];?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="b_title" value="<?=$row['b_title'];?>">
                                    </div>									 
                            </div>
                        </div>
                    </div>
					  <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Blog Course</h4>                               
									<div class="form-group">
                                        <select class="form-control" name="b_course" id="blog_course_title" onchange="blog_course()">										
										<?php while($co_res = mysqli_fetch_array($co_qry)){?>
										<option value="<?=$co_res['c_id'];?>" <?php if($co_res['c_id']==$row['b_course']){ echo 'selected';} ?>><?=$co_res['c_title'];?></option>
										<?php } ?>
										</select>
                                    </div>	
                                    							 
                            </div>
                        </div>
                    </div>
					<div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Blog Description</h4>                               
                                
                                    <div class="form-group">
                                       <textarea class="form-control" name="b_description"><?=$row['b_description'];?></textarea>
                                    </div>									 
                            </div>
                        </div>
                    </div>                                                                            
                   <div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">What You Will Learn?</h4>  								                							             
							<?php 
								$b_learn = explode(',',$row['b_learn']);
								for($i=0;$i<count($b_learn);$i++) 
								{ ?>								
                                   <div class="form-group">  
								   <input type="text" name="b_learn[]" class="form-control name_list" value="<?=$b_learn[$i];?>">                                 
									</div>
								<?php } ?>
							  
								 <div class="table-responsive">
                               <table class="table table-bordered" id="dynamic_field"> 					
								<tr>  
                                         <td><input type="text" name="b_learn[]" placeholder="Enter what you will learn segment data" class="form-control name_list" /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>                               
                                             
						</div>                                            
                       </div>
                     </div>
                    </div> 


				<div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Job Role</h4>  								
							<?php 
								$b_role = explode(',',$row['b_role']);
								for($i=0;$i<count($b_role);$i++) 
								{ ?>
									<div class="form-group"> 
								 <input type="text" name="b_role[]" class="form-control name_list" value="<?=$b_role[$i];?>">                                      
									</div> 
							<?php } ?>
                          <div class="table-responsive">  
                                <table class="table table-bordered" id="dynamic_field_app">  
                                    <tr>  
                                         <td><input type="text" name="b_role[]" placeholder="Job Roles" class="form-control name_list" /></td>  
                                         <td><button type="button" name="add_app" id="add_app" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>                                                                           
						</div>                                           
                       </div>
                     </div>
                    </div> 


					<div class="col-sm-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Who can learn ?</h4>  								
						<?php 
								$b_who_learn = explode(',',$row['b_who_learn']);
								for($i=0;$i<count($b_who_learn);$i++) 
								{ ?>
							<div class="form-group">  
							<input type="text" name="b_who_learn[]" class="form-control name_list" value="<?=$b_who_learn[$i];?>">
							</div> 
						<?php } ?>
                          <div class="table-responsive">  
                              <table class="table table-bordered" id="dynamic_field_who">  
                                    <tr>  
                                         <td><input type="text" name="b_who_learn[]" placeholder="Who can learn" class="form-control name_list" /></td>  
                                         <td><button type="button" name="add_who" id="add_who" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>           
						</div>                                             
                       </div>
                     </div>
                    </div> 




					
                </div>
						
						
						 <div class="card">
                            <div class="card-body">
                                <center><input type="submit" class="btn waves-effect waves-light btn-rounded btn-success" name="edit_blog" value="Blog Update"></center>
                               
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
<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="b_learn[]" placeholder="Enter what you will learn segment data" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
	  
	  var j=1;  
      $('#add_app').click(function(){  
           j++;  
           $('#dynamic_field_app').append('<tr id="row_app'+j+'"><td><input type="text" name="b_role[]" placeholder="Job Roles" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+j+'" class="btn btn-danger btn_remove_app">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove_app', function(){  
           var button_id = $(this).attr("id");   
           $('#row_app'+button_id+'').remove();  
      });
	  
	  var k=1;  
      $('#add_who').click(function(){  
           k++;  
           $('#dynamic_field_who').append('<tr id="row_who'+k+'"><td><input type="text" name="b_who_learn[]" placeholder="Who can learn" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+k+'" class="btn btn-danger btn_remove_who">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove_who', function(){  
           var button_id = $(this).attr("id");   
           $('#row_who'+button_id+'').remove();  
      });
      
 }); 

function blog_course()
{
	var blog_course_title = $("#blog_course_title option:selected").html();
	$('#c_head').html(blog_course_title);
	$('#c_head_1').html(blog_course_title);
} 
 </script>
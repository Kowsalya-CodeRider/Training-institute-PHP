<?php 
include('admin_header.php');
include('db_connect.php');

$sql = "select c_id,c_title,c_duration,c_image,c_description,c_content,is_kids from courses";
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
                                <h4 class="card-title">Courses List</h4>
								<div align="right">
								<a href="add_courses.php" class="btn waves-effect waves-light btn-rounded btn-primary">Add Courses</a>
								</div>
                               <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>C.No</th>
												<th>Kids/Students</th>
                                                <th>Title</th>
                                                <th>Duration</th>
												<th>Image</th>
												<th>Description</th>
												<th>Content</th>
												<th>Edit</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
										<tbody>
										<?php
										$i = 1;
										 while($row = mysqli_fetch_array($result)){
											$c_content = explode(',',$row['c_content']);
											$kids = $row['is_kids'];
											if($kids==1)
											{
												$kid = "<button class='btn btn-dark btn-rounded'>Kids</button>";
											}
											if($kids==2)
											{
												$kid = "<button class='btn btn-warning btn-rounded'>Diploma/Pg</button>";
											}
											else
											{
												$kid = "<button class='btn btn-light btn-rounded'>Student</button>";
											}
											
											echo "<tr>";
												echo "<td>" . $i . "</td>";	
												echo "<td>" . $kid . "</td>";	
												echo "<td>" . $row['c_title'] . "</td>";
												echo "<td>" . $row['c_duration'] . "</td>";	
												echo "<td><img src='" . $row['c_image'] . "' width='100px'></td>";	
												echo "<td>" . $row['c_description'] . "</td>";	
												echo "<td>" ;
												for($j=0;$j<count($c_content);$j++)
												{
													$c_c1 = $c_content[$j].'<br>';
													echo $c_c1;
												}
												echo  "</td>";	
												echo "<td><a href='edit_course.php?c_id=".$row['c_id']."' class='btn btn-warning btn-rounded'><i class='fas fa-check'></i> Update</s></td>";												
												echo "<td><button onclick='delete_course(".$row['c_id'].")' class='btn btn-danger btn-rounded'><i class='fas fa-trash'></i> Delete</button></td>";	
											echo "</tr>";
										$i++;
										}
										?>
										</tbody>
                                        <tfoot>
                                            <tr>
                                             <th>C.No</th>
											 <th>Kids/Students</th>
                                                <th>Title</th>
                                                <th>Duration</th>
												<th>Image</th>
												<th>Description</th>
												<th>Content</th>
												<th>Edit</th>
												<th>Delete</th>
												
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
 function delete_course(c_id){
	
	 $.ajax({
            type: 'post',
            url: '../forms.php',
            data: {c_id:c_id,delete_course:'delete'},
            success: function (result) {
			  alert(result);
			  location.reload();
            }
          });

}

</script>
<?php 
include('admin_header.php');
include('db_connect.php');

$sql = "select t_id,t_name,t_image,t_feedback,t_company from testimonials";
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
                                <h4 class="card-title">Testimonial List</h4>
								<div align="right">
								<a href="add_testimonial.php" class="btn waves-effect waves-light btn-rounded btn-primary">Add Testimonial</a>
								</div>
                               <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>C.No</th>
                                                <th>Name</th>
                                                <th>Image</th>
												<th>Company Details</th>
												<th>Feedback</th>
												<th>Edit</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
										<tbody>
										<?php
										$i = 1;
										 while($row = mysqli_fetch_array($result)){
											
											echo "<tr>";
												echo "<td>" . $i . "</td>";												
												echo "<td>" . $row['t_name'] . "</td>";
												if(empty($row['t_image']))
												{
													echo "<td><img src='assets/images/inno_logo.png' width='100px'></td>";
												}
												else
												{
													echo "<td><img src='" . $row['t_image'] . "' width='100px'></td>";
												}
												echo "<td>" . $row['t_company'] . "</td>";	
												echo "<td>" . $row['t_feedback'] . "</td>";	
												echo "<td><a href='edit_testimonial.php?t_id=".$row['t_id']."' class='btn btn-warning btn-rounded'><i class='fas fa-check'></i> Update</s></td>";												
												
												echo "<td><button onclick='delete_course(".$row['t_id'].")' class='btn btn-danger btn-rounded'><i class='fas fa-trash'></i> Delete</button></td>";	
											
												echo "</tr>";
										$i++;
										}
										?>
										</tbody>
                                        <tfoot>
                                            <tr>
                                             <th>C.No</th>
                                                <th>Name</th>
                                                <th>Image</th>
												<th>Company Details</th>
												<th>Feedback</th>
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
 function delete_course(t_id){
	
	 $.ajax({
            type: 'post',
            url: '../forms.php',
            data: {t_id:t_id,delete_testimonial:'delete'},
            success: function (result) {
			  alert(result);
			  location.reload();
            }
          });

}

</script>
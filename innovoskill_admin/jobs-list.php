<?php 
include('admin_header.php');
include('db_connect.php');

$jsql = "select j_id,j_title,j_location,j_date_posted,j_salary 
		from jobs";
$jresult = mysqli_query($con,$jsql);

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
                                <h4 class="card-title">Jobs List</h4>
								<div align="right">
								<a href="add_job.php"><button class="btn waves-effect waves-light btn-rounded btn-primary">Add Job</button></a>
								</div>
                               <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Salary</th>
                                                <th>Location</th>
												<th>Date Posted</th>
												<th>Edit</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
										<tbody>
										<?php
										 while($row = mysqli_fetch_array($jresult)){
											echo "<tr>";
												echo "<td>" . $row['j_title'] . "</td>";
												echo "<td>" . $row['j_salary'] . "</td>";
												echo "<td>" . $row['j_location'] . "</td>";
												echo "<td>" . $row['j_date_posted'] . "</td>";
												echo "<td><a href='edit_job.php?j_id=".$row['j_id']."' class='btn btn-warning btn-rounded'><i class='fas fa-check'></i> Update</s></td>";												
												echo "<td><button onclick='delete_job(".$row['j_id'].")' class='btn btn-danger btn-rounded'><i class='fas fa-trash'></i> Delete</button></td>";	
										
											echo "</tr>";
										}
										?>
										</tbody>
                                        <tfoot>
                                            <tr>
                                               <th>Title</th>
                                                <th>Salary</th>
                                                <th>Location</th>
												<th>Date Posted</th>
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
 function delete_job(j_id){

	 $.ajax({
            type: 'post',
            url: '../forms.php',
            data: {j_id:j_id,delete_job:'delete'},
            success: function (result) {
			  alert(result);
			  location.reload();
            }
          });

}

</script>
<?php 
include('admin_header.php');
include('db_connect.php');

$sql = "select ca_id,ca_name,ca_place,ca_mobile,ca_email,ca_college,ca_message from college_activity";
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
                                <h4 class="card-title">College Activity Get in Touch List</h4>
								
                               <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>R.No</th>
                                                <th>Name</th> 												
												<th>Email</th>
												<th>Mobile</th>													
												<th>College</th>
												<th>Place</th>
												<th>Message</th>
                                            </tr>
                                        </thead>
										<tbody>
										<?php							
										$i = 1;
										 while($row = mysqli_fetch_array($result)){
											echo "<tr>";
												echo "<td>" . $i . "</td>";
												echo "<td>" . $row['ca_name'] . "</td>";
												echo "<td>" . $row['ca_email'] . "</td>";
												echo "<td>" . $row['ca_mobile'] . "</td>";												
												echo "<td>" . $row['ca_college'] . "</td>";
												echo "<td>" . $row['ca_place'] . "</td>";
												echo "<td>" . $row['ca_message'] . "</td>";													
											echo "</tr>";
										$i++;
										}
										?>
										</tbody>
                                        <tfoot>
                                            <tr>
                                                <th>R.No</th>
                                                <th>Name</th> 												
												<th>Email</th>
												<th>Mobile</th>													
												<th>College</th>
												<th>Place</th>
												<th>Message</th>
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
                All Rights Reserved by Innovaskill Technologies. Designed and Developed by <a
                    href="https://www.innovaskill.in/">Innovaskill</a>.
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

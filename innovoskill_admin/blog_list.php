<?php 
include('admin_header.php');
include('db_connect.php');

$sql = "select courses.c_title,blogs.b_id,blogs.b_title from blogs inner join courses on courses.c_id=blogs.b_course";
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
                                <h4 class="card-title">Blog List</h4>
								<div align="right">
								<a href="add_blog.php" class="btn waves-effect waves-light btn-rounded btn-primary">Add Blog</a>
								</div>
                               <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>C.No</th>
												<th>Blog Title</th>
                                                <th>Blog Course</th>                                              
												<th>Detail View</th>
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
												echo "<td>" . $row['b_title'] . "</td>";	
												echo "<td>" . $row['c_title'] . "</td>";
												echo "<td><a href='view_blog.php?b_id=".$row['b_id']."' class='btn btn-success btn-rounded'><i class='fas fa-check'></i> View</s></td>";																								
												echo "<td><a href='edit_blog.php?b_id=".$row['b_id']."' class='btn btn-warning btn-rounded'><i class='fas fa-check'></i> Update</s></td>";												
												echo "<td><button onclick='delete_blog(".$row['b_id'].")' class='btn btn-danger btn-rounded'><i class='fas fa-trash'></i> Delete</button></td>";	
											echo "</tr>";
										$i++;
										}
										?>
										</tbody>
                                        <tfoot>
                                            <tr>
                                              <th>C.No</th>
												<th>Blog Title</th>
                                                <th>Blog Course</th>                                              
												<th>Detail View</th>
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
 function delete_blog(b_id){
	
	 $.ajax({
            type: 'post',
            url: '../forms.php',
            data: {b_id:b_id,delete_blog:'delete'},
            success: function (result) {
			  alert(result);
			  location.reload();
            }
          });

}

</script>
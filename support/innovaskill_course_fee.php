<?php
$con1 = mysqli_connect("localhost","root","","innovoskill");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
include('db_connect.php');
include('main_head.php');
session_start();
$clist = "select c_id,c_title,c_short_form,c_duration from courses";
$cqry = mysqli_query($con1,$clist);
$partners_id = $_SESSION['p_id'];
$psql = "select p_permitted_course from partners where p_id='$partners_id'";
$pqry = mysqli_query($con,$psql);
$presult = mysqli_fetch_array($pqry);
$permitted_courses_list = $presult['p_permitted_course'];
?>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
	<?php include('topbar.php');?>
  <section>
      <?php include('leftsidebar.php');?>
       
    </section>
	<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">               
                <div class="col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>                              
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">INNOVASKILL COURSES </a>
                                                        </h4>                                                      
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                     <div class="body table-responsive">
														<table class="table">                              
															<thead>
															<th>C.No</th>
															<th>COURSE NAME</th>
															<th>COURSE CODE</th>
															<th>COURSE DURATION</th>
															<th>COURSE FEE</th>
															<th>STATUS</th>
															<th>LAUNCHED COURSE</th>
															</thead>
															<tbody> 
																<?php
																while($row = mysqli_fetch_array($cqry)){
															?>
															<tr>
																<td><?=$row['c_id'];?></td>
																<td><?=$row['c_title'];?></td>
																<td><?=$row['c_short_form'];?></td>
																<td><?=$row['c_duration'];?></td>
																<td>Update Soon..</td>
																<td>
																	<?php
																	$clist = explode(',',$permitted_courses_list);
																	if(in_array($row['c_id'],$clist))
																	{
																	?>
																	<div class="switch">
																	<label>
																	<input type="checkbox" checked disabled>
																	<span class="lever"></span>
																	</label>
																	</div>
																	<?php
																	}
																	else
																	{
																	?>
																	<div class="switch">
																	<label>
																	<input type="checkbox" disabled>
																	<span class="lever"></span>
																	</label>
																	</div>
																	<?php } ?>
																</td>
																<td>Update Soon..</td>
																</tr>
															<?php
																}
																?>																																
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                  
										
                                    </div>
                                 
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>

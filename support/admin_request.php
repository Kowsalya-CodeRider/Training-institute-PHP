<?php
$con = mysqli_connect("localhost","root","","innovoskill");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
 
include('admin_head.php');

$clist = "select c_id,c_title,c_short_form,c_duration from courses";
$cqry = mysqli_query($con,$clist);

$con1 = mysqli_connect("localhost","root","","innovaskill_partners");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$hlist = "select h_id, h_title from hardware";
$hqry = mysqli_query($con1,$hlist);

$elist = "select e_id, e_title from events";
$eqry = mysqli_query($con1,$elist);

$relist = "select r_id,r_type_id,r_type,r_status from request";
$reqry = mysqli_query($con1,$relist);
$reqry1 = mysqli_query($con1,$relist);

session_start();
?>

<?php include('main_head.php');?>

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
      <?php include('admin_sidebar.php');?>
       
    </section> <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">               
                <div class="col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>
								<input type="hidden" id="p_id" value="<?=$_SESSION['p_id'];?>">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Request List</a></li>
							    </ul>

                                <div class="tab-content">
									 <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="post">
                                                     <div class="body table-responsive">
														<table class="table">                              
															<thead>
															<th>R.No</th>
															<th>Request Type</th>
															<th>Request</th>
															<th>Request Status</th>	
															<th>Request Permission</th>
															</thead>
															<tbody>                                                               
																<?php
														while($rerow = mysqli_fetch_array($reqry)){
															$r_status = $rerow['r_status'];
															$r_type   = $rerow['r_type'];
															$r_type_id = $rerow['r_type_id'];
															if($r_type==1)
															{
																$request_type = '<span class="btn bg-blue waves-effect">COURSE</span>';
																$creq = "select c_title from courses where c_id='$r_type_id'";
																$creqqry = mysqli_query($con,$creq);
																$creqres = mysqli_fetch_row($creqqry);
																$request = $creqres[0];
															}
															else if($r_type==2)
															{
																$request_type = '<span class="btn bg-teal waves-effect">HARDWARE</span>';
																$creq = "select h_title from hardware where h_id='$r_type_id'";
																$creqqry = mysqli_query($con1,$creq);
																$creqres = mysqli_fetch_row($creqqry);
																$request = $creqres[0];
															}
															else
															{
																$request_type = '<span class="btn bg-pink waves-effect">EVENTS</span>';
																$creq = "select e_title from events where e_id='$r_type_id'";
																$creqqry = mysqli_query($con1,$creq);
																$creqres = mysqli_fetch_row($creqqry);
																$request = $creqres[0];
															}
															if($r_status==0)
															{
																$request_status = 'Request Pending';
																$r_class = 'btn bg-amber waves-effect';
															}
															else if($r_status==1)
															{
																$request_status = 'Request Accepted';
																$r_class = 'btn bg-green waves-effect';
															}
															else 
															{
																$request_status = 'Request Rejected';
																$r_class = 'btn bg-brown waves-effect';
															}
														?> 
														<tr>
															<td scope="row"><?=$rerow['r_id'];?></td>
															<td><?=$request_type?></td>	
															<td><?=$request;?></td>
															<td><button class="<?=$r_class;?>"><?=$request_status;?></button></td>																
															<td>
															<select name="request_permission" id="request_permission" onchange="return request_permission(this.value,<?=$rerow["r_id"];?>);" class="form-control">
															<option value="">Choose Permission Status</option>
															<option value="0">Pending</option>
															<option value="1">Accepted</option>
															<option value="2">Rejected</option>
															</select>
															</td>																
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
<script>
function request_permission(r_type_id,r_id)
{
	 if(r_type_id!='' && r_id!='')
	 {
			 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {request_permission:'request_permission',r_type_id:r_type_id,r_id:r_id},
			success: function (result) { 
				if(result==1)
				{
				  alert('Request Permission Status - CHANGED');					  
				  location.reload();
				}
				else
				{
				 alert('Sorry! Your Permission Status - NOT CHANGED');				 
				}	
			}
		  });			 
	 }
	 else
	 {
		 alert('Please! Choose Your Request Permission Status');
	 }
	 return false;
}


</script>
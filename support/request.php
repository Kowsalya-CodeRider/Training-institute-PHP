<?php
$con = mysqli_connect("localhost","root","","innovoskill");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
 
include('main_head.php');
session_start();
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
$partner_id = $_SESSION['p_id'];
$relist = "select r_id,r_type_id,r_type,r_status from request where p_id='$partner_id'";
$reqry = mysqli_query($con1,$relist);

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
      <?php include('leftsidebar.php');?>
       
    </section> <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">               
                <div class="col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>
								<input type="hidden" id="p_id" value="<?=$_SESSION['p_id'];?>">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Request Status</a></li>
                                    <li role="presentation"><a href="#training_request" aria-controls="settings" role="tab" data-toggle="tab">Training Request</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Event Request</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Hardware Request</a></li>
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
															</thead>
															<tbody>                                                               
																<?php
														while($rerow = mysqli_fetch_array($reqry)){
															$r_status = $rerow['r_status'];
															$r_type   = $rerow['r_type'];
															$r_type_id = $rerow['r_type_id'];
															if($r_type==1)
															{
																$request_type = 'Course Request';
																$creq = "select c_title from courses where c_id='$r_type_id'";
																$creqqry = mysqli_query($con,$creq);
																$creqres = mysqli_fetch_row($creqqry);
																$request = $creqres[0];
															}
															else if($r_type==2)
															{
																$request_type = 'Hardware Request';
																$creq = "select h_title from hardware where h_id='$r_type_id'";
																$creqqry = mysqli_query($con1,$creq);
																$creqres = mysqli_fetch_row($creqqry);
																$request = $creqres[0];
															}
															else
															{
																$request_type = 'Events Request';
																$creq = "select e_title from events where e_id='$r_type_id'";
																$creqqry = mysqli_query($con1,$creq);
																$creqres = mysqli_fetch_row($creqqry);
																$request = $creqres[0];
															}
															if($r_status==0)
															{
																$request_status = 'Request Pending';
																$r_class = 'btn btn-warning';
															}
															else if($r_status==1)
															{
																$request_status = 'Request Accepted';
																$r_class = 'btn btn-success';
															}
															else 
															{
																$request_status = 'Request Rejected';
																$r_class = 'btn btn-danger';
															}
														?> 
														<tr>
																	<td scope="row"><?=$rerow['r_id'];?></td>
																	<td><?=$request_type?></td>	
																	<td><?=$request;?></td>
																	<td><button class="<?=$r_class;?>"><?=$request_status;?></button></td>
																	</tr>
														<?php
														}
														?>
																
																
															</tbody>
														</table>
													</div>
                                                </div>

                                       
										
										
										
										
                                    </div>
								   <div role="tabpanel" class="tab-pane fade in " id="training_request">
                                        <form class="form-horizontal">                                            
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">CHOOSE YOUR TECHNOLOGY</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
													<div class="t_msg" align="center"></div>
													<select class="form-control" name="c_id" id="c_id">
														<option value="">Choose Your Technology</option>
                                                       <?php
														while($row = mysqli_fetch_array($cqry)){
														?> 
														<option value="<?=$row['c_id'];?>"><?=$row['c_title'];?></option>
														<?php
														}
														?>
														</select>
                                                    </div>
                                                </div>
                                            </div>                                           

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button onclick="return training_request()" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>

                                       
										
										
										
										
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                       <form class="form-horizontal">                                            
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">CHOOSE YOUR EVENT</label>
                                                <div class="col-sm-9">
													<div class="e_msg" align="center"></div>
                                                    <div class="form-line">
                                                        <select class="form-control" id="e_id">
														<option>Choose Your Event</option>
                                                       <?php
														while($etab = mysqli_fetch_array($eqry)){
														?> 
														<option value="<?=$etab['e_id'];?>"><?=$etab['e_title'];?></option>
														<?php
														}
														?>
														</select> </div>
                                                </div>
                                            </div>                                           

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button onclick="return event_request();" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal">                                            
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">CHOOSE YOUR REQUIREMENTS</label>
                                                <div class="col-sm-9">
                                                    <div class="h_msg" align="center"></div>
													<div class="form-line">
                                                        <select class="form-control" id="h_id">
														<option>Choose Your Requirements</option>
                                                       <?php
														while($col = mysqli_fetch_array($hqry)){
														?> 
														<option value="<?=$col['h_id'];?>"><?=$col['h_title'];?></option>
														<?php
														}
														?>
														</select> </div>
                                                </div>
                                            </div>                                           

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button onclick="return harware_request();" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
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
function training_request()
{
	 var c_id 			= $('#c_id').val();	
	 var p_id 			= $('#p_id').val();
	 if(c_id!='')
	 {
			 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {training_request:'training_request',c_id:c_id,p_id:p_id},
			success: function (result) {  alert(result);
				if(result==1)
				{
				  $('.t_msg').addClass('text-success font-weight-bold');
				  $('.t_msg').html('Your Training Request Addedd Successfully!');					  
				  location.reload();
				}
				else
				{
				  $('.t_msg').addClass('text-danger font-weight-bold');
				  $('.t_msg').html('Sorry! Your Data Having an Error');					 
				}	
			}
		  });			 
	 }
	 else
	 {
		 alert('Please! Choose Your Technology');
	 }
	 return false;
}

function harware_request()
{
	 var h_id 			= $('#h_id').val();	
	 var p_id 			= $('#p_id').val();
	 if(h_id!='')
	 {
			 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {hardware_request:'hardware_request',h_id:h_id,p_id:p_id},
			success: function (result) { 
				if(result==1)
				{
				  $('.h_msg').addClass('text-success font-weight-bold');
				  $('.h_msg').html('Your Hardware Request Addedd Successfully!');					  
				  location.reload();
				}
				else
				{
				  $('.h_msg').addClass('text-danger font-weight-bold');
				  $('.h_msg').html('Sorry! Your Data Having an Error');					 
				}	
			}
		  });			 
	 }
	 else
	 {
		 alert('Please! Choose Your Hardware Type');
	 }
	 return false;
}

function event_request()
{
	 var e_id 			= $('#e_id').val();	
	 var p_id 			= $('#p_id').val();
	 if(e_id!='')
	 {
			 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {event_request:'event_request',e_id:e_id,p_id:p_id},
			success: function (result) { 
				if(result==1)
				{
				  $('.e_msg').addClass('text-success font-weight-bold');
				  $('.e_msg').html('Your Event Request Addedd Successfully!');					  
				  location.reload();
				}
				else
				{
				  $('.e_msg').addClass('text-danger font-weight-bold');
				  $('.e_msg').html('Sorry! Your Data Having an Error');					 
				}	
			}
		  });			 
	 }
	 else
	 {
		 alert('Please! Choose Your Event Type');
	 }
	 return false;
}
</script>
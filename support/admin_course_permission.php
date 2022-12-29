<?php
$con1 = mysqli_connect("localhost","root","","innovoskill");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
session_start(); 
include('admin_head.php');
include('db_connect.php');
$clist = "select c_id,c_title,c_short_form,c_duration from courses";
$cqry = mysqli_query($con1,$clist);
$cpqry = mysqli_query($con1,$clist);
$plist = "select p_id,p_center_name from partners";
$pqry = mysqli_query($con,$plist);
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
      <?php include('admin_sidebar.php');?>
       
    </section>
	<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">               
                <div class="col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>  
								<ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">ITPL Course List</a></li>
                                    <li role="presentation"><a href="#permission" aria-controls="settings" role="tab" data-toggle="tab">Course Permission</a></li>
								</ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">INNOVASKILL COURSE LIST</a>
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
															<th>APPROVED CENTERS LIST</th>
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
																<td><button class="btn btn-info">Click to View</button></td>
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
									
									<div role="tabpanel" class="tab-pane fade in" id="permission">
									<form class="form-horizontal" id="course_permission"> 
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">INNOVASKILL COURSE - PERMISSIONS</a>
                                                        </h4>                                                      
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                     <div class="body table-responsive">
														<table class="table">                              															
															<tbody> 				
															<tr>
																<td>Center Name : </td>
																<td>
																<select class="form-control" name="p_id" id="p_id">
																<?php 
																while($row = mysqli_fetch_array($pqry)){ ?>
																<option value="<?=$row['p_id'];?>"><?=$row['p_center_name'];?></option>
																<?php } ?>	
																</select>
																</td>
															</tr>
															<tr>
																<td>Course Permission: </td>
																<td>																								
															<?php while($p_row = mysqli_fetch_array($cpqry)){ ?>
																	<div class="demo-checkbox">                              
																		<input type="checkbox" name="c_list[]" id="basic_checkbox_<?=$p_row['c_id'];?>" class="filled-in" value="<?=$p_row['c_id'];?>"/>
																		<label for="basic_checkbox_<?=$p_row['c_id'];?>"><?=$p_row['c_title'];?></label>
																	</div>																									
															<?php } ?>
																	
																</td>
															</tr>
																																														
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
											<input type="hidden" name="course_permission">
											<center><button onclick="return course_access();" class="btn btn-success">Permission Granted</button></center>
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

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
</body>

</html>
<script>
function course_access()
{
	$.ajax({
			type: 'post',
			url: 'forms.php',
			data: $('#course_permission').serialize(),
			success: function (result) { 
				if(result==1)
				{
					alert('Permission Granted for Selected Center');
				}
				else
				{
					alert('Sorry! Permission Access Failed.');
				}
			}
		  });
}
</script>
 <?php 
include('admin_head.php');
session_start();
include('db_connect.php');
$st_sql = "select st.st_id,st.st_name,st.c_code,st.c_name,st.st_status,st.st_paid,pt.p_center_name
		  from students as st
		  inner join partners as pt on st.p_id=pt.p_id";
$st_query = mysqli_query($con,$st_sql);
$state_sql = "select * from state";
$state_query = mysqli_query($con,$state_sql);

$con1 = mysqli_connect("localhost","root","","innovoskill");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
 
include('main_head.php');

$clist = "select c_title from courses";
$cqry = mysqli_query($con1,$clist);
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
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Student List</a></li>
                                    <li role="presentation"><a href="#view_student" aria-controls="settings" role="tab" data-toggle="tab">View Student Details</a></li>                             
								</ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">STUDENT DETAILS</a>
                                                        </h4>                                                      
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                     <div class="body table-responsive">
														<table class="table">                              
															<thead>
															<th>S.No</th>
															<th>Center Name</th>															
															<th>Student Name</th>
															<th>Course Code</th>
															<th>Course Name</th>
															<th>Paid</th>
															<th>Status</th>																														
															</thead>
															<tbody>                                                               
																<?php while($row = mysqli_fetch_array($st_query))
																{	$i=1;?>
																<tr>
																	<td scope="row"><?=$i;?></td>
																	<td><?=$row['p_center_name'];?></td>	
																	<td><?=$row['st_name'];?></td>
																	<td><?=$row['c_code'];?></td>
																	<td><?=$row['c_name'];?></td>																																		
																	<td><div class="switch">
																	<label>
																	<input type="checkbox" checked>
																	<span class="lever"></span>
																	</label>
																	</div></td>
																	<td><div class="switch">
																	<label>
																	<input type="checkbox" checked>
																	<span class="lever"></span>
																	</label>
																	</div></td>
																</tr>
																<?php $i++; } ?>
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                  
										
                                    </div>
                                 
                                    
									
									
									
									<div role="tabpanel" class="tab-pane fade in" id="view_student">
                                        <form class="form-horizontal">
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">SEARCH STAFF</label>
                                                <div class="col-sm-7">
                                                    <div class="form-line"> 
														<input type="text" class="form-control" name="search_student" id="search_student" placeholder="Search your Student Here..">
												   </div>
                                                </div>
												<div class="col-sm-2">
												<button onclick="return student_search();" class="btn btn-info">SEARCH</button>
												</div>
                                            </div>                      
                                        </form>
										
										
										<form class="form-horizontal" id="student_view_1" style="display:none">										
										 <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">STUDENT NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_name_1" name="s_name_1" placeholder="Staff Name" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT FATHER NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_f_name_1" name="s_fname_1" placeholder="Staff Fathers Name" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">STUDENT AADHAR NUMBER</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_aadhar_number_1" name="s_aadhar_number_1" placeholder="Staff Aadhar Number" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT ADDRESS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_address_1" name="s_address_1" placeholder="Staff Address" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT DISTRICT</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_district_1" name="s_district_1" placeholder="Staff District" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT STATE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_state_1" name="s_state_1" placeholder="Staff State" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT PINCODE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_pincode_1" name="s_pincode_1" placeholder="Staff Pincode" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT MOBILE NUMER</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_mobile_1" name="s_mobile_1" placeholder="Staff Mobile Number" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT EMAIL</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_email_1" name="s_mailid_1" placeholder="Staff Mail Id" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_name_1" name="s_designation_1" placeholder="Staff Designation" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE CODE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_code_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE DETAILS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_c_details_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE FEE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_fee_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">TOTAL FEE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_tot_fee_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">PAID</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_paid_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">BALANCE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_balance_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DATE OF JOINING</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="date" class="form-control" id="st_doj_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STATUS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_status_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DATE OF COMPLETE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="date" class="form-control" id="st_doc_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">CERTIFICATE STATUS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_certification_status_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
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
   
    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
	
	<!-- Search Js -->
	<script type="text/javascript" src="typeahead.js"></script>
	
	<!-- State Js -->
	<script type="text/javascript" src="state.js"></script>
	
</body>

</html>
<script>
function student_search()
{
	 var search_student = $('#search_student').val(); 
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {search_student:search_student},
			success: function (result) {
				if(result == null || result == '' || result == 'null')
				{
					$('#student_view_1').css('display','none');
					alert('Sorry! No Student Found');
				}
				else
				{
					$('#student_view_1').css('display','block');
					var parsedJson = $.parseJSON(result);				
					$('#st_name_1').val(parsedJson.st_name);
					$('#st_f_name_1').val(parsedJson.st_f_name);
					$('#st_aadhar_number_1').val(parsedJson.st_aadhar_number);
					$('#st_address_1').val(parsedJson.st_address);
					$('#st_district_1').val(parsedJson.st_district);
					$('#st_state_1').val(parsedJson.st_state);
					$('#st_pincode_1').val(parsedJson.st_pincode);
					$('#st_mobile_1').val(parsedJson.st_mobile);
					$('#st_email_1').val(parsedJson.st_email);
					$('#c_name_1').val(parsedJson.c_name);
					$('#c_code_1').val(parsedJson.c_code);
					$('#c_fee_1').val(parsedJson.c_fee);
					$('#st_c_details_1').val(parsedJson.st_c_details);
					$('#st_tot_fee_1').val(parsedJson.st_tot_fee);
					$('#st_balance_1').val(parsedJson.st_balance);
					$('#st_paid_1').val(parsedJson.st_paid);
					$('#st_status_1').val(parsedJson.st_status);
					$('#st_doc_1').val(parsedJson.st_doc);
					$('#st_doj_1').val(parsedJson.st_doj);
					$('#st_certification_status_1').val(parsedJson.st_certification_status);
				}
								
			}
		  });
	return false;
}

$(document).ready(function () {
        $('#search_student').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "student_search.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
	


		
function select_course()
{
	var c_name = $('#c_name').val();
	$.ajax({
			type: 'post',
			url: 'course_forms.php',
			data: {c_name:c_name},
			success: function (result) { 
				$('#c_code').val(result);
			}
		  });		
}
</script>
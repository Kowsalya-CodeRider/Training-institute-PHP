 <?php 
include('main_head.php');
session_start();
include('db_connect.php');
$partner_id = $_SESSION['p_id'];
$st_sql = "select * from students where p_id='$partner_id'";
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
      <?php include('leftsidebar.php');?>
       
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
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Add Student</a></li>
									<li role="presentation"><a href="#view_student" aria-controls="settings" role="tab" data-toggle="tab">View Student Details</a></li>                             
									<li role="presentation"><a href="#edit_student" aria-controls="settings" role="tab" data-toggle="tab">Update Student Details</a></li>                             
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
															<th>Name</th>
															<th>Mobile Number</th>
															<th>Mail Id</th>
															<th>Course Code</th>
															<th>Paid</th>
															<th>Status</th>															
															<th>Delete</th>
															</thead>
															<tbody>                                                               
																<?php while($row = mysqli_fetch_array($st_query))
																{	?>
																<tr>
																	<td scope="row"><?=$row['st_id'];?></td>
																	<td><?=$row['st_name'];?></td>	
																	<td><?=$row['st_mobile'];?></td>
																	<td><?=$row['st_email'];?></td>
																	<td><?=$row['c_code'];?></td>																																		
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
																	<td><button class="btn btn-block bg-orange waves-effect" onclick="return student_delete(this.id)" id="<?=$row['st_id'];?>">Delete</button></td>																	
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                  
										
                                    </div>
                                 
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" id="insert_student">
											 <div class="msg" align="center"></div>
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">STUDENT NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_name" name="st_name" placeholder="Enter Student Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">FATHER/GUARDIAN NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_f_name" name="st_f_name" placeholder="Enter Father/Guardian Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">AADHAR NUMBER*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_aadhar_number" name="st_aadhar_number" placeholder="Enter Aadhar Number" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">ADDRESS*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_address" name="st_address" placeholder="Enter Address" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STATE*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <select class="form-control" id="st_state" onchange='select_district(this.value)' name="st_state" required>
														<option value="">Choose Student State</option>
														<?php while($state_row = mysqli_fetch_array($state_query))
																{	?>
														<option value="<?=$state_row['state'];?>"><?=$state_row['state'];?></option>
														<?php } ?>
														</select>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DISTRICT*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line" id="district_list">                                                                                                            
													</div>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">PINCODE*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_pincode" name="st_pincode" placeholder="Enter Pincode" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">MOBILE NUMER*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_mobile" name="st_mobile" maxlength="15" placeholder="Enter Mobile Number" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">MAIL ID*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_email" name="st_email" placeholder="Enter Mail Id" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE DETAILS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_c_details" name="st_c_details" placeholder="Enter Course Details" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">NAME OF THE COURSE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
													<select class="form-control" onchange="return select_course();" id="c_name" name="c_name">
													<option value="">Choose the Student Course</option>
													<?php while($c_row = mysqli_fetch_array($cqry)){ ?>  	
														<option value="<?=$c_row['c_title'];?>"><?=$c_row['c_title'];?></option`>	
													<?php } ?>																																	
													</select>
                                                     </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE CODE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_code" name="c_code" placeholder="Enter Course Code" readonly>                                       
													</div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE FEE</label>
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_fee" name="c_fee" placeholder="Enter Course Fee" required>
                                                    </div>
                                                </div>
												<label for="NewPassword" class="col-sm-2 control-label">TOTAL FEE</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_tot_fee" name="st_tot_fee" placeholder="Enter Total Fee" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">PAID</label>
                                                <div class="col-sm-3">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_paid" name="st_paid" placeholder="Enter Paid Details" required>
                                                    </div>
                                                </div>
												<label for="NewPassword" class="col-sm-2 control-label">BALANCE</label>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_balance" name="st_balance" placeholder="Enter Balance details" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DATE OF JOINING</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="date" class="form-control" id="st_doj" name="st_doj" placeholder="Enter Date of Joining" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STATUS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
														<select class="form-control"  id="st_status" name="st_status">
														<option value="YET TO START">YET TO START</option>
														<option value="ON GOING">ON GOING</option>
														<option value="COMPLETED">COMPLETED</option>
														</select>
                                                     </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DATE OF COMPLETE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="date" class="form-control" id="st_doc" name="st_doc" placeholder="Enter Date of Complete" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">CERTIFICATE STATUS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
													<select class="form-control"  id="st_certification_status" name="st_certification_status">
														<option value="PROCESSING">PROCESSING</option>												
														<option value="ISSED">ISSED</option>
													</select>
                                                     </div>
                                                </div>
                                            </div>
											<input type="hidden" name="insert_student">
											<input type="hidden" name="p_id" value="<?=$_SESSION['p_id'];?>">
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button onclick="return student_insert();" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
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
									
									
										
									<div role="tabpanel" class="tab-pane fade in" id="edit_student">
                                        <form class="form-horizontal" id="update_student">
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">SEARCH STAFF</label>
                                                <div class="col-sm-7">
                                                    <div class="form-line"> 
														<input type="text" class="form-control" name="search_student_1" id="search_student_1" placeholder="Search your Student Here..">
												   </div>
                                                </div>
												<div class="col-sm-2">
												<button onclick="return student_edit();" class="btn btn-info">SEARCH</button>
												</div>
                                            </div>                      
                                        </form>
										
										
										<form class="form-horizontal" id="student_edit_1" style="display:none">	
										 <div class="editmsg" align="center"></div>
										 <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">STUDENT NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_name_2" name="st_name_2" placeholder="Staff Name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT FATHER NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_f_name_2" name="st_f_name_2" placeholder="Staff Fathers Name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">STUDENT AADHAR NUMBER</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_aadhar_number_2" name="st_aadhar_number_2" placeholder="Staff Aadhar Number" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT ADDRESS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_address_2" name="st_address_2" placeholder="Staff Address" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT DISTRICT</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_district_2" name="st_district_2" placeholder="Staff District" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT STATE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_state_2" name="st_state_2" placeholder="Staff State" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT PINCODE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_pincode_2" name="st_pincode_2" placeholder="Staff Pincode" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT MOBILE NUMER</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_mobile_2" maxlength="15" name="st_mobile_2" placeholder="Staff Mobile Number" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STUDENT EMAIL</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_email_2" name="st_email_2" placeholder="Staff Mail Id" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_name_2" name="c_name_2" placeholder="Staff Designation" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE CODE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_code_2" name="c_code_2" placeholder="Staff B2E Certification" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE DETAILS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_c_details_2" name="st_c_details_2" placeholder="Staff B2E Certification" >
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE FEE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_fee_2" name="c_fee_2" placeholder="Staff B2E Certification" >
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">TOTAL FEE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_tot_fee_2" name="st_tot_fee_2" placeholder="Staff B2E Certification" >
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">PAID</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_paid_2" name="st_paid_2" placeholder="Staff B2E Certification" >
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">BALANCE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_balance_2" name="st_balance_2" placeholder="Staff B2E Certification" >
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DATE OF JOINING</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="date" class="form-control" id="st_doj_2" name="st_doj_2" placeholder="Staff B2E Certification" >
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STATUS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_status_2" name="st_status_2" placeholder="Staff B2E Certification" >
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DATE OF COMPLETE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="date" class="form-control" id="st_doc_2" name="st_doc_2" placeholder="Staff B2E Certification" >
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">CERTIFICATE STATUS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_certification_status_2" name="st_certification_status_2" placeholder="Staff B2E Certification" >
                                                    </div>
                                                </div>
                                            </div>	
											<input type="hidden" name="update_student">
											<input type="hidden" name="st_id_2" id="st_id_2">
											<input type="hidden" name="p_id_2" value="<?=$_SESSION['p_id'];?>">
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button onclick="return student_update()" class="btn btn-danger">SUBMIT</button>
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
function student_insert()
{
	 var st_name 					= $('#st_name').val();
	 var st_f_name 					= $('#st_f_name').val();
	 var st_aadhar_number 			= $('#st_aadhar_number').val();
	 var st_address 				= $('#st_address').val();
	 var st_district 				= $('#st_district').val();
	 var st_state 					= $('#st_state').val();
	 var st_pincode 				= $('#st_pincode').val();
	 var st_mobile 					= $('#st_mobile').val();
	 var st_email 					= $('#st_email').val();
	 var st_c_details 				= $('#st_c_details').val();
	 var c_name 					= $('#c_name').val();
	 var c_code 					= $('#c_code').val();
	 var c_fee 						= $('#c_fee').val();
	 var st_tot_fee					= $('#st_tot_fee').val();
	 var st_paid 					= $('#st_paid').val();
	 var st_balance					= $('#st_balance').val();
	 var st_doj						= $('#st_doj').val();
	 var st_status					= $('#st_status').val();
	 var st_doc						= $('#st_doc').val();
	 var st_certification_status	= $('#st_certification_status').val();
	 if(st_name!='' && st_f_name!='' && st_aadhar_number!='' && st_address!='' && st_district!='' && st_state!='' && st_pincode!='' && st_mobile!=''&& st_email!='' && st_c_details!='' && c_name!='' && c_code!='' && c_fee!='' && st_tot_fee!='' && st_paid!='' && st_balance!='' && st_doj!='' && st_status!='' && st_doc!='' && st_certification_status!='')
	 {
			$.ajax({
			type: 'post',
			url: 'forms.php',
			data: $('#insert_student').serialize(),
			success: function (result) { 
				if(result==1)
				{
				  $('.msg').addClass('text-success font-weight-bold');
				  $('.msg').html('Student Addedd Successfully!');	
				  $('#insert_student')[0].reset();
				  location.reload();
				}
				else
				{
				  $('.msg').addClass('text-danger font-weight-bold');
				  $('.msg').html('Sorry! Your Data Having an Error');					 
				}	
			}
		  });			 
	 }
	 else
	 {
		 alert('Field value missed');
	 }
	 return false;
}

function student_delete(id)
{ 
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {st_id:id,student_delete:'student_delete'},
			success: function (result) {
				if(result==1)
				{
					alert('Student Details Deleted Successfully!');
					location.reload();
				}
				else
				{
					alert('Sorry! Your Data Having an Error!');
				}
			}
		  });		
		  return false;
}

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
	
$(document).ready(function () {
        $('#search_student_1').typeahead({
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
	
function student_edit()
{
	 var search_student = $('#search_student_1').val(); 
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {search_student:search_student},
			success: function (result) {
				if(result == null || result == '' || result == 'null')
				{
					$('#student_edit_1').css('display','none');
					alert('Sorry! No Student Found');
				}
				else
				{
					$('#student_edit_1').css('display','block');
					var parsedJson = $.parseJSON(result);				
					$('#st_name_2').val(parsedJson.st_name);
					$('#st_f_name_2').val(parsedJson.st_f_name);
					$('#st_aadhar_number_2').val(parsedJson.st_aadhar_number);
					$('#st_address_2').val(parsedJson.st_address);
					$('#st_district_2').val(parsedJson.st_district);
					$('#st_state_2').val(parsedJson.st_state);
					$('#st_pincode_2').val(parsedJson.st_pincode);
					$('#st_mobile_2').val(parsedJson.st_mobile);
					$('#st_email_2').val(parsedJson.st_email);
					$('#c_name_2').val(parsedJson.c_name);
					$('#c_code_2').val(parsedJson.c_code);
					$('#c_fee_2').val(parsedJson.c_fee);
					$('#st_c_details_2').val(parsedJson.st_c_details);
					$('#st_tot_fee_2').val(parsedJson.st_tot_fee);
					$('#st_balance_2').val(parsedJson.st_balance);
					$('#st_paid_2').val(parsedJson.st_paid);
					$('#st_status_2').val(parsedJson.st_status);
					$('#st_doc_2').val(parsedJson.st_doc);
					$('#st_doj_2').val(parsedJson.st_doj);
					$('#st_id_2').val(parsedJson.st_id);
					$('#st_certification_status_2').val(parsedJson.st_certification_status);
				}
								
			}
		  });
	return false;
}


function student_update()
{ 
	 var st_name 					= $('#st_name_2').val();
	 var st_f_name 					= $('#st_f_name_2').val();
	 var st_aadhar_number 			= $('#st_aadhar_number_2').val();
	 var st_address 				= $('#st_address_2').val();
	 var st_district 				= $('#st_district_2').val();
	 var st_state 					= $('#st_state_2').val();
	 var st_pincode 				= $('#st_pincode_2').val();
	 var st_mobile 					= $('#st_mobile_2').val();
	 var st_email 					= $('#st_email_2').val();
	 var st_c_details 				= $('#st_c_details_2').val();
	 var c_name 					= $('#c_name_2').val();
	 var c_code 					= $('#c_code_2').val();
	 var c_fee 						= $('#c_fee_2').val();
	 var st_tot_fee					= $('#st_tot_fee_2').val();
	 var st_paid 					= $('#st_paid_2').val();
	 var st_balance					= $('#st_balance_2').val();
	 var st_doj						= $('#st_doj_2').val();
	 var st_status					= $('#st_status_2').val();
	 var st_doc						= $('#st_doc_2').val();
	 var st_certification_status	= $('#st_certification_status_2').val();
	 if(st_name!='' && st_f_name!='' && st_aadhar_number!='' && st_address!='' && st_district!='' && st_state!='' && st_pincode!='' && st_mobile!=''&& st_email!='' && st_c_details!='' && c_name!='' && c_code!='' && c_fee!='' && st_tot_fee!='' && st_paid!='' && st_balance!='' && st_doj!='' && st_status!='' && st_doc!='' && st_certification_status!='')
	 {
			$.ajax({
			type: 'post',
			url: 'forms.php',
			data: $('#student_edit_1').serialize(),
			success: function (result) { 
				if(result==1)
				{
				  $('.editmsg').addClass('text-success font-weight-bold');
				  $('.editmsg').html('Student Details Updated Successfully!');					  
				  location.reload();
				}
				else
				{
				  $('.editmsg').addClass('text-danger font-weight-bold');
				  $('.editmsg').html('Sorry! Your Data Having an Error');					 
				}	
			}
		  });			 
	 }
	 else
	 {
		 alert('Field value missed');
	 }
	 return false;
}

$("#st_mobile").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
		
$("#st_mobile_2").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        
$("#c_fee").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
		
$("#c_fee_2").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
		
$("#st_tot_fee").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
		
$("#st_tot_fee_2").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
		
$("#st_paid").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
		
$("#st_paid_2").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
		
$("#st_balance").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
		
$("#st_balance_2").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
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
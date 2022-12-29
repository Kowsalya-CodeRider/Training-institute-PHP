<?php 
include('main_head.php');
session_start();
include('db_connect.php');
$p_id = $_SESSION['p_id'];
$s_sql = "select * from staff where p_id='$p_id'";
$s_query = mysqli_query($con,$s_sql);
$state_sql = "select * from state";
$state_query = mysqli_query($con,$state_sql);
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
       
    </section><section class="content">
        <div class="container-fluid">
            <div class="row clearfix">               
                <div class="col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Staff List</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Add Staff</a></li>
									<li role="presentation"><a href="#view_staff" aria-controls="settings" role="tab" data-toggle="tab">View Staff</a></li>
									<li role="presentation"><a href="#edit_staff" aria-controls="settings" role="tab" data-toggle="tab">Edit Staff</a></li>
                               
								</ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">STAFF DETAILS</a>
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
															<th>Designation</th>
															<th>Mobile Number</th>
															<th>Email Id</th>
															<th>Delete</th>
															</thead>
															<tbody>                                                               
																<?php
																 while($row = mysqli_fetch_array($s_query)){
																	//here goes the data
																	echo '<tr>';
																	echo '<td scope="row">'.$row['s_id'].'</td>';
																	echo '<td>'.$row['s_name'].'</td>';					
																	echo '<td>'.$row['s_designation'].'</td>';
																	echo '<td>'.$row['s_mobile'].'</td>';
																	echo '<td>'.$row['s_mailid'].'</td>';
																	echo '<td><button class="btn btn-block bg-orange waves-effect" onclick="return staff_delete(this.id)" id="'.$row['s_id'].'">Delete</button></td>';
																	echo '</tr>';
																}
																?>
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                  
										
                                    </div>
                                 
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" id="insert_staff">
											 <div class="msg" align="center"></div>
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">NAME OF THE STAFF*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_name" name="s_name" placeholder="Staff Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">FATER NAME*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_fname" name="s_fname" placeholder="Staff Fathers Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">AADHAR NUMBER*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_aadhar_number" name="s_aadhar_number" placeholder="Staff Aadhar Number" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">ADDRESS*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_address" name="s_address" placeholder="Staff Address" required>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STATE*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                       <select class="form-control" id="s_state" name="s_state" onchange="select_district(this.value)" required>
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
                                                        <input type="text" class="form-control" id="s_pincode" name="s_pincode" placeholder="Staff Pincode" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">MOBILE NUMER*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_mobile" name="s_mobile" maxlength="15" placeholder="Staff Mobile Number" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">MAIL ID*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_mailid" name="s_mailid" placeholder="Staff Mail Id" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DESIGNATION*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_designation" name="s_designation" placeholder="Staff Designation" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">B2E CERTIFICATION</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_bte" name="s_bte" placeholder="Staff B2E Certification" required>
                                                    </div>
                                                </div>
                                            </div>
											<input type="hidden" name="add_staff">
											<input type="hidden" name="p_id" value="<?=$_SESSION['p_id'];?>">
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button onclick="return staff_insert()" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
									
									
									
									<div role="tabpanel" class="tab-pane fade in" id="view_staff">
                                        <form class="form-horizontal" id="staff_view">
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">SEARCH STAFF</label>
                                                <div class="col-sm-7">
                                                    <div class="form-line"> 
														<input type="text" class="form-control" name="search_staff" id="search_staff" placeholder="Search your Staff Here..">
												   </div>
                                                </div>
												<div class="col-sm-2">
												<button onclick="return staff_search()" class="btn btn-info">SEARCH</button>
												</div>
                                            </div>                      
                                        </form>
										
										
										<form class="form-horizontal" id="staff_view_1" style="display:none">										
										 <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">NAME OF THE STAFF*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_name_1" name="s_name_1" placeholder="Staff Name" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">FATER NAME*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_fname_1" name="s_fname_1" placeholder="Staff Fathers Name" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">AADHAR NUMBER*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_aadhar_number_1" name="s_aadhar_number_1" placeholder="Staff Aadhar Number" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">ADDRESS*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_address_1" name="s_address_1" placeholder="Staff Address" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DISTRICT*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_district_1" name="s_district_1" placeholder="Staff District" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STATE*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_state_1" name="s_state_1" placeholder="Staff State" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">PINCODE*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_pincode_1" name="s_pincode_1" placeholder="Staff Pincode" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">MOBILE NUMER*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_mobile_1" name="s_mobile_1" placeholder="Staff Mobile Number" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">MAIL ID*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_mailid_1" name="s_mailid_1" placeholder="Staff Mail Id" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DESIGNATION*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_designation_1" name="s_designation_1" placeholder="Staff Designation" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">B2E CERTIFICATION</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_bte_1" name="s_bte_1" placeholder="Staff B2E Certification" readonly>
                                                    </div>
                                                </div>
                                            </div>											
										</form>																													
                                    </div>
									
									
									
										<div role="tabpanel" class="tab-pane fade in" id="edit_staff">
										<div class="msg1" align="center"></div>
                                        <form class="form-horizontal" id="staff_edit">
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">SEARCH STAFF</label>
                                                <div class="col-sm-7">
                                                    <div class="form-line"> 
														<input type="text" class="form-control" name="search_staff_1" id="search_staff_1" placeholder="Search your Staff Here..">
												   </div>
                                                </div>
												<div class="col-sm-2">
												<button onclick="return edit_staff_search()" class="btn btn-info">SEARCH</button>
												</div>
                                            </div>                      
                                        </form>
										
										
										<form class="form-horizontal" id="staff_edit_1" style="display:none">										
										 <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">NAME OF THE STAFF*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_name_2" name="s_name_2" placeholder="Staff Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">FATER NAME*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_fname_2" name="s_fname_2" placeholder="Staff Fathers Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">AADHAR NUMBER*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_aadhar_number_2" name="s_aadhar_number_2" placeholder="Staff Aadhar Number" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">ADDRESS*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_address_2" name="s_address_2" placeholder="Staff Address" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DISTRICT*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_district_2" name="s_district_2" placeholder="Staff District" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STATE*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_state_2" name="s_state_2" placeholder="Staff State" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">PINCODE*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_pincode_2" name="s_pincode_2" placeholder="Staff Pincode" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">MOBILE NUMER*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_mobile_2" name="s_mobile_2" maxlength="15" placeholder="Staff Mobile Number" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">MAIL ID*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_mailid_2" name="s_mailid_2" placeholder="Staff Mail Id" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DESIGNATION*</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_designation_2" name="s_designation_2" placeholder="Staff Designation" required>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">B2E CERTIFICATION</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_bte_2" name="s_bte_2" placeholder="Staff B2E Certification" required>
                                                    </div>
                                                </div>
                                            </div>
											<input type="hidden" name="update_staff">
											<input type="hidden" name="s_id_2" id="s_id_2">
											<input type="hidden" name="p_id_2" value="<?=$_SESSION['p_id'];?>">
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button onclick="return staff_update()" class="btn btn-danger">SUBMIT</button>
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
	<script type="text/javascript" src="staff_state.js"></script>

</body>

</html>
<script>
function staff_insert()
{
	 var s_name 			= $('#s_name').val();
	 var s_fname 			= $('#s_fname').val();
	 var s_aadhar_number 	= $('#s_aadhar_number').val();
	 var s_address 			= $('#s_address').val();
	 var s_district 		= $('#s_district').val();
	 var s_state 			= $('#s_state').val();
	 var s_pincode 			= $('#s_pincode').val();
	 var s_mobile 			= $('#s_mobile').val();
	 var s_mailid 			= $('#s_mailid').val();
	 var s_designation 		= $('#s_designation').val();
	 var s_bte 				= $('#s_bte').val();
	 if(s_name!='' && s_fname!='' && s_aadhar_number!='' && s_address!='' && s_district!='' && s_state!='' && s_pincode!='' && s_mobile!=''&& s_mailid!='' && s_designation!='' && s_bte!='')
	 {
			 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: $('#insert_staff').serialize(),
			success: function (result) {
				if(result==1)
				{
				  $('.msg').addClass('text-success font-weight-bold');
				  $('.msg').html('Staff Addedd Successfully!');	
				  $('#insert_staff')[0].reset();
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
	 return false;
}

function staff_delete(id)
{
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {s_id:id,staff_delete:'staff_delete'},
			success: function (result) {
				if(result==1)
				{
					alert('Staff Deleted Successfully!');
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

 $(document).ready(function () {
        $('#search_staff').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "search.php",
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
	
function staff_search()
{
	 var search_name = $('#search_staff').val(); 
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {search_name:search_name},
			success: function (result) {
				if(result == null || result == '' || result == 'null')
				{
					$('#staff_view_1').css('display','none');
					alert('Sorry! No Staff Found');
				}
				else
				{
					$('#staff_view_1').css('display','block');
					var parsedJson = $.parseJSON(result);				
					$('#s_name_1').val(parsedJson.s_name);
					$('#s_fname_1').val(parsedJson.s_fname);
					$('#s_aadhar_number_1').val(parsedJson.s_aadhar_number);
					$('#s_address_1').val(parsedJson.s_address);
					$('#s_district_1').val(parsedJson.s_district);
					$('#s_state_1').val(parsedJson.s_state);
					$('#s_pincode_1').val(parsedJson.s_pincode);
					$('#s_mobile_1').val(parsedJson.s_mobile);
					$('#s_mailid_1').val(parsedJson.s_mailid);
					$('#s_designation_1').val(parsedJson.s_designation);
					$('#s_bte_1').val(parsedJson.s_bte);
				}
								
			}
		  });
	return false;
}

 $(document).ready(function () {
        $('#search_staff_1').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "search.php",
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

function edit_staff_search()
{
	 var search_name = $('#search_staff_1').val(); 
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {search_name:search_name},
			success: function (result) {
				if(result == null || result == '' || result == 'null')
				{
					$('#staff_edit_1').css('display','none');
					alert('Sorry! No Staff Found');
				}
				else
				{
					$('#staff_edit_1').css('display','block');
					var parsedJson = $.parseJSON(result);
					$('#s_id_2').val(parsedJson.s_id);
					$('#s_name_2').val(parsedJson.s_name);
					$('#s_fname_2').val(parsedJson.s_fname);
					$('#s_aadhar_number_2').val(parsedJson.s_aadhar_number);
					$('#s_address_2').val(parsedJson.s_address);
					$('#s_district_2').val(parsedJson.s_district);
					$('#s_state_2').val(parsedJson.s_state);
					$('#s_pincode_2').val(parsedJson.s_pincode);
					$('#s_mobile_2').val(parsedJson.s_mobile);
					$('#s_mailid_2').val(parsedJson.s_mailid);
					$('#s_designation_2').val(parsedJson.s_designation);
					$('#s_bte_2').val(parsedJson.s_bte);
				}
								
			}
		  });
	return false;
}

function staff_update()
{
	 var s_name 			= $('#s_name_2').val();
	 var s_fname 			= $('#s_fname_2').val();
	 var s_aadhar_number 	= $('#s_aadhar_number_2').val();
	 var s_address 			= $('#s_address_2').val();
	 var s_district 		= $('#s_district_2').val();
	 var s_state 			= $('#s_state_2').val();
	 var s_pincode 			= $('#s_pincode_2').val();
	 var s_mobile 			= $('#s_mobile_2').val();
	 var s_mailid 			= $('#s_mailid_2').val();
	 var s_designation 		= $('#s_designation_2').val();
	 var s_bte 				= $('#s_bte_2').val();
	 if(s_name!='' && s_fname!='' && s_aadhar_number!='' && s_address!='' && s_district!='' && s_state!='' && s_pincode!='' && s_mobile!=''&& s_mailid!='' && s_designation!='' && s_bte!='')
	 {
			 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: $('#staff_edit_1').serialize(),
			success: function (result) {
				if(result==1)
				{
				  $('.msg1').addClass('text-success font-weight-bold');
				  $('.msg1').html('Staff Updated Successfully!');	
				  $('#staff_edit_1').css('display','none');
				  location.reload();
				}
				else
				{
				  $('.msg1').addClass('text-danger font-weight-bold');
				  $('.msg1').html('Sorry! Your Data Having an Error');	
				   $('#staff_edit_1').css('display','none');
				}	
			}
		  });			 
	 }
	 return false;
}

$("#s_mobile").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
		
$("#s_mobile_2").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
</script>
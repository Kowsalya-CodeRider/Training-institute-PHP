<?php 
include('admin_head.php');
session_start();
include('db_connect.php');
$s_sql = "select st.s_id as staff_id,st.s_name as staff_name,st.s_designation as staff_designation,
		 pt.p_center_name as center_name,pt.p_name as partner_name
		  from staff as st
		  inner join partners as pt on pt.p_id=st.p_id";
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
      <?php include('admin_sidebar.php');?>
       
    </section><section class="content">
        <div class="container-fluid">
            <div class="row clearfix">               
                <div class="col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Partners - Staff List</a></li>
                                    <li role="presentation"><a href="#view_staff" aria-controls="settings" role="tab" data-toggle="tab">Individual - Staff View</a></li>		
								</ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">PARTNERS - STAFF LIST</a>
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
															<th>Partner</th>
															<th>Staff Name</th>
															<th>Designation</th>															
															</thead>
															<tbody>                                                               
																<?php
																 while($row = mysqli_fetch_array($s_query)){
																	//here goes the data
																	$i=1;
																	echo '<tr>';
																	echo '<td scope="row">'.$i.'</td>';
																	echo '<td>'.$row['center_name'].'</td>';					
																	echo '<td>'.$row['partner_name'].'</td>';
																	echo '<td>'.$row['staff_name'].'</td>';
																	echo '<td>'.$row['staff_designation'].'</td>';
																	echo '</tr>';
																	$i++;
																}
																?>
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                  
										
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



</script>
<?php 
include('admin_head.php');
session_start();
include('db_connect.php');
$pt_sql = "select * from partners";
$pt_query = mysqli_query($con,$pt_sql);
$state_sql = "select * from state";
$state_query = mysqli_query($con,$state_sql);
$state_query_1 = mysqli_query($con,$state_sql);
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
                                   <li role="presentation" class="active"><a href="#partners_list" aria-controls="home" role="tab" data-toggle="tab">Partners List</a></li>
                                   <li role="presentation"><a href="#home" aria-controls="settings" role="tab" data-toggle="tab">View Partner Details</a></li>
									<li role="presentation"><a href="#add_partners" aria-controls="settings" role="tab" data-toggle="tab">Add - New Partner</a></li>
								 </ul>

                                <div class="tab-content">
									
									<div role="tabpanel" class="tab-pane fade in active" id="partners_list">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">PARTNERS DETAILS</a>
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
															<th>Center Name</th>
															<th>Center District</th>
															<th>Center Contact Number</th>
															<th>Delete</th>
															</thead>
															<tbody>                                                               
																<?php while($row = mysqli_fetch_array($pt_query))
																{	?>
																<tr>
																	<td scope="row"><?=$row['p_id'];?></td>
																	<td><?=$row['p_name'];?></td>		
																	<td><?=$row['p_center_name'];?></td>	
																	<td><?=$row['p_center_district'];?></td>
																	<td><?=$row['p_center_contact_number'];?></td>
																	<td><button class="btn btn-block bg-orange waves-effect" onclick="return partners_delete(this.id)" id="<?=$row['p_id'];?>">Delete</button></td>																	
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                  
										
                                    </div>
								
								
								
								
								
								
								
                                    <div role="tabpanel" class="tab-pane fade in " id="home">
									
										<form class="form-horizontal">
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">SEARCH PARTNERS</label>
                                                <div class="col-sm-7">
                                                    <div class="form-line"> 
														<input type="text" class="form-control" name="search_partner" id="search_partner" placeholder="Search your Student Here..">
												   </div>
                                                </div>
												<div class="col-sm-2">
												<button onclick="return partners_search();" class="btn btn-info">SEARCH</button>
												</div>
                                            </div>                      
                                        </form>
									
										<form class="form-horizontal" id="partners_view_1" style="display:none">		
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">PARTNER DETAIL - VIEW</a>
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
																	<td scope="row">NAME OF THE PARTNER1*</td>
																	<td><input type="text" class="form-control" readonly id="p_name"></td>																	
																</tr>
																<tr>
																	<td scope="row">NAME OF THE PARTNER2</td>
																	<td><input type="text" class="form-control" readonly id="p_name_2"></td>																	
																</tr>
																<tr>
																	<td scope="row">FATHER NAME*</td>
																	<td><input type="text" class="form-control" readonly id="p_f_name"></td>																	
																</tr>
																<tr>
																	<td scope="row">AADHAR NUMBER*</td>
																	<td><input type="text" class="form-control" readonly id="p_aadhar_number"></td>																	
																</tr>
																<tr>
																	<td scope="row">ADDRESS*</td>
																	<td><input type="text" class="form-control" readonly id="p_address"></td>																	
																</tr>
																<tr>
																	<td scope="row">DISTRICT*</td>
																	<td><input type="text" class="form-control" readonly id="p_district"></td>																	
																</tr>
																<tr>
																	<td scope="row">STATE*</td>
																	<td><input type="text" class="form-control" readonly id="p_state"></td>																	
																</tr>
																<tr>
																	<td scope="row">PINCODE*</td>
																	<td><input type="text" class="form-control" readonly id="p_pincode"></td>																	
																</tr>
																<tr>
																	<td scope="row">MOBILE NUMER*</td>
																	<td><input type="text" class="form-control" readonly id="p_mobile"></td>																	
																</tr>
																<tr>
																	<td scope="row">MAIL ID*</td>
																	<td><input type="text" class="form-control" readonly id="p_email"></td>																	
																</tr>
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                            
                                        </div>
						
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                   
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">CENTRE DETAILS</a>
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
																	<td scope="row">NAME OF THE CENTRE*</td>
																	<td><input type="text" class="form-control" readonly id="p_center_name"></td>																	
																</tr>
																<tr>
																	<td scope="row">ADDRESS*</td>
																	<td><input type="text" class="form-control" readonly id="p_center_address"></td>																	
																</tr>
																<tr>
																	<td scope="row">DISTRICT*</td>
																	<td><input type="text" class="form-control" readonly id="p_center_district"></td>																	
																</tr>
																<tr>
																	<td scope="row">STATE*</td>
																	<td><input type="text" class="form-control" readonly id="p_center_state"></td>																	
																</tr>
																<tr>
																	<td scope="row">PINCODE*</td>
																	<td><input type="text" class="form-control" readonly id="p_center_pincode"></td>																	
																</tr>
																<tr>
																	<td scope="row">CENTRE MOBILE/LANDLINE NUMBER*</td>
																	<td><input type="text" class="form-control" readonly id="p_center_contact_number"></td>																	
																</tr>
																<tr>
																	<td scope="row">CENTRE MAIL ID*</td>
																	<td><input type="text" class="form-control" readonly id="p_center_email"></td>																	
																</tr>
																<tr>
																	<td scope="row">FLOOR AREA (Sq. Ft)*</td>
																	<td><input type="text" class="form-control" readonly id="p_center_floor"></td>																	
																</tr>
																<tr>
																	<td scope="row">PROPERTY*</td>
																	<td> <input type="text" class="form-control" readonly id="p_center_property"></td>																																										
																</tr>																
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                           
                                        </div>
										
										 <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                   
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">AGGREMENT</a>
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
																	<td scope="row">DATE OF SIGNED</td>
																	<td><input type="text" class="form-control" readonly id="p_agreement_signed"></td>																	
																</tr>
																<tr>
																	<td scope="row">AGGREMENT END DATE</td>
																	<td><input type="text" class="form-control" readonly id="p_agreement_end_date"></td>																	
																</tr>
																<tr>
																	<td scope="row">NEXT RENEWAL DATE</td>
																	<td><input type="text" class="form-control" readonly id="p_agreement_renewal_date"></td>																	
																</tr>																																
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                           
                                        </div>
										 <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                   
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">LOGIN DETAILS</a>
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
																	<td scope="row">LOGIN EMAIL</td>
																	<td><input type="text" class="form-control" readonly id="p_email_login"></td>																	
																</tr>
																<tr>
																	<td scope="row">PARTNER PASSWORD</td>
																	<td><input type="text" class="form-control" readonly id="p_password"></td>																	
																</tr>																																
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                           
                                        </div>
									 </form>
									 </div>
									 
									 
									 
									 <div role="tabpanel" class="tab-pane fade in " id="add_partners">									
										<form class="form-horizontal" id="partners_add">
										<div class="msg" align="center"></div>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">NEW PARTNER</a>
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
																	<td scope="row">NAME OF THE PARTNER1*</td>
																	<td><input type="text" class="form-control" id="p_name_1" name="p_name_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">NAME OF THE PARTNER2</td>
																	<td><input type="text" class="form-control" id="p_name_2_1" name="p_name_2_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">FATHER NAME*</td>
																	<td><input type="text" class="form-control" id="p_f_name_1" name="p_f_name_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">AADHAR NUMBER*</td>
																	<td><input type="text" class="form-control" name="p_aadhar_number_1" id="p_aadhar_number_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">ADDRESS*</td>
																	<td><textarea class="form-control" id="p_address_1" name="p_address_1"></textarea></td>																	
																</tr>
																<tr>
																	<td scope="row">STATE*</td>
																	<td>
																		 <select class="form-control" id="p_state_1" onchange='select_district(this.value)' name="p_state_1" required>
																			<option value="">Choose Student State</option>
																			<?php while($state_row = mysqli_fetch_array($state_query))
																					{	?>
																			<option value="<?=$state_row['state'];?>"><?=$state_row['state'];?></option>
																			<?php } ?>
																		 </select>
																	</td>																	
																</tr>
																<tr>
																	<td scope="row">DISTRICT*</td>
																	<td><div id="district_list"></div></td>																	
																</tr>
																<tr>
																	<td scope="row">PINCODE*</td>
																	<td><input type="number" class="form-control" name="p_pincode_1" id="p_pincode_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">MOBILE NUMER*</td>
																	<td><input type="number" class="form-control" name="p_mobile_1" id="p_mobile_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">MAIL ID*</td>
																	<td><input type="email" class="form-control" name="p_email_1" id="p_email_1"></td>																	
																</tr>
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                   
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">CENTRE DETAILS</a>
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
																	<td scope="row">NAME OF THE CENTRE*</td>
																	<td><input type="text" class="form-control" id="p_center_name_1" name="p_center_name_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">ADDRESS*</td>
																	<td><textarea class="form-control" id="p_center_address_1" name="p_center_address_1"></textarea></td>																	
																</tr>	
																<tr>
																	<td scope="row">STATE*</td>
																	<td><select class="form-control" id="p_center_state_1" onchange='select_district_1(this.value)' name="p_center_state_1" required>
																			<option value="">Choose State of the State</option>
																			<?php while($state_row_1 = mysqli_fetch_array($state_query_1))													
																					{	?>
																			<option value="<?=$state_row_1['state'];?>"><?=$state_row_1['state'];?></option>
																			<?php } ?>
																		 </select></td>																	
																</tr>
																<tr>
																	<td scope="row">DISTRICT*</td>
																	<td><div id="district_list_1"></div></td>																	
																</tr>
																<tr>
																	<td scope="row">PINCODE*</td>
																	<td><input type="number" class="form-control" id="p_center_pincode_1" name="p_center_pincode_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">CENTRE MOBILE/LANDLINE NUMBER*</td>
																	<td><input type="number" class="form-control" id="p_center_contact_number_1" name="p_center_contact_number_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">CENTRE MAIL ID*</td>
																	<td><input type="email" class="form-control" id="p_center_email_1" name="p_center_email_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">FLOOR AREA (Sq. Ft)*</td>
																	<td><input type="text" class="form-control" id="p_center_floor_1" name="p_center_floor_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">PROPERTY*</td>
																	<td> <input type="text" class="form-control" id="p_center_property_1" name="p_center_property_1"></td>																																										
																</tr>																
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                           
                                        </div>
										
										 <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                   
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">AGGREMENT</a>
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
																	<td scope="row">DATE OF SIGNED</td>
																	<td><input type="date" class="form-control" id="p_agreement_signed_1" name="p_agreement_signed_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">AGGREMENT END DATE</td>
																	<td><input type="date" class="form-control" id="p_agreement_end_date_1" name="p_agreement_end_date_1"></td>																	
																</tr>
																<tr>
																	<td scope="row">NEXT RENEWAL DATE</td>
																	<td><input type="date" class="form-control" id="p_agreement_renewal_date_1" name="p_agreement_renewal_date_1"></td>																	
																</tr>																																
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                           <input type="hidden" name="partners_add">
                                        </div>
										 <div class="form-group">
                                                <div class="col-sm-offset-5 col-sm-9">
                                                    <button onclick="return partner_insert()" class="btn btn-info">ADD PARTNER</button>
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
	
	<!-- Search Js -->
	<script type="text/javascript" src="typeahead.js"></script>
	
	<!-- Partners Js -->
	<script type="text/javascript" src="partners_state.js"></script>
   
</body>

</html>
<script>
$(document).ready(function () {
        $('#search_partner').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "partner_search.php",
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
	
function partners_search()
{
	 var search_partner = $('#search_partner').val(); 
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {search_partner:search_partner},
			success: function (result) {
				if(result == null || result == '' || result == 'null')
				{
					$('#partners_view_1').css('display','none');
					alert('Sorry! No Partners Found');
				}
				else
				{
					$('#partners_view_1').css('display','block');
					var parsedJson = $.parseJSON(result);			
					$('#p_name').val(parsedJson.p_name);
					$('#p_name_2').val(parsedJson.p_name_2);
					$('#p_f_name').val(parsedJson.p_f_name);
					$('#p_aadhar_number').val(parsedJson.p_aadhar_number);
					$('#p_address').val(parsedJson.p_address);
					$('#p_district').val(parsedJson.p_district);
					$('#p_state').val(parsedJson.p_state);
					$('#p_pincode').val(parsedJson.p_pincode);
					$('#p_mobile').val(parsedJson.p_mobile);
					$('#p_email').val(parsedJson.p_email);
					$('#p_center_name').val(parsedJson.p_center_name);
					$('#p_center_address').val(parsedJson.p_center_address);
					$('#p_center_contact_number').val(parsedJson.p_center_contact_number);
					$('#p_center_district').val(parsedJson.p_center_district);
					$('#p_center_state').val(parsedJson.p_center_state);
					$('#p_center_email').val(parsedJson.p_center_email);
					$('#p_center_floor').val(parsedJson.p_center_floor);
					$('#p_center_pincode').val(parsedJson.p_center_pincode);
					$('#p_center_property').val(parsedJson.p_center_property);
					$('#p_agreement_signed').val(parsedJson.p_agreement_signed);
					$('#p_agreement_end_date').val(parsedJson.p_agreement_end_date);
					$('#p_agreement_renewal_date').val(parsedJson.p_agreement_renewal_date);
					$('#p_email_login').val(parsedJson.p_email);
					$('#p_password').val(parsedJson.p_password);
				}
								
			}
		  });
	return false;
}
function partners_delete(id)
{ 
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {pt_id:id,partners_delete:'partners_delete'},
			success: function (result) {
				if(result==1)
				{
					alert('Partners Details Deleted Successfully!');
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
function partner_insert()
{
	 var p_name_1 					= $('#p_name_1').val();
	 var p_name_2_1 				= $('#p_name_2_1').val();
	 var p_f_name_1 				= $('#p_f_name_1').val();
	 var p_aadhar_number_1 			= $('#p_aadhar_number_1').val();
	 var p_address_1 				= $('#p_address_1').val();
	 var p_district_1 				= $('#p_district_1').val();
	 var p_state_1 					= $('#p_state_1').val();
	 var p_pincode_1 				= $('#p_pincode_1').val();
	 var p_mobile_1 				= $('#p_mobile_1').val();
	 var p_email_1 					= $('#p_email_1').val();
	 var p_center_name_1 			= $('#p_center_name_1').val();
	 var p_center_address_1 		= $('#p_center_address_1').val();
	 var p_center_state_1 			= $('#p_center_state_1').val();
	 var p_center_district_1 		= $('#p_center_district_1').val();
	 var p_pincode_1				= $('#p_pincode_1').val();
	 var p_center_contact_number_1 	= $('#p_center_contact_number_1').val();
	 var p_center_email_1			= $('#p_center_email_1').val();
	 var p_center_floor_1			= $('#p_center_floor_1').val();
	 var p_center_property_1		= $('#p_center_property_1').val();
	 var p_agreement_signed_1		= $('#p_agreement_signed_1').val();
	 var p_agreement_end_date_1		= $('#p_agreement_end_date_1').val();
	 var p_agreement_renewal_date_1	= $('#p_agreement_renewal_date_1').val();
	 if(p_name_1!='' && p_name_2_1!='' && p_f_name_1!='' && p_aadhar_number_1!='' && p_address_1!='' && p_district_1!='' && p_state_1!='' && p_pincode_1!='' && p_mobile_1!=''&& p_email_1!='' && p_center_name_1!='' && p_center_address_1!='' && p_center_state_1!='' && p_center_district_1!='' && p_pincode_1!='' && p_center_contact_number_1!='' && p_center_email_1!='' && p_center_floor_1!='' && p_center_property_1!='' && p_agreement_signed_1!='' && p_agreement_end_date_1!='' && p_agreement_renewal_date_1!='')
	 {
			$.ajax({
			type: 'post',
			url: 'forms.php',
			data: $('#partners_add').serialize(),
			success: function (result) { 
				if(result==1)
				{
				  $('.msg').addClass('text-success font-weight-bold');
				  $('.msg').html('Partners Details Addedd Successfully!');	
				  $('#partners_add')[0].reset();
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
</script>
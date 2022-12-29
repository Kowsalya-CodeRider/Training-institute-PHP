<?php 
include('main_head.php');
session_start();
include('db_connect.php');
$pemail = $_SESSION['p_email'];
$psql = "select p_password from partners where p_email='$pemail'";
$presult = mysqli_query($con,$psql);
$poutput = mysqli_fetch_assoc($presult);
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
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Login Details</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">PARTNER DETAILS</a>
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
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">NAME OF THE PARTNER2</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">FATER NAME*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">AADHAR NUMBER*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">ADDRESS*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">DISTRICT*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">STATE*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">PINCODE*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">MOBILE NUMER*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">MAIL ID*</td>
																	<td>test</td>																	
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
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">ADDRESS*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">DISTRICT*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">STATE*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">PINCODE*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">CENTRE MOBILE/LANDLINE NUMBER*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">CENTRE MAIL ID*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">FLOOR AREA (Sq. Ft)*</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">PROPERTY*</td>
																	<td> RENTAL		</td>																																										
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
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">AGGREMENT END DATE</td>
																	<td>test</td>																	
																</tr>
																<tr>
																	<td scope="row">NEXT RENEWAL DATE</td>
																	<td>test</td>																	
																</tr>																																
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                           
                                        </div>
										
										
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="NameSurname" placeholder="Name Surname" value="<?=$_SESSION["p_email"];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="<?=$poutput['p_password'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" id="change_password" action="#">
                                            <div class="msg" align="center"></div>													
											<div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>
											<input name="change_password" type="hidden">
											<input name="p_email" type="hidden" value="<?=$_SESSION['p_email']?>">
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button onclick="return password_setting()" class="btn btn-danger">SUBMIT</button>
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
function password_setting()
{
	 var OldPassword = $('#OldPassword').val();
	 var NewPassword = $('#NewPassword').val();
	 var NewPasswordConfirm = $('#NewPasswordConfirm').val();
	 if(OldPassword!='' && NewPassword!='' && NewPasswordConfirm!='')
	 {
		 if(NewPassword==NewPasswordConfirm)
		 {
				 $.ajax({
				type: 'post',
				url: 'forms.php',
				data: $('#change_password').serialize(),
				success: function (result) {
					if(result==1)
					{
					  $('.msg').addClass('text-success font-weight-bold');
					  $('.msg').html('Password updated Successfully!');
					  location.reload();
					}
					else
					{
					  $('.msg').addClass('text-danger font-weight-bold');
					  $('.msg').html('Sorry! Password Not Updated');					 
					}				 
				}
			  });			 
		 }
		 else
		 {
			 $('.msg').addClass('text-danger font-weight-bold');
			 $('.msg').html('New Password and Confirm Password Does not Match');			 
		 }
	 }
	 return false;
}
</script>
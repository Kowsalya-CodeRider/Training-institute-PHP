<?php 
include('main_head.php');
session_start();
include('db_connect.php');
$st_id = $_SESSION['st_id']; 
$stsql = "select * from students where st_id='$st_id'";
$stqry = mysqli_query($con,$stsql);
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
      <?php include('student_leftsidebar.php');?>
       
    </section>

  <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">               
                <div class="col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                   <li role="presentation"><a href="#view_student" aria-controls="settings" role="tab" data-toggle="tab">Welcome to Innovoskill Technologies</a></li>                             
									</ul>

                                <div class="tab-content">
                                 
                                 
                                
									
									
									
									<!--<div role="tabpanel" class="tab-pane fade in" id="view_student">-->
                                        
										
										<?php while($row = mysqli_fetch_array($stqry)){?>
										<form class="form-horizontal" id="student_view_1">										
										 <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label"> NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_name_1" name="s_name_1" value="<?=$row['st_name'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label"> FATHER NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_f_name_1" name="s_fname_1" value="<?=$row['st_f_name'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label"> AADHAR NUMBER</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_aadhar_number_1" name="s_aadhar_number_1" value="<?=$row['st_aadhar_number'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label"> ADDRESS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_address_1" name="s_address_1" value="<?=$row['st_address'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label"> DISTRICT</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_district_1" name="s_district_1" value="<?=$row['st_district'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label"> STATE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_state_1" name="s_state_1" value="<?=$row['st_state'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label"> PINCODE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_pincode_1" name="s_pincode_1" value="<?=$row['st_pincode'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label"> MOBILE NUMER</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_mobile_1" name="s_mobile_1" value="<?=$row['st_mobile'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label"> EMAIL</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_email_1" name="s_mailid_1" value="<?=$row['st_email'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_name_1" name="s_designation_1" value="<?=$row['c_name'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE CODE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_code_1" name="s_bte_1" value="<?=$row['c_code'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE DETAILS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_c_details_1" name="s_bte_1" value="<?=$row['st_c_details'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">COURSE FEE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="c_fee_1" name="s_bte_1" value="<?=$row['c_fee'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">TOTAL FEE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_tot_fee_1" name="s_bte_1" value="<?=$row['st_tot_fee'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">PAID</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_paid_1" name="s_bte_1" value="<?=$row['st_paid'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">BALANCE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_balance_1" name="s_bte_1" value="<?=$row['st_balance'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DATE OF JOINING</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="date" class="form-control" id="st_doj_1" name="s_bte_1" value="<?=$row['st_doj'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">STATUS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_status_1" name="s_bte_1" value="<?=$row['st_status'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">DATE OF COMPLETE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="date" class="form-control" id="st_doc_1" name="s_bte_1" value="<?=$row['st_doc'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>											
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">CERTIFICATE STATUS</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="st_certification_status_1" name="s_bte_1" value="<?=$row['st_certification_status'];?>" readonly>
                                                    </div>
                                                </div>
                                            </div>											
										</form>																													
                                    <!--</div>-->
										<?php } ?>
									
									
									
									
									
									
									
									
									
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
	
</body>

</html>

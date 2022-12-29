<?php 
include('admin_head.php');
session_start();
include('db_connect.php');
$st_sql = "select * from roi";
$st_query = mysqli_query($con,$st_sql);
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
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">ROI List</a></li>
                                    <li role="presentation"><a href="#roi_view" aria-controls="settings" role="tab" data-toggle="tab">View ROI Details</a></li>
                               </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">                                                  
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">ROI DETAILS</a>
                                                        </h4> 
														<p>ROI: Return on Investment (ROI) is a performance measure used to evaluate the efficiency of an investment or compare the efficiency of a number of different investments. ROI tries to directly measure the amount of return on a particular investment, relative to the investment's cost.
</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                     <div class="body table-responsive">
														<table class="table">                              
															<thead>
															<th>S.No</th>
															<th>Date</th>
															<th>Product Name</th>
															<th>Course Fee</th>																
															</thead>
															<tbody>                                                               
																<?php while($row = mysqli_fetch_array($st_query))
																{	?>
																<tr>
																	<td scope="row"><?=$row['roi_id'];?></td>
																	<td><?=$row['roi_date'];?></td>	
																	<td><?=$row['roi_p_name'];?></td>
																	<td><?=$row['roi_c_fee'];?></td>
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                  
										
                                    </div>
                                 
									
									
									   <div role="tabpanel" class="tab-pane fade in" id="roi_view">
										<div class="msg" align="center"></div>
										<form class="form-horizontal">
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">SEARCH ROI</label>
                                                <div class="col-sm-7">
                                                    <div class="form-line"> 
														<input type="text" class="form-control" name="search_roi" id="search_roi" placeholder="Search your ROI Details Here..">
												   </div>
                                                </div>
												<div class="col-sm-2">
												<button onclick="return roi_search();" class="btn btn-info">SEARCH</button>
												</div>
                                            </div>                      
                                        </form>
                                        <form class="form-horizontal" id="roi_view_1" style="display:none">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">DATE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="roi_date_1" name="roi_date_1" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">PRODUCT NAME</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="roi_p_name_1" name="roi_p_name_1"  readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">COURSE FEE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="roi_c_fee_1" name="roi_c_fee_1"  readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">OFFERED FEE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="roi_o_fee_1" name="roi_o_fee_1"  readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">NUMBER OF REGISTRATION</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="roi_no_reg_1" name="roi_no_reg_1"  readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">TOTAL</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="roi_total_1" name="roi_total_1"  readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">INVESTMENT FOR MARKETING</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="roi_iom_1" name="roi_iom_1" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">BALANCE</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="roi_balance_1" name="roi_balance_1" readonly>
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
</body>

</html>
<script>
$(document).ready(function () {
        $('#search_roi').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "roi_search.php",
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

function roi_search()
{
	 var search_roi = $('#search_roi').val(); 
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {search_roi:search_roi},
			success: function (result) {
				if(result == null || result == '' || result == 'null')
				{
					$('#roi_view_1').css('display','none');
					alert('Sorry! No ROI Found');
				}
				else
				{						
					$('#roi_view_1').css('display','block');
					var parsedJson = $.parseJSON(result);				
					$('#roi_date_1').val(parsedJson.roi_date);
					$('#roi_p_name_1').val(parsedJson.roi_p_name);
					$('#roi_c_fee_1').val(parsedJson.roi_c_fee);
					$('#roi_o_fee_1').val(parsedJson.roi_o_fee);
					$('#roi_no_reg_1').val(parsedJson.roi_no_reg);
					$('#roi_total_1').val(parsedJson.roi_total);
					$('#roi_iom_1').val(parsedJson.roi_iom);
					$('#roi_balance_1').val(parsedJson.roi_balance);					
				}
								
			}
		  });
	return false;
}	

</script>
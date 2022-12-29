  <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=isset($_SESSION['p_name'])? $_SESSION["p_name"]: 'John Doe' ?></div>
                    <div class="email"><?=isset($_SESSION['p_email'])? $_SESSION["p_email"]: 'john.doe@example.com' ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile"><i class="material-icons">person</i>Profile</a></li>                   
                            <li role="separator" class="divider"></li>
                            <li><a href="#" onclick="return partners_signout()"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="partners_dashboard_1">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile">
                            <i class="material-icons">text_fields</i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="staff">
                            <i class="material-icons">layers</i>
                            <span>Staff details</span>
                        </a>
                    </li>
                       
                    <li>                      
						 <a href="innovaskill_course_fee">
                            <i class="material-icons">view_list</i>
                            <span>Innovaskill Course Fee</span>
                        </a>
                    </li>
                    <li>                       						
						 <a href="student_registration">
                            <i class="material-icons">assignment</i>
                            <span>Student Registration</span>
                        </a>
                    </li>
                    <li>
                        <a href="request">
                            <i class="material-icons">update</i>
                            <span>Request</span>
                        </a>
                    </li>
					<li>
                        <a href="roi">
                            <i class="material-icons">pie_chart</i>
                            <span>ROI</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <!--<div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>-->
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
<script>
function partners_signout()
{
	 var signout = 'signout'; 
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {signout:signout},
			success: function (result) {
				if(result == null || result == '' || result == 'null')
				{					
					alert('Sorry! Your Data Having an Error');
				}
				else
				{						
					alert('Signout Successfully!');
					 window.location.href='partners_signin';
				}
								
			}
		  });
}
</script>
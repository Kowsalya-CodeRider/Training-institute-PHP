  <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=isset($_SESSION['a_name'])? $_SESSION["a_name"]: 'John Doe' ?></div>
                    <div class="email"><?=isset($_SESSION['a_email'])? $_SESSION["a_email"]: 'john.doe@example.com' ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile"><i class="material-icons">person</i>Profile</a></li>                   
                            <li role="separator" class="divider"></li>
                            <li><a href="#" onclick="return admin_logout()"><i class="material-icons">input</i>Sign Out</a></li>
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
                        <a href="partners_admin_dashboard">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="partners_profile">
                            <i class="material-icons">text_fields</i>
                            <span>Partners Profiles</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_staff">
                            <i class="material-icons">layers</i>
                            <span>Staff details - Partners Center</span>
                        </a>
                    </li>
                       
                    <li>                      
						 <a href="admin_course_permission">
                            <i class="material-icons">view_list</i>
                            <span>Innovaskill Course Permission</span>
                        </a>
                    </li>
                    <li>                       						
						 <a href="admin_students">
                            <i class="material-icons">assignment</i>
                            <span>Student Details - Partners Centers</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_request">
                            <i class="material-icons">update</i>
                            <span>Request from Partners</span>
                        </a>
                    </li>
					<li>
                        <a href="admin_roi">
                            <i class="material-icons">pie_chart</i>
                            <span>ROI from Partners</span>
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
function admin_logout()
{
	 var logout = 'admin_logout'; 
	 $.ajax({
			type: 'post',
			url: 'forms.php',
			data: {admin_logout:logout},
			success: function (result) {
				if(result == null || result == '' || result == 'null')
				{					
					alert('Sorry! Your Data Having an Error');
				}
				else
				{						
					alert('Logout Successfully!');
					 window.location.href='admin_login';
				}
								
			}
		  });
}
</script>
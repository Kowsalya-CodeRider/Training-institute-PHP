<?php 
include('header.php');
  
	 $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
	 if($curPageName=='training.php')
	 {
		 $h2 = 'Our Trending Courses';
	 }
	 else if($curPageName=='single_course.php')
	 {				
		$c_image = $c_result['c_image'];
		$c_content = $c_result['c_content'];
		$h2 = 'COURSE : '.$c_title;
	 }
	 else if($curPageName=='single_blog.php')
	 {				
		$b_title = $b_result['b_title'];
		$b_description = $b_result['b_description'];
		$b_learn = $b_result['b_learn'];
		$b_application = $b_result['b_application'];
		$b_company = $b_result['b_company'];
		$b_role = $b_result['b_role'];
		$b_learn_who = $b_result['b_who_learn'];
		$h2 = 'BLOG : '.$b_title;
	 }
	 else if($curPageName=='service.php')
	 {							
		 $h2 = 'Our Services';
	 }
	 else if($curPageName=='placements.php')
	 {	
		$t_sql = "select t_name,t_image,t_company from testimonials where is_testimonial=0";
		$t_result = mysqli_query($con,$t_sql);
		 $h2 = 'Our Placements';
	 }
	  else if($curPageName=='job_seekers.php')
	 {	
		$j_sql = "select j_id,j_title,j_salary,j_location,j_date_posted from jobs";
		$j_result = mysqli_query($con,$j_sql);
		 $h2 = 'Job Seekers';
	 }
	 else if($curPageName=='college_activity.php')
	 {	
		$j_sql = "select j_id,j_title,j_salary,j_location,j_date_posted from jobs";
		$j_result = mysqli_query($con,$j_sql);
		$h2 = 'College Events';
	 }
	  else if($curPageName=='kids_keep_learning.php')
	 {	
		$c_sql = "SELECT c_id,c_title,c_short_form,c_duration,c_description,c_image FROM courses WHERE is_kids='1'";
        $cres_data = mysqli_query($con,$c_sql);
		$h2 = 'Kids Keep Learning';
	 }
	 else if($curPageName=='associate_with_us.php')
	 {	
		$h2 = 'Associate With Us';
	 }
	 else if($curPageName=='diploma_pg_program.php')
	 {	
		$c_sql = "SELECT c_id,c_title,c_short_form,c_duration,c_description,c_image FROM courses WHERE is_kids='2'";
        $cres_data = mysqli_query($con,$c_sql);
		$h2 = 'Why Diploma/Master Program?';
	 }
	 else if($curPageName=='blog.php')
	 {	
		$h2 = 'Innovaskill Blogs';
	 }
	 else if($curPageName=='indian_candidates.php' || $curPageName=='other_candidates.php')
	 {	
		$h2 = 'Admission Form';
	 }
	 else {
		  $h2 = 'Title';
	 }
?>

		<!-- Banner -->
			<section id="banner" style="padding: 2em 0 0em 0;">
			<div class="fixed-top" id="top_bar">
				
				<table id="top_font" class="font-weight-bold">	
					<tr align="right">
					
					<td>
					mail : 
						<a href="mailto:info@innovaskill.in" class="text-dark font-weight-bold" target="_blank">info@innovaskill.in</a>
					&nbsp;
					call : </i><a href="#" class="text-dark font-weight-bold" target="_blank"> +91 9095065071/ +91 6380206760</a>
					</td>
					</tr>
				</table>
				</div>
								 <nav class="navbar fixed-top navbar-expand-lg navbar-bar navbar-light border border-inno bg-white text-center">
   <a class="navbar-brand" href="index.php">
    <img src="images/ITPL_LOGO.png" width="175" id="i_logo" alt="">
  </a>
  <a class="navbar-brand" >
  <img src="images/MSME_AND_ISO.png" width="175" id="i_logo" alt="">
  </a>
  <button class="navbar-toggler"  id="i_menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon text-primary"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				
    <ul class="navbar-nav mr-auto border border-inno">
      <li class="nav-item active">
        <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="about_us_scroll()">About Us</a>
      </li>
      
      <li class="nav-item dropdown open" id="service_id">
        <!--<a class="nav-link" href="service">SERVICES</a>-->
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
		<div class="dropdown-menu border border-inno" id="service_dropdown">
		  <a class="dropdown-item" href="service"> - Industrial services</a>
		  <a class="dropdown-item" href="associate_with_us"> - Associate with us</a>
		</div>
      </li>
	  
	    <li class="nav-item dropdown open" id="training_id">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Training</a>
		<div class="dropdown-menu border border-inno" id="training_dropdown">		 
		  <div class="dropright">
		 <a class="dropdown-item dropdown-toggle" id="technology_id"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			- Technology Learning
		</a>
	  <div class="dropdown-menu border border-inno" id="technology_dropdown">
		<!-- Dropdown menu links -->
		<a class="dropdown-item" href="training"> - Courses</a>
		<a class="dropdown-item" href="diploma_pg_program"> - Diploma / PG Program</a>
	  </div>
		</div>
		  <a class="dropdown-item" href="kids_keep_learning"> - Kids Keep Learning</a>
		   <a class="dropdown-item" href="college_activity"> - College Activity</a>
		   <div class="dropright">
				 <a class="dropdown-item dropdown-toggle" id="registrationform_id"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					- Registration Form
				</a>
			  <div class="dropdown-menu border border-inno" id="registration_dropdown">
				<!-- Dropdown menu links -->
				<a class="dropdown-item" href="indian_candidates"> - Indian Candidates</a>
				<a class="dropdown-item" href="other_candidates"> - Other Countries</a>
			  </div>
			</div>
		</div>
      </li>
	 
	   <li class="nav-item dropdown open" id="carrer_id">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Careers</a>
		<div class="dropdown-menu border border-inno" id="carrer_dropdown">
		  <a class="dropdown-item" href="job_seekers"> - Job seekers</a>
		  <a class="dropdown-item" href="placements"> - Placements</a>
		  <a class="dropdown-item" href="#" id="testimonial_scroll"> - Testimonial</a>
		  <a class="dropdown-item" href="#" id="whatwe_scroll"> - What We Deal With</a>
		</div>
      </li>
	  
	   <li class="nav-item">
        <a class="nav-link" href="blog">Blog</a>
      </li>
	  
	
	  
	  <li class="nav-item dropdown open" id="login_id">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
		<div class="dropdown-menu border border-inno" id="login_dropdown">
		  <a class="dropdown-item" href="#" onclick="openNav()"> - Students Login</a>
		  <a class="dropdown-item" href="#"> - Partners Login</a>
		  <!--<a class="dropdown-item" href="#" id="#"> - Make a Payment</a>-->
		</div>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" href="#" id="contact_scroll">Contact</a>
      </li>
    </ul>
   
  </div>
</nav> 
			<br><br><br><br><br><br><br>
			<header>
						<h2 class="text-dark">
						<?= $h2;?>
						
						</h2>
					</header>
			</section>
			
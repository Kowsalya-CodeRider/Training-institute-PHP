<?php 
include('db_connect.php');
$c_sql = "select c_id,c_title,c_short_form,c_duration from courses";
$c_result = mysqli_query($con,$c_sql);
?>
<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<link rel="icon" type="image/png" sizes="16x16" href="images/inno_logo_1.png">
		<?php
		 $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
		 if($curPageName=='single_course.php')
		 {
			 $c_id = $_GET['id'];
			 $c_sql = "select c_id,c_title,c_description,c_image,c_content from courses where c_id='$c_id'";
			 $c_query = mysqli_query($con,$c_sql);
			 $c_result = mysqli_fetch_assoc($c_query); 
			 $c_title = $c_result['c_title'];
			 $c_description = $c_result['c_description'];
		?>
		<title><?=$c_title;?> - Innovaskill Technologies</title>		
		<meta charset="utf-8" />
		<meta name="description" content="<?=$c_description;?>">
		<meta name="keywords" content="technical course in india,technical course,training center,training institute,training institute in bangalore,embedded training center in bangalore,electrical training center in bangalore,matlab training centres in bangalore,c training in bangalore,ccna training center in bangalore,aws training center in bangalore">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php
		 }
		  else if($curPageName=='single_blog.php')
		 {
			 $b_id = $_GET['b_id'];
			 $b_sql = "select courses.c_title,blogs.b_id,blogs.b_title,blogs.b_description,blogs.b_learn,blogs.b_application, 
		blogs.b_company,blogs.b_role,blogs.b_who_learn from blogs 
		inner join courses on courses.c_id=blogs.b_course where blogs.b_id=$b_id";
			 $b_query = mysqli_query($con,$b_sql);
			 $b_result = mysqli_fetch_array($b_query); 
			 $b_title = $b_result['b_title'];
			 $b_description = $b_result['b_description'];
		?>
		<title><?=$b_title;?> - Innovaskill Technologies</title>		
		<meta charset="utf-8" />
		<meta name="description" content="<?=$b_description;?>">
		<meta name="keywords" content="technical course in india,technical course,training center,training institute,training institute in bangalore,embedded training center in bangalore,electrical training center in bangalore,matlab training centres in bangalore,c training in bangalore,ccna training center in bangalore,aws training center in bangalore">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php
		 }
		else
		{
		?>
		<title>Innovaskill Technologies</title>
		<meta charset="utf-8" />
		<meta name="description" content="Innovaskill Technologies is a global training company which provides tailor-fit courses to suit individual customer's requirement with our Industry Ready Learning Management System. Our training and development programs will help you to learn and acquire new skills, as well as gain the professional knowledge required to progress in your career. ">
		<meta name="keywords" content="technical course in india,technical course,training center,training institute,training institute in bangalore,embedded training center in bangalore,electrical training center in bangalore,matlab training centres in bangalore,c training in bangalore,ccna training center in bangalore,aws training center in bangalore">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php
		}
		?>
		
		
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="magicscroll/magicscroll.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="magicscroll/magicscroll.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="popper.min.js"></script>
<script src="bootstrap.min.js"></script>

	
<!-- Index page only needed -->
<link rel="stylesheet" href="owl.carousel.min.css" />
<link rel="stylesheet" href="owl.theme.default.min.css" />
<script src="owl.carousel.min.js"></script>
<!-- Index Page only nedded -->
<!-- Whatsapp Files-->
<link rel="stylesheet" href="whatsapp/floating-wpp.css">
<script type="text/javascript" src="whatsapp/floating-wpp.js"></script>	
<!--Whatsapp Files -->	
	</head>
	<body>
	

	
	<div class="fixed-bottom">
		
		<div class="row">
		<div class="col-md-8">
		<div id="myButton"></div>
		<script type="text/javascript">
        $('#myButton').floatingWhatsApp({
            phone: '919095065071',
            popupMessage: 'Hello, how can we help you?',
            message: "Hai, I need a help ?",
            showPopup: true,
            showOnIE: false,
            headerTitle: 'Welcome to Innovaskill Technologies!',
            buttonImage: '<img src="images/whatsapp.svg" />'
        });
</script>	
		</div>
		<div class="col-md-4" id="form-bottom">
						<div id="first_div" onclick="first_div()"><center><a id="index_btn" class="button">Enquiry Now</a></center></div>
						<div id="second_div" style="display:none">
						<a href="#" class="close" id="second_div_close">X</a>
						<div class="badge-inno">
						<center>
						<p id="enquiry-form-header">						
						Please fill out the form below 
						<br> 
						We will get back to you as soon...
						</p>
						</center>
				</div>
						
						<div class="enquiry-form">
						<div class="enq_form">
						<form id="register_form" method="post">
							<div class="field">	
							<div class="field_2">
							<input name="r_name" id="r_name" type="text" placeholder="* Name">
							</div>
							<div class="field_2">
							<input name="r_qualification" id="r_qualification" type="text" placeholder="* Qualification">
							</div>
							<div class="field_2">
							<input name="r_division" id="r_division" type="text" placeholder="* College/Company">
							</div>
							<div class="field_2">
							<input name="r_email" id="r_email" type="email" placeholder="* Email">
							</div>
							<div class="field_2">
							<input name="r_mobile" id="r_mobile" type="text" placeholder="* Mobile">
							</div>
							<div class="field_2">
							<select name="r_course" id="r_course">
							<option value="">Choose Your Course</option>
							<?php
										 while($row = mysqli_fetch_array($c_result)){
											echo "<option value='".$row['c_id']."'>";
												
												echo $row['c_title'];
																					
											echo "</option>";
										}
										?>
							</select>
							</div>
							<div class="field_2">
							<textarea name="r_message" id="r_message" rows="3" placeholder="* Message"></textarea>																																													
							</div>					
							<input name="register" type="hidden">
							<center>
							<a id="form_register" class="button">Submit</a>
							</center>
							
							</div>
							</form>
							</div>
						</div>
						</div>
		
		</div>
		</div>
		
		</div>
			
	
	
	
	<a href="#new_banner" class="scrollToTop">
		<div class="icon1"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
	</a>
		<div id="icon_wrapper">
		<div class="icon1">
		<a target="_blank" class="fuse_social_icons_links"  href="https://www.facebook.com/Innovaskilltechnologies/?modal=admin_todo_tour">	
		<i class="fa fa-facebook-official fb-awesome-social awesome-social"></i>
		</a>
		</div>
		<br>
		<div class="icon1">
		<a target="_blank" class="fuse_social_icons_links" href="https://www.youtube.com/channel/UCFstGLf8IXEElaEyxXutqAg?view_as=subscriber">	
		<i class="fa fa-youtube yt-awesome-social awesome-social"></i>
		</a>
		</div>
		<br>
		<div class="icon1">
		<a target="_blank" class="fuse_social_icons_links" href="https://www.instagram.com/innovaskill/">	
		<i class="fa fa-instagram instagram-awesome-social awesome-social"></i>
		</a>
		</div>
		<br>
		<div class="icon1">
		<a target="_blank" class="fuse_social_icons_links" href="mailto:info@innovaskill.in">	
		<i class="fa fa-envelope-square envelope-awesome-social awesome-social"></i>
		</a>
		</div>
		<br>

</div>
		
<?php 
include('header.php');
$sql = "select t_id,t_name,t_image,t_feedback from testimonials where is_testimonial=1 LIMIT 7";
$result = mysqli_query($con,$sql);
?>

		<!-- Banner -->
			
			
			<section id="new_banner">
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
		  <a class="dropdown-item" href="support/student_signin"> - Students Login</a>
		  <a class="dropdown-item" href="support/partners_signin"> - Partners Login</a>
		  <!--<a class="dropdown-item" href="#" id="#"> - Make a Payment</a>-->
		</div>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" href="#" id="contact_scroll">Contact</a>
      </li>
    </ul>
   
  </div>
</nav> 



	 <div id="myCarousel" class="carousel slide" data-ride="carousel">
	 
     
       
        <div class="carousel-inner">
            <div class="carousel-item active">
               <video autoplay loop muted playsinline id="navcau">
  <source src="images/1BANNER.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
				
            </div>          
			<div class="carousel-item">	
				 <video autoplay loop muted playsinline id="navcau">
  <source src="images/2BANNER.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>	
					
            </div>
			
			<div class="carousel-item">	
				 <video autoplay loop muted playsinline id="navcau">
  <source src="images/3BANNER.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>	
            </div>
			
			<div class="carousel-item">	
				 <video autoplay loop muted playsinline id="navcau">
  <source src="images/4BANNER.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
            </div>
			<div class="carousel-item">	
			 <video autoplay loop muted playsinline id="navcau">
  <source src="images/5BANNER.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>		
					
            </div>
			<div class="carousel-item">	
			 <video autoplay loop muted playsinline id="navcau">
  <source src="images/6BANNER.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>		
					
            </div>
			<div class="carousel-item">	
			 <video autoplay loop muted playsinline id="navcau">
  <source src="images/7BANNER.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>		
					
            </div>
			
			
        </div>
       
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <div class="coneff">
			<span class="carousel-control-prev-icon"></span>
			 </div>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <div class="coneff">
			<span class="carousel-control-next-icon"></span>
			</div>
        </a>
    </div>		
			</section>
			
			
			
	

		<!-- Three -->
			<section id="three" class="wrapper align-center">
			<div class="page-arrow">
               <a id="i1"> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
            </div>
			
			<div class="container" id="move">
			<h3 class="h1set text-white" align="left">Welcome to Innovaskill Technologies</h3>
				<div class="row">					
					<div class="col-md-7">	<br>				
					<p align="left" style="text-align: justify;" class="text-white">
				Innovaskill Technologies is a global training company which provides tailor-fit courses to suit individual 
				customer's requirement with our Industry Ready Learning Management System. Our training and development 
				programs will help you to learn and acquire new skills, as well as gain the professional knowledge required 
				to progress in your career. 
				</p>
				<p align="left" style="text-align: justify;" class="text-white">
				We offer a vast array of practical  & job oriented domain specific courses, 
				be IT software development, Electronic Design Automation, Industrial Automation, Information & Network Security,
				Mechanical & Civil Design, Solar Installation, Digital Marketing and many more Professional courses which 
				are specifically designed to suit the needs of the Industry and also helps you to become an Entrepreneur. 
				</p>
				
					</div>
					<div class="col-md-5"><br>
					
					 <video autoplay loop muted playsinline id="about_gif" class="w-100" controls>
					  <source src="images/aboutus1.mp4" type="video/mp4">
					  Your browser does not support the video tag.
					</video>	
					</div>					
				</div>
			</div>
			
			</section>
			
	 
			
			<section id="gallery" class="wrapper align-center">
			<header>
						<h2>Gallery</h2>
					</header>
			
				<div id="gallery_carousel" class="carousel slide carousel-fade" data-ride="carousel">
					
					
				
       
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
			<div class="inner">
				
				
					<div class="flex flex-3">
						<article>
							<img src="images/plc_panel.jpg">
							<div class="text-block">
							<p>PLC PANEL</p>
							</div>
						</article>
						<article>
							<img src="images/vfd_hmi.jpg">
							<div class="text-block">
							<p>VFD & HMI PANEL</p>
							</div>
						</article>
						<article>
							<img src="images/solar.jpg">
							<div class="text-block">
							<p>SOLAR PANEL</p>
							</div>
						</article>
						
					</div>
				</div>
            </div>
            <div class="carousel-item">
                <div class="inner">
					<div class="flex flex-3">
												
						<article>
							<img src="images/plc_panel_1.jpg">
							<div class="text-block">						
							<p>PLC PANEL</p>
							</div>
						</article>
						<article>
							<img src="images/fvd_hmi_plc.jpg">
							<div class="text-block">
							<p>VFD & HMI & PLC PANEL</p>
							</div>
						</article>
						<article>
							<img src="images/solar_1.jpg">
							<div class="text-block">
							<p>SOLAR PANEL</p>
							</div>
						</article>
						
					</div>
				</div>
            </div>
			<div class="carousel-item">
                <div class="inner">
					<div class="flex flex-3">
												
						<article>
							<img src="images/felt_pressure_tank.jpg">
							<div class="text-block">						
							<p>FELT PRESSURE TANK</p>
							</div>
						</article>
						<article>
							<img src="images/pressure_controller.jpg">
							<div class="text-block">
							<p>PRESSURE CONTROLLER</p>
							</div>
						</article>
						<article>
							<img src="images/college_seminar.jpg">
							<div class="text-block">
							<p>COLLEGE SEMINAR</p>
							</div>
						</article>
						
					</div>
				</div>
            </div>
			<div class="carousel-item">
                <div class="inner">
					<div class="flex flex-3">
												
						<article>
							<img src="images/college_workshop.jpg">
							<div class="text-block">						
							<p>COLLEGE WORKSHOP</p>
							</div>
						</article>
						<article>
							<img src="images/college_seminar_1.jpg">
							<div class="text-block">
							<p>COLLEGE SEMINAR</p>
							</div>
						</article>
						<article>
							<img src="images/step_into_dream_carrer.jpeg">
							<div class="text-block">
							<p>STEP INTO DREAM CARRER</p>
							</div>
						</article>
						
					</div>
				</div>
            </div>
            
        </div>
       
    </div>
				
				
				
		
				
				
				
				
				
			</section>
			
			
			
			
			
					<section id="testimonial" class="wrapper align-center">
			<h2 class="h1set">Innovaskill Technologies - Testimonial</h2>
			
				<div class="container">
					<div class="row">
							<div class="col-lg-12"><br>
                <div class="owl-carousel owl-theme">
					
					<?php
									
										 while($row = mysqli_fetch_array($result)){
											
											echo "<div class='item'>";
											if(empty($row['t_image']))
											{
												echo "<h4><img src='images/inno_logo.png' class='rounded-circle mx-auto'></h4>";												
												
											}
											else
											{
												echo "<h4><img src='innovoskill_admin/" . $row['t_image'] . "' class='rounded-circle mx-auto'></h4>";												
												
											}
												echo "<p>" . $row['t_name'] . "</p>";
												echo "<p>" . $row['t_feedback'] . "</p>";	
													echo "</div>";
										
										}
										?>
                   
                </div>
                <script type="text/javascript">
                    $('.owl-carousel').owlCarousel({
                        loop: true,
                        margin: 0,
                        nav: true,
                        center: true,
                        autoplay: true,
                        autoplayTimeout: 3000,
                        autoplayHoverPause: true,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 1
                            }
                        }
                    })         
				</script>
            </div>
					
      
					</div>
						
						
						
				</div>
				

		
				
					
			</section>
			
			
			
				<section id="whatwe" class="wrapper align-center pt-0">
			
	<h2 class="h1set">What We Deal With</h2>
		<br><br>
		
		<style>
			.MagicScroll a{
				display:none;
			}
			</style>
			<div class="MagicScroll bg-white"data-options="mode: carousel; height: 100px; width:100%; autoplay: 2000; step: 1;">
    <img src="images/1whatwe.png" class="img-responsive"/>
    <img src="images/2whatwe.png" class="img-responsive"/>
    <img src="images/3whatwe.png" class="img-responsive"/>
	 <img src="images/4whatwe.png" class="img-responsive"/>
	  <img src="images/5whatwe.png" class="img-responsive" />
	   <img src="images/6whatwe.png" class="img-responsive"/>
	    <img src="images/7whatwe.png" class="img-responsive"/>
    <img src="images/8whatwe.png" class="img-responsive"/>
    <img src="images/9whatwe.png" class="img-responsive"/>
	 <img src="images/10whatwe.png" class="img-responsive"/>
	  <img src="images/11whatwe.jpg" class="img-responsive" />
	   
</div>
		
		
		
		
			
			
			</section>
			
			
			
			<section id="contact" class="wrapper align-center">
			<div class="container">
				<div class="row">
					
						<div class="col-md-6" align="left">
								<a href="https://www.google.com/maps/place/Innovaskill+Technologies/data=!3m1!4b1!4m2!3m1!1s0x3bae1561a753b37d:0x1ce340f91823652d" target="_blank" itemprop="hasMap" data-tracking-element-type="7">								
								<img src="images/map.png" class="img-fluid">
								</a>
								
						
							<br><br>
						<div class="row">
							<div class="col-md-12">
							<div class="icon1">
							&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp;info@innovaskill.in
							</div>
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
							<div class="icon1" align="left">
							&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;+91 9095065071
							</div>							
							</div>
							
						</div>
						
						<br>
						<div class="row">
							<div class="col-md-12">
								<div class="icon1" align="left">
								&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-book" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Business Hours
								<br>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;Monday - Sunday &nbsp;&nbsp; :  &nbsp; 9:00 AM – 8:00 PM
								
								
								</div>
							</div>
						
						</div>
						
						
                 	
						</div>
						<div class="col-md-6">
							<div class="inner">

								<header><center><h2 id="getin">Get in touch</h2></center></header>

								<form action="#" method="post">

									<div class="field half first">
										<label for="name">Name</label>
										<input name="name" id="name" type="text" placeholder="Name">
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input name="email" id="email" type="email" placeholder="Email">
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
									</div>
									
								</form>
								<footer>
								<ul class="actions">
										<li><a href="#" class="button">Send Message</a></li>
									</ul><br>
								</footer>
						
							</div>
						</div>
					
				</div>
			</div>
			</section>
			
			
		
			
		<?php include('footer.php');?>
		<script src="common_script.js"></script>
<script>
$(document).ready(function(){
$(window).scroll(function(){
if ($(this).scrollTop() > 100) {
    $('.scrollToTop').fadeIn();
} else {
    $('.scrollToTop').fadeOut();
}


});
	

 setInterval(infoani, 5000);
 
function infoani()
{
	 $(".info-column-icon").animate({marginLeft: "+=50px"},2000);
	 $(".info-column-icon").animate({marginLeft: "-=50px"},2000);
}

setInterval(getintouch, 5000);

function getintouch()
{
	$('#getin').animate({fontSize: "30px"},2000);
	$('#getin').animate({fontSize: "50px"},2000);
}




});

function about_us_scroll()
{
	 $('html, body').stop().animate({scrollTop: $('#three').offset().top}, 2000);
}



</script>

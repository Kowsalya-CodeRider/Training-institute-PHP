<?php 
include('header.php');
include('db_connect.php');
$sql = "select c_title,c_short_form,c_duration from courses";
$result = mysqli_query($con,$sql);
$jsql = "select jobs.j_title,jobs.j_description,courses.c_short_form 
		from jobs
		 left join courses on courses.c_id=jobs.c_id";
$jresult = mysqli_query($con,$jsql);

if(isset($_POST['register']))
{
	$r_name = $_POST['r_name'];
	$r_course = $_POST['r_course'];
	$r_email = $_POST['r_email'];
	$r_mobile = $_POST['r_mobile'];
	$r_division = $_POST['r_division'];
	$r_message = $_POST['r_message'];
	
}
?>

		<!-- Banner -->
			<section id="banner">
			<div class="inner">
					<header>
						<h2>Welcome to INNOVASKILL TECHNOLOGIES</h2>
						<br>
						<h2>CAREERS</h2>
					</header>
					</div>
			
			</section>
			
			
			<section id="move" class="wrapper align-center">
			<div class="page-arrow">
               <a id="i1"> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
            </div>
			<h1 class="h1set">Innovoskill Technologies - Careers Courses OFFER </h1>
				
			</section>
			
			
			
			
				<section id="contact" class="wrapper align-center">
			<div class="container">
				<div class="row">
					
						<div class="col-md-6" align="left">
								<header><center><h2 id="getin">Jobs list in India</h2></center></header>
								
								<?php
										 while($row = mysqli_fetch_array($jresult)){
											echo "<ul class='list-group'>";
												echo " <li class='list-group-item'>	";
												
												
												echo "<span class='badge badge-inno badge-pill'>".$row['c_short_form']."</span>&nbsp;<span>".$row['j_title']."</span> 
								<p>".$row['j_description']."</p>";
												
												
												echo "</li>";									
											echo "</ul><br>";
										}
										?>
								
								
							
						</div>
						<div class="col-md-6">
							<div class="inner">

								<header><center><h2 id="getin">Course Register Form</h2></center></header>

								<form action="carrers.php" method="post">

									<div class="field half first">
										<label for="name">Name</label>
										<input name="r_name" id="name" type="text" placeholder="Name">
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input name="r_email" id="email" type="email" placeholder="Email">
									</div>
									
									<div class="field half first">
										<label for="email">Mobile</label>
										<input name="r_mobile" id="name" type="text" placeholder="Mobile">
									</div>
									
									<div class="field half">
										<label for="email">Division</label>
										<select name="r_division">
										<option value="">Choose Your Division</option>
										<option value="student">Student</option>
										<option value="working_person">Working person</option>
										</select>
									</div>
									
									<div class="field">
										<label for="message">Courses </label>
										<select name="r_course">
										<option>Choose Your Courses</option>
										<?php
										 while($row = mysqli_fetch_array($result)){
											echo "<option>";
												
												echo $row['c_title'];
																					
											echo "</option>";
										}
										?>
										</select>
									</div>
									<div class="field">
										<label for="message">Your Query</label>
										<textarea name="r_message" id="message" rows="3" placeholder="Message"></textarea>
									</div>
									
								
								<footer>
								<ul class="actions">
										<li><input type="submit" name="register" class="button" value="Send Message"></li>
									</ul><br>
								</footer>
								</form>
							</div>
						</div>
					
				</div>
			</div>
			</section>
			
			
		
<?php include('footer.php');?>
<script src="common_script.js"></script>

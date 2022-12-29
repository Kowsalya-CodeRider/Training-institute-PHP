<?php include('header_1.php'); ?>


<section><br><br>
<div class="container shadow-lg p-3 mb-5">
<div class="row">
<div class="col-md-6 shadow-lg p-3 mb-5">
 <video autoplay loop muted playsinline id="navcau">
  <source src="images/dpg.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>	
</div>
<div class="col-md-6">
<p class="text-justify">The aim of the Master Program is to gain the in-depth knowledge and critical understanding 
of the theory and principles of the particular field and to empower the students with practical 
knowledge that will improve their productivity in the area and make them stand out as a leader
 in the particular field. This will help the student to use and interface new and different technologies 
 by which the student can have the ability to design and develop new concepts with innovative skills and 
 creative thinking. This Program also provides specialised technical knowledge with many conceptual projects 
 providing the opportunity to practice engineering knowledge, skills, and practices in a realistic development 
 setting with a real-world problem. 																							
</p>
</div>
</div>
																
<div class="row">
<div class="col-md-12">
<h2>Outcome</h2>
<ul class="fa-ul text-justify">
				<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Gain strong knowledge and expertise in the field covering a wide range of skills which will help them to get multiple opportunities.

					
					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				
					 Search for, analysis and synthesis of data and information, with the use of the necessary technology. 

					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Work independently. 
					
					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				
					  Production of free, creative and inductive thinking.

					</li>
					
					
					
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				 Know all the processes and demonstrate their knowledge in designing and developing the loops for the processes.


					
					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Analyse a problem with a systematic approach to troubleshoot the problem occurred.
					
					</li>
					</ul>

</div>

</div>

</div>


<div class="container">
<h4 class="font-weight-bold text-center text-success">What do you want to learn?</h4>
<br>
	<div class="row">
	
	<?php
	while($row = mysqli_fetch_array($cres_data)){
            //here goes the data
			echo '<div class="col-md-3">';
			echo '<div class="card">';
			echo '<img class="card-img-top"  src="innovoskill_admin/'.$row['c_image'].'" alt="Card image" height="200px" weight="200px">';
			echo '<div class="card-body">';
			echo '<h6 class="card-title">'.$row['c_title'].'</h6>';
			echo '<a href="single_course.php?id='.$row['c_id'].'" class="button">Enquiry Now</a>';
			echo ' </div></div><header></header></div>';
		}
	?>
	</div>
<br>
</div>


</section>

<section id="limited_section" class="wrapper align-center">
		<header>
						<h2>Learning is a weapon of Destroying Our Illness....</h2>
					</header>
</section>

<?php include('footer.php');?>
		<script src="common_script.js"></script>

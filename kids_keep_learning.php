<?php include('header_1.php'); ?>


<section class="wrapper">
	<div class="container shadow-lg p-3 mb-5">

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<img src="images/kids_keep_learning.gif" class="img-fluid shadow-lg p-3 mb-5">
			</div>
			<div class="col-md-2"></div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h2 class="h1set" align="center">Learning is a weapon of Destroying Our Illness !!!</h2><br>
				<h4 class="footer_p font-weight-bold another_class_1">Kids’ Keep Learning</h4><br>
				<p class="text-justify">
				Innova for champs’ programme will always finds new and creative ways to get our students excited to learn. 
				Kids champions can join this programming adventure and become talented developers who is capable of writing codes
				in minutes. We are offering those kinds of learning which every parent wish to give their kids - The 
				brilliant mixture of graphics, games and tech wonders. Enjoyable and organized sessions for fundamental 
				structures, modules, functions & coding etc.

				</p>
			</div>			
		</div>

		<br>
		<div class="row">
			<div class="col-md-12">				
				<h4 class="footer_p font-weight-bold another_class_1">Why our champs should code/learn technologies?</h4><br>
				<ul class="fa-ul text-justify">
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
					Bringing out hidden talents: Kids learn languages 
					 to communicate and express their feelings, ideas and outstanding thoughts which strengthens 
					 their verbal and written abilities Coding also possess a language- the amazing 
					 disney world of 0's and 1's which every kids should travel so that children will get to know 
					 the rapidly moving technology world around them and be able to speak the technological wonders around them.
					
									
					</li>
					
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
					Waking up the innovative minds: Programming or coding wonders helps children to experiment new things 
					 and fosters their creativity. Creative minds won't stop and it would be difficult to catch those 
					 butterflies who will fly higher and higher and bloom like little stars.
					
									
					</li>
					
					
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
					Career orientation and Logical skills: In this digital age of transformation, technological skills 
					will help our young champs to be competent and builds up logical and problem-solving skills. This will 
					be a ladder support to students for boost up their confidence, communication, creativity & math skills. 
					The leading companies like JP Morgan, IBM, Amazon Sky etc being the top most recruiters for developers in 
					2019-20.
					
									
					</li>
					
					
						<li><span class="fa-li"><i class="fa fa-book"></i></span>
					Achieves academic progress: For being outstanding in a mass crowd our champs have to be extra ordinary, 
					 through coding children learns how to plan and organize thoughts. This is way to develop critical 
					 thinking and maintain the emotional intelligence. The languages like python, java and swift growth 
					 trend is outstripping similar programming languages.
					
									
					</li>
					
					
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
					Be unique from scratch: Kids can jump straight into technological world and can learn how to 
					 create games, programs, websites and even integrate with robotics. The initial roots must have to 
					 be stronger so that we can sharpen it in future and can become a giant tree of tech expertise.
					
									
					</li>
					
					
					
					
				</ul>
				
															
				
			</div>			
		</div>

		<br>
		<div class="row">
			<div class="col-md-12">				
				<h4 class="footer_p font-weight-bold another_class_1">Why Innovaskill for Young champs?</h4>
				<ul class="fa-ul text-justify">
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Visual appealing and practical sessions given by Innova expert trainers which helps students 
					to learn from basics and builds fundamental logical skills.
					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Games and fun programs to motivate kids and extends the passions for coding on kids beyond the 
					 walls of schools.
					
					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Learning through the methods of graphics and apps makes the students more engaging 
					and helps to impart valuable job skills on students.
					
					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Courseware’s with colourful illustration and catchy notes along with store lines creates 
					deep interest on students.
					
					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Brain storming sessions and awards along with playful exercises will make the students 
					 more creative and develop their insights about tech wonders.
					
					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Dedicated faculties who will give one to one attention to students for imparting the skills 
					 from basics and supports them for experimenting new ideas.
					
					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Daily exercise and application oriented real time learning makes the students more engageable and 
					successful.
					
					</li>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
				Supports kids to learn the widely used programming language through unique 
					examples and programming puzzles.
					
					</li>
					</ul>

					</div>
				</div>
				</p>
			</div>			
		</div>

		
	
		
		
		
		
	</div>

	
	<div class="container" id="output_data"><br>
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
	</div>


</section>
<section id="limited_section" class="wrapper align-center">
		<header>
						<h2>Learning is a weapon of Destroying Our Illness....</h2>
					</header>
</section>

<?php include('footer.php');?>
		<script src="common_script.js"></script>
<script>
$(document).ready(function(){
	$('#form_college_activity').on('click', function(){ 
	
var ca_name = $('#ca_name').val();
var ca_mobile = $('#ca_mobile').val();
var ca_email = $('#ca_email').val();
var ca_message = $('#ca_message').val();
var ca_place = $('#ca_place').val();
var ca_college = $('#ca_college').val();


 if (ca_name.length < 1) {
      $('#ca_name').css('border','1px solid red');
    }
if (ca_mobile.length < 1) {
      $('#ca_mobile').css('border','1px solid red');
    }
if (ca_email.length < 1) {
      $('#ca_email').css('border','1px solid red');
    }
if (ca_message.length < 1) {
      $('#ca_message').css('border','1px solid red');
    }
if (ca_place.length < 1) {
      $('#ca_place').css('border','1px solid red');
    }
if (ca_college.length < 1) {
      $('#ca_college').css('border','1px solid red');
    }

if((ca_name.length < 1) || (ca_mobile.length < 1) || (ca_email.length < 1) || (ca_message.length < 1) || (ca_place.length < 1) || (ca_college.length < 1))  
{
	//alert('fill');
}
else {
	$('#ca_name').css('border', '2px solid #ccc');
	$('#ca_mobile').css('border', '2px solid #ccc');
	$('#ca_message').css('border', '2px solid #ccc');
	$('#ca_email').css('border', '2px solid #ccc');
	$('#ca_place').css('border', '2px solid #ccc');
	$('#ca_college').css('border', '2px solid #ccc');
	 $.ajax({
            type: 'post',
            url: 'forms.php',
            data: $('#college_activity_form').serialize(),
            success: function (result) {
			  $('#result_form').addClass('text-success font-weight-bold');
              $('#result_form').html(result);
			  $('#college_activity_form').trigger("reset");
            }
          });
}
});
});
</script>
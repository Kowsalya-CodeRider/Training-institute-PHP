<?php include('header_1.php'); ?>
<section class="wrapper align-left">

<div class="container">
<div class="row">
<div class="col-md-6">

<h4>Overview</h4><br>

<p class="text-justify"><?php echo $c_description;?></p>



</div>
<div class="col-md-6">
<center><h3>Enquiry Form</h3>
	<p id="result_form"></p></center>
						
						<div class="enquiry-form">
						<div class="enq_form">
						<form id="register_form_1" method="post">
							<div class="field">	
							<div class="field_2">
							<input name="r_name_1" id="r_name_1" type="text" placeholder="* Name">
							</div>
							<div class="field_2">
							<input name="r_qualification_1" id="r_qualification_1" type="text" placeholder="* Qualification">
							</div>
							<div class="field_2">
							<input name="r_division_1" id="r_division_1" type="text" placeholder="* College/Company">
							</div>
							<div class="field_2">
							<input name="r_email_1" id="r_email_1" type="email" placeholder="* Email">
							</div>
							<div class="field_2">
							<input name="r_mobile_1" id="r_mobile_1" type="text" placeholder="* Mobile">
							</div>
							<div class="field_2">
							<select name="r_course_1" id="r_course_1" readonly>
							<option value="<?php echo $c_id;?>" selected><?php echo $c_title;?></option>
							</select>
							</div>
							<div class="field_2">
							<textarea name="r_message" id="r_message_1" rows="3" placeholder="* Message"></textarea>																																													
							</div>					
							<input name="register_1" type="hidden">
							<center>
							<a id="form_register_1" class="button">Submit</a>
							</center>
							
							</div>
							</form>
							</div>
						</div>
						
		
		
</div>
</div>

</div>
<br><br>
<div class="container">
<hr>
<div class="row">
<div class="col-md-12">
<center><h4>Course Content</h4></center>
<div align="right">
<a class="button"><i class="fa fa-download" style="color:#fff"></i> Course Content</a>
</div>
<br><br>


	<div class="row">
	<?php
	$c_c2 = explode(',',$c_content);
	$total_count = count($c_c2);
	$div_count = $total_count/3;
	?>
	<div class="col-md-4">
	<ul class="fa-ul text-justify">
	<?php
		for($k=0;$k<$div_count;$k++)
		{
			?>
			
			
			<li><span class="fa-li"><i class="fa fa-book"></i></span><?php echo $c_c2[$k];?></li>
			
			                                          
			
			<?php
		}
	?>
	</ul>
	</div>
	<div class="col-md-4">
	<ul class="fa-ul text-justify">
	<?php
		$div_count_1 = $div_count+$div_count;
		for($k=$div_count;$k<$div_count_1;$k++)
		{
			?>
			<li><span class="fa-li"><i class="fa fa-book"></i></span><?php echo $c_c2[$k];?></li>
			<?php
		}
	?>
	</ul>
	</div>
	<div class="col-md-4">
	<ul class="fa-ul text-justify">
	<?php
		$div_count_2 = $div_count_1+$div_count;
		for($k=$div_count_1;$k<$div_count_2;$k++)
		{
			?>
			<li><span class="fa-li"><i class="fa fa-book"></i></span><?php echo $c_c2[$k];?></li>
			<?php
		}
	?>
	</ul>
	</div>
	</div>
	



</div>

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

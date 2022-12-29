<?php include('header_1.php'); ?>


<section class="wrapper">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h4 class="footer_p font-weight-bold another_class_1"><?=$b_title;?>:</h4><br>
				<p class="text-justify">
				<?=$b_description;?>

				</p>
			</div>			
		</div>

		<br>
		<div class="row">
			<div class="col-md-12">				
				<h4 class="footer_p font-weight-bold another_class_1">What you will learn?</h4><br>
				<ul class="fa-ul text-justify">
				<?php
					$b_learn_1 = explode(',',$b_learn);
					for($i=0;$i<count($b_learn_1);$i++)
					{
				?>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
					 	<?=$b_learn_1[$i];?>					
					</li>
					<?php } ?>
					
				</ul>
				
															
				
			</div>			
		</div>

		<br>
		
		<div class="row">
		<div class="col-md-12">	
		<h4 class="footer_p font-weight-bold another_class_1">Application of <?=$b_title;?>: </h4><br>
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?php
					$b_application_1 = explode(',',$b_application);
					for($i=0;$i<count($b_application_1);$i++)
					{
				?>
					<img src="innovoskill_admin/uploads/blog/<?=$b_application_1[$i];?>" width="200px" height="200px">
					<?php } ?>
				
			</div>
			<div class="col-md-2"></div>
		</div>
		</div>
		
		<br>
		
		<div class="row">
		<div class="col-md-12">	
		<h4 class="footer_p font-weight-bold another_class_1">Company using <?=$b_title;?>: </h4><br>
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?php
					$b_company_1 = explode(',',$b_company);
					for($i=0;$i<count($b_company_1);$i++)
					{
				?>
					<img src="innovoskill_admin/uploads/blog/<?=$b_company_1[$i];?>" width="200px" height="200px">
					<?php } ?>
			</div>
			<div class="col-md-2"></div>
		</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-12">				
				<h4 class="footer_p font-weight-bold another_class_1">Job Role:</h4>
				<ul class="fa-ul text-justify">
					<?php
					$b_role_1 = explode(',',$b_role);
					for($i=0;$i<count($b_role_1);$i++)
					{
				?>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
					 	<?=$b_role_1[$i];?>					
					</li>
					<?php } ?>
					</ul>

					</div>
				</div>
				
				
				<br>
		<div class="row">
			<div class="col-md-12">				
				<h4 class="footer_p font-weight-bold another_class_1">Who can learn?</h4>
				<ul class="fa-ul text-justify">
					<?php
					$b_learn_who_1 = explode(',',$b_learn_who);
					for($i=0;$i<count($b_learn_who_1);$i++)
					{
				?>
					<li><span class="fa-li"><i class="fa fa-book"></i></span>
					 	<?=$b_learn_who_1[$i];?>					
					</li>
					<?php } ?>
					
					</ul>

					</div>
				</div>
				
				
				</p>
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

<?php include('header_1.php'); ?>


<section class="wrapper align-center">
		
			<div class="container">
			<div class="row">
					<?php
					while($row = mysqli_fetch_array($t_result)){
					?>
					<div class="col-md-3">
						<div class="flex flex-3">
						<article>							
						<img src="innovoskill_admin/<?php echo $row['t_image'];?>" width="250" height="280">							
							<div class="text-block" style="padding:0">
							<h4 class="badge-inno"><?php echo $row['t_name'];?></h4><p><?php echo $row['t_company'];?></p>
							</div>
						</article>
						</div><header></header>
					</div>
					<?php } ?>
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

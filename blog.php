<?php 
include('header_1.php'); 
$sql = "select courses.c_title,blogs.b_id,blogs.b_title,blogs.b_application from blogs inner join courses on courses.c_id=blogs.b_course";
$result = mysqli_query($con,$sql);
?>

<section class="wrapper align-center">

<div class="container">

	<div class="row">
		
		<?php

        while($row = mysqli_fetch_array($result)){
			$i=1;
			?>
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top"  src="innovoskill_admin/uploads/blog/<?=$row['b_application'];?>" alt="Card image" height="200px" weight="200px">
					<div class="card-body">
						<h6 class="card-title text-justify"><?=$row['b_title'];?></h6>
						<a href="single_blog.php?b_id='<?=$row['b_id'];?>'" class="button">Enquiry Now</a>
					</div>
				</div>
				<header></header>
			</div>			
			<?php
			$i++;
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

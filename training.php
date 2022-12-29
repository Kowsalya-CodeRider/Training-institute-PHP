<?php include('header_1.php'); ?>





<section class="wrapper align-center">

<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="enq_form">
<div class="field" style="border:2px solid #EA562C">
<div class="input-group md-form form-sm form-2 pl-0" >
  <input class="form-control my-0 py-1 lime-border" type="text" id="course_search" placeholder="What do you want to learn? " aria-label="Search">
  
</div>
</div>
</div>
</div>

</div>

</div>
<br><br>
<div class="container" id="output_data">

	<div class="row">
		
		<?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 16;
        $offset = ($pageno-1) * $no_of_records_per_page;

       

        $total_pages_sql = "SELECT COUNT(*) FROM courses";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


        $sql = "SELECT c_id,c_title,c_short_form,c_duration,c_description,c_image FROM courses LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
			echo '<div class="col-md-3">';
			echo '<div class="card">';
			echo '<img class="card-img-top"  src="innovoskill_admin/'.$row['c_image'].'" alt="Card image" height="200px" weight="200px">';
			echo '<div class="card-body">';
			echo '<h6 class="card-title text-justify">'.$row['c_title'].'</h6>';
			echo '<a href="single_course.php?id='.$row['c_id'].'" class="button">Enquiry Now</a>';
			echo ' </div></div><header></header></div>';
		}
       
    ?>
			

	</div>
	
	<nav aria-label="Page navigation example">
	 <ul class="pagination justify-content-center">
        <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
		<?php 
		for ($i = 1; $i <= $total_pages; $i++) { 
		?>
		<li class="page-item <?php if($_GET['pageno'] == $i) {echo 'active';} ?>">
		<a href="?pageno=<?php echo $i;?>" class="page-link"><?php echo $i;?></a>
		</li>
   
	<?php
		}
		?>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link" >Last</a></li>
    </ul>
	</nav>
	
</div>

<div class="container">
<div class="row" id="ajax_output">
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
$( "#course_search" ).keyup(function() {	
	var course_search = $('#course_search').val();
	if(course_search=='')
	{
		$('#output_data').css('display','block');
		$('#ajax_output').css('display','none');
	}
	else
	{
		$('#output_data').css('display','none');
		$('#ajax_output').css('display','block');
	}
            $.ajax({
                url: "course_search.php",
                type: "post",
				data: {course_search:course_search},
                success: function(data) { 
					var parsed = $.parseJSON(data);
					var count = parsed.length;
					if(count<1)
					{
						 $('#ajax_output').html('<div class="col-md-12">'+
											'<div class="card">'+
											'<div class="card-body"><h6 class="card-title">No Course Found</h6>'+
											'</div></div><header></header></div>'
											);
					}
					else
					{
						$('#ajax_output').html('');
						$.each(parsed, function (i, obj) {
						  $('#ajax_output').append('<div class="col-md-3">'+
											'<div class="card">'+
											'<img class="card-img-top"  src="innovoskill_admin/'+obj.c_image+'" alt="Card image" height="200px" weight="200px">'+
											'<div class="card-body"><h6 class="card-title">'+obj.c_title+'</h6>'+
											'<a href="single_course.php?id='+obj.c_id+'" class="button">Enquiry Now</a>'+
											'</div></div><header></header></div>'
											);
						});
					}
					
						
					
                  
					
                }
            });
	
	
});
});
</script>
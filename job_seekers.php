<?php 
include('header_1.php'); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if(isset($_POST['carrer']))
{
	$cr_name 			= $_POST['cr_name'];
	$cr_address 		= $_POST['cr_address'];
	$cr_district 		= $_POST['cr_district'];
	$cr_state 			= $_POST['cr_state'];
	$cr_qualification 	= $_POST['cr_qualification'];
	$cr_mobile 			= $_POST['cr_mobile'];
	$cr_mobile_1		= strlen($cr_mobile);
	$cr_email 			= $_POST['cr_email'];
	$cr_division 		= $_POST['cr_division'];
	$cr_message 		= $_POST['cr_message'];	
	$banner				= $_FILES['cr_file']['name']; 
	
	if(empty($cr_name))
	{
		$class1="style='border:1px solid red'";
	}
	if(empty($cr_address))
	{
		$class2="style='border:1px solid red'";
	}
	if(empty($cr_district))
	{
		$class3="style='border:1px solid red'";
	}
	if(empty($cr_state))
	{
		$class4="style='border:1px solid red'";
	}
	if(empty($cr_qualification))
	{
		$class5="style='border:1px solid red'";
	}
	if(empty($cr_mobile))
	{
		$class6="style='border:1px solid red'";
	}
	if($cr_mobile_1<10)
	{
		$class6="style='border:1px solid red'";
	}
	if(empty($cr_email))
	{
		$class7="style='border:1px solid red'";
	}
	if(empty($cr_division))
	{
		$class8="style='border:1px solid red'";
	}
	if(empty($cr_message))
	{
		$class9="style='border:1px solid red'";
	}
	if(empty($banner))
	{
		$class10="style='border:1px solid red'";
	}
	
	if(!empty($cr_name) && !empty($cr_address) && !empty($cr_district) && !empty($cr_state) && !empty($cr_qualification) && !empty($cr_mobile) && !empty($cr_email) && !empty($cr_division) && !empty($cr_message) && !empty($banner) && ($cr_mobile_1<10))
	{
		$expbanner=explode('.',$banner);
		$bannerexptype=$expbanner[1];
		date_default_timezone_set('Australia/Melbourne');
		$date = date('m/d/Yh:i:sa', time());
		$rand=rand(10000,99999);
		$encname=$date.$rand;
		$bannername=md5($encname).'.'.$bannerexptype;
		$bannerpath="innovoskill_admin/uploads/carrer/".$bannername;
		move_uploaded_file($_FILES["cr_file"]["tmp_name"],$bannerpath);
		
		$cr_file 			= "uploads/carrer/".$bannername;
		
		$cr_sql = "insert into carrer(cr_name,cr_address,cr_district,cr_state,cr_qualification,cr_mobile,cr_email,cr_division,cr_message,cr_file) VALUES('$cr_name','$cr_address','$cr_district','$cr_state','$cr_qualification','$cr_mobile','$cr_email','$cr_division','$cr_message','$cr_file')";
		$cr_result = mysqli_query($con,$cr_sql);
		if($cr_result)
		{
			
			$subject = 'Job Seekers Request';
			$message = "<strong>Job Seekers Details</strong> <br> 
						Name : $cr_name <br>
						Address : $cr_address <br> 
						District : $cr_district <br> 
						State : $cr_state <br> 
						Qualification : $cr_qualification <br>
						Email : $cr_email <br> 
						Mobile : $cr_mobile <br> 
						Division : $cr_division <br>
						Resume : <a href='$bannerpath' download>Click to Download</a> <br>
						Message : $cr_message ";
			$altmess = 'test@gmail.com';
			$Mail = sendmail('info@innovaskill.in','Ravi Subramani',$subject,$message,$altmess);
			if($Mail==1)
			{
				$output = "Your Application Send Successfully. Your Details Send into Our InnovaSkill Team ! We will Update you soon...";
			}
			else
			{
				$output = "Your Application Send Successfully. Our InnovaSkill Team will Update you soon...";
			}
			
			
		}		
	}
}

		
		function sendmail($to,$nameto,$subject,$message,$altmess)  {
		  $from  = "director@innovaskill.in"; 
		  $namefrom = "Innovaskill Technologies";
		  $mail = new PHPMailer();
		  $mail->SMTPDebug = 0;
		  $mail->CharSet = 'UTF-8';
		  $mail->isSMTP();
		  $mail->SMTPAuth   = true;
		  $mail->Host   = "mail.privateemail.com";
		  $mail->Port       = 465;
		  $mail->Username   = "director@innovaskill.in";
		  $mail->Password   = "director@2020";
		  $mail->SMTPSecure = "ssl";
		  $mail->setFrom($from,$namefrom);
		  $mail->Subject  = $subject;
		  $mail->isHTML();
		  $mail->Body = $message;
		  $mail->AltBody  = $altmess;
		  $mail->addAddress($to, $nameto);
		  if($mail->send())
		  {
			  return 1;
		  }
		  else
		  {
			  return 0;
		  }  
		  
		  //return $mail->send();
		  
		}
?>


<section class="wrapper align-left">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<img src="images/job_seekers.jpeg" width="700" height="500" class="img-fluid shadow-lg p-3 mb-5">
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			<h3>About Us</h3><br>
			<p>
			<span><i class="fa fa-check" aria-hidden="true"></i></span> Innovaskill Technologies provide best opportunities in various sector such as<br>
			
			</p>
			<ul class="list-unstyled">
			<li>Electronic Design Automation</li> 
			<li>Industrial Automation</li> 
			<li>Information Security</li> 
			<li>Software Development</li> 
			<li>Civil and Mechanical Design</li> 
			<li> Computerised Accounting</li> 
			<li> Digital Marketing</li>
			<li>And many more</li>
	</ul>

<p class="text-justify"><span><i class="fa fa-check" aria-hidden="true"></i></span> Innovaskill is eagerly following up the current requirement of each client and noted the uniquenes, so we provide services based on individual needs and requirements for young talents

under the umbrella of tech and management profession to provide accurate resolutions.

We serves our clients the best to  provide customized solutions by considering Clients’ corporate culture, management style and philosophy.

We work for almost all the sectors and our services are available across nation (PAN)

For any kind of Manpower Requirements please feel free to reach out to us by filling the details below and we will contact you soon.</p>

 

<p class="text-justify"><span><i class="fa fa-check" aria-hidden="true"></i></span> If you wish to be considered for any of our Openings, you may please submit your Curriculum Vitae and We will assist you in the best possible manner.</p>

			</div>
			<div class="col-md-6 shadow-lg p-3 mb-5">
				<center><h3>Careers</h3>
				<p id="result_form" class="text-success font-weight-bold"><?php if(isset($output)){ echo $output;} ?></p></center>						
				<div class="enquiry-form">
				<div class="enq_form">
					<form action="job_seekers.php" id="carrer_form" method="post" enctype="multipart/form-data">
							<div class="field">	
							<div class="field_2">
							<input name="cr_name" <?php if(isset($class1)){ echo $class1;}?> id="cr_name" type="text" placeholder="* Name">
							</div>
							<div class="field_2">
							<textarea name="cr_address" <?php if(isset($class2)){ echo $class2;}?> id="cr_address" rows="3" placeholder="* Address"></textarea>																																													
							</div>
							<div class="field_2">
							<input name="cr_district" <?php if(isset($class3)){ echo $class3;}?> id="cr_district" type="text" placeholder="* District">
							</div>
							<div class="field_2">
							<input name="cr_state" <?php if(isset($class4)){ echo $class4;}?> id="cr_state" type="text" placeholder="* State">
							</div>
							<div class="field_2">
							<input name="cr_qualification" <?php if(isset($class5)){ echo $class5;}?> id="cr_qualification" type="text" placeholder="* Qualification">
							</div>
							<div class="field_2">
							<input name="cr_mobile" <?php if(isset($class6)){ echo $class6;}?> id="cr_mobile" type="text" placeholder="* Mobile">
							</div>
							<div class="field_2">
							<input name="cr_email" <?php if(isset($class7)){ echo $class7;}?> id="cr_email" type="email" placeholder="* Email">
							</div>
							<div class="field_2">
							<select id="cr_division" <?php if(isset($class8)){ echo $class8;}?> name="cr_division">
							<option value="">Choose Your Division</option>
							<option value="Fresher">Fresher</option>
							<option value="Experienced">Experienced</option>
							</select>
							</div>							
							<div class="field_2">
							<textarea name="cr_message" <?php if(isset($class9)){ echo $class9;}?> id="cr_message" rows="3" placeholder="* Message"></textarea>																																													
							</div>	
							<div class="field_2">
							<input name="cr_file" <?php if(isset($class10)){ echo $class10;}?> id="cr_file" type="file" placeholder="* Resume">
							</div>
							<input name="carrer" type="hidden">
							<center>
							<input type="submit" id="form_carrer" class="button" value="Submit">
							</center>							
							</div>
					</form>
							</div>
						</div>		
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12 shadow-lg p-3 mb-5">
				<center><h3>Latest Job Openings</h3></center><br>
				<div class="table-responsive-md">
					<table class="table table-bordered">
						<thead>
						<tr>
						<td>Job Title</td>
						<td>Salary</td>
						<td>Location</td>
						<td>Date Posted</td>
						<td>Apply</td>
						</tr>
						</thead>
						<tbody>
						<?php while($row = mysqli_fetch_array($j_result)){?>
						<tr>
						<td><?php echo $row['j_title'];?></td>
						<td><?php echo $row['j_salary'];?></td>
						<td><?php echo $row['j_location'];?></td>
						<td><?php echo $row['j_date_posted'];?></td>
						<td><a href="#result_form" id="apply" class="button">Apply Now</a></td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
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
<script>
$("#cr_mobile").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
$(document).ready(function(){
	$('#apply').on('click', function(event){
     $('.enquiry-form').css('border','1px solid green');
 });
});
</script>
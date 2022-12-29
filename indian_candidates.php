<?php 
include('header_1.php'); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if(isset($_POST['indian_admission']))
{
	$cr_name 			= $_POST['cr_name'];
	$cr_pname 			= $_POST['cr_pname'];
	$cr_address 		= $_POST['cr_address'];
	$cr_district 		= $_POST['cr_district'];
	$cr_state 			= $_POST['cr_state'];
	$cr_pincode		 	= $_POST['cr_pincode'];
	$cr_aadhar_number 	= $_POST['cr_aadhar_number'];
	$cr_mobile 			= $_POST['cr_mobile'];
	$cr_mobile_1		= strlen($cr_mobile);
	$cr_email 			= $_POST['cr_email'];
	$cr_alterno 		= $_POST['cr_alterno'];
	$cr_alterno_1		= strlen($cr_alterno);
	$cr_joinas  		= $_POST['cr_joinas'];
	$cr_clgcom  		= $_POST['cr_clgcom'];
	$cr_cname	  		= $_POST['cr_cname'];
	$cr_c_code  		= $_POST['cr_c_code'];
	$cr_c_fee   		= $_POST['cr_c_fee'];
	$cr_o_fee   		= $_POST['cr_o_fee'];
	$cr_r_fee   		= $_POST['cr_r_fee'];
	$cr_cr_name   		= $_POST['cr_cr_name'];
	$cr_joining_date	= $_POST['cr_joining_date'];
	$is_indian			= '1';
	
	if(empty($cr_name))
	{
		$class1="style='border:1px solid red'";
	}
	if(empty($cr_pname))
	{
		$class2="style='border:1px solid red'";
	}
	if(empty($cr_address))
	{
		$class3="style='border:1px solid red'";
	}
	if(empty($cr_district))
	{
		$class4="style='border:1px solid red'";
	}
	if(empty($cr_state))
	{
		$class5="style='border:1px solid red'";
	}
	if(empty($cr_pincode))
	{
		$class6="style='border:1px solid red'";
	}
	if(empty($cr_mobile))
	{
		$class7="style='border:1px solid red'";
	}
	if($cr_mobile_1<10)
	{
		$class7="style='border:1px solid red'";
	}
	if(empty($cr_email))
	{
		$class8="style='border:1px solid red'";
	}
	if(empty($cr_alterno))
	{
		$class9="style='border:1px solid red'";
	}
	if($cr_alterno_1<10)
	{
		$class9="style='border:1px solid red'";
	}
	if(empty($cr_joinas))
	{
		$class10="style='border:1px solid red'";
	}
	if(empty($cr_clgcom))
	{
		$class11="style='border:1px solid red'";
	}
	if(empty($cr_cname))
	{
		$class12="style='border:1px solid red'";
	}
	if(empty($cr_c_code))
	{
		$class13="style='border:1px solid red'";
	}
	if(empty($cr_c_fee))
	{
		$class14="style='border:1px solid red'";
	}
	if(empty($cr_o_fee))
	{
		$class15="style='border:1px solid red'";
	}if(empty($cr_r_fee))
	{
		$class16="style='border:1px solid red'";
	}
	if(empty($cr_cr_name))
	{
		$class17="style='border:1px solid red'";
	}
	if(empty($cr_joining_date))
	{
		$class18="style='border:1px solid red'";
	}
	if(empty($cr_aadhar_number))
	{
		$class19="style='border:1px solid red'";
	}
	
	if(!empty($cr_name) && !empty($cr_pname) && !empty($cr_address) && !empty($cr_district) && !empty($cr_state) && !empty($cr_pincode) && !empty($cr_aadhar_number) && !empty($cr_mobile) && !empty($cr_email) && !empty($cr_alterno) && !empty($cr_joinas) && !empty($cr_clgcom) && ($cr_mobile_1==10) && ($cr_alterno_1==10) && !empty($cr_cname) && !empty($cr_c_code) && !empty($cr_c_fee) && !empty($cr_o_fee) && !empty($cr_r_fee) && !empty($cr_cr_name) && !empty($cr_joining_date))
	{
		
		$cr_sql = "insert into admission(cr_name,cr_pname,cr_address,cr_district,cr_state,cr_pincode,cr_aadhar_number,cr_mobile,cr_email,cr_alterno,cr_joinas,cr_clgcom,cr_cname,cr_c_code,cr_c_fee,cr_o_fee,cr_r_fee,cr_cr_name,cr_joining_date,is_indian) VALUES('$cr_name','$cr_pname','$cr_address','$cr_district','$cr_state','$cr_pincode','$cr_aadhar_number','$cr_mobile','$cr_email','$cr_joinas','$cr_clgcom','$cr_alterno','$cr_cname','$cr_c_code','$cr_c_fee','$cr_o_fee','$cr_r_fee','$cr_cr_name','$cr_joining_date','$is_indian')";
		$cr_result = mysqli_query($con,$cr_sql);
		if($cr_result)
		{
			
			$subject = 'Indian Candidates - New Admission';
			$message = "<strong>Candidates Details</strong> <br> 
						Name : $cr_name <br>
						Parents Name : $cr_pname <br>
						Address : $cr_address <br> 
						District : $cr_district <br> 
						State : $cr_state <br> 
						Pincode : $cr_pincode <br>
						Aadhar Number : $cr_aadhar_number <br>
						Email : $cr_email <br> 
						Mobile : $cr_mobile <br> 
						Alter Number : $cr_alterno <br>
						Student/Working/Professor : $cr_joinas <br>
						College/Company : $cr_clgcom <br>
						Course Name : $cr_cname <br>
						Course Code : $cr_c_code <br>
						Actual Course Fee : $cr_c_fee <br>
						Offered Course Fee : $cr_o_fee <br>
						Registration Fee : $cr_r_fee <br>
						Counselor Name : $cr_cr_name <br>
						Course Joinging Date : $cr_joining_date <br> ";						
			$altmess = 'test@gmail.com';
			$Mail = sendmail('info@innovaskill.in','Ravi Subramani',$subject,$message,$altmess);
			if($Mail==1)
			{
				$output = "Your Admission Send Successfully. Your Details Send into Our InnovaSkill Team ! We will Update you soon...";
			}
			else
			{
				$output = "Your Admission Send Successfully. Our InnovaSkill Team will Update you soon...";
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
			<div class="col-md-8 shadow-lg p-3 mb-5">
				<center><h3>ADMISSION FORM (INDIAN CANDIDATES)</h3>
				<p>KINDLY FILL THE FORM AFTER THE REGISTRATION</p>
				<p id="result_form" class="text-success font-weight-bold"><?php if(isset($output)){ echo $output;} ?></p></center>						
				<div class="enquiry-form">
				<div class="enq_form">
					<form action="indian_candidates.php" id="carrer_form" method="post" enctype="multipart/form-data">
							<div class="field">	
							<div class="field_2">
							<input name="cr_name" <?php if(isset($class1)){ echo $class1;}?> id="cr_name" type="text" placeholder="* Name">
							</div>
							<div class="field_2">
							<input name="cr_pname" <?php if(isset($class2)){ echo $class2;}?> id="cr_pname" type="text" placeholder="* Parents Name">
							</div>
							<div class="field_2">
							<textarea name="cr_address" <?php if(isset($class3)){ echo $class3;}?> id="cr_address" rows="3" placeholder="* Address"></textarea>																																													
							</div>
							<div class="field_2">
							<input name="cr_district" <?php if(isset($class4)){ echo $class4;}?> id="cr_district" type="text" placeholder="* District">
							</div>
							<div class="field_2">
							<input name="cr_state" <?php if(isset($class5)){ echo $class5;}?> id="cr_state" type="text" placeholder="* State">
							</div>
							<div class="field_2">
							<input name="cr_pincode" <?php if(isset($class6)){ echo $class6;}?> id="cr_pincode" type="text" placeholder="* Pincode">
							</div>
							<div class="field_2">
							<input name="cr_aadhar_number" <?php if(isset($class19)){ echo $class19;}?> id="cr_aadhar_number" type="text" placeholder="* Aadhar Number">
							</div>	
							<div class="field_2">
							<input name="cr_email" <?php if(isset($class8)){ echo $class8;}?> id="cr_email" type="email" placeholder="* Email">
							</div>
							<div class="field_2">
							<input name="cr_mobile" <?php if(isset($class7)){ echo $class7;}?> id="cr_mobile" type="text" placeholder="* Mobile">
							</div>
							<div class="field_2">
							<input name="cr_alterno" <?php if(isset($class9)){ echo $class9;}?> id="cr_alterno" type="text" placeholder="* Alter Number">
							</div>
							<div class="field_2">
							<select id="cr_joinas" <?php if(isset($class10)){ echo $class10;}?> name="cr_joinas">
							<option value="">* Student/Working/Professor</option>
							<option value="Student">Student</option>
							<option value="Working">Working</option>
							<option value="Professor">Professor</option>
							</select>
							</div>
							<div class="field_2">
							<input name="cr_clgcom" <?php if(isset($class11)){ echo $class11;}?> id="cr_clgcom" type="text" placeholder="* College/Company Name">
							</div>
							<div class="field_2">
							<input name="cr_cname" <?php if(isset($class12)){ echo $class12;}?> id="cr_cname" type="text" placeholder="* Course Name">
							</div>
							<div class="field_2">
							<input name="cr_c_code" <?php if(isset($class13)){ echo $class13;}?> id="cr_c_code" type="text" placeholder="* Course Code">
							</div>				
							<div class="field_2">
							<input name="cr_c_fee" <?php if(isset($class14)){ echo $class14;}?> id="cr_c_fee" type="text" placeholder="* Actual Course Fee">
							</div>
							<div class="field_2">
							<input name="cr_o_fee" <?php if(isset($class15)){ echo $class15;}?> id="cr_o_fee" type="text" placeholder="* Offered Course Fee">
							</div>
							<div class="field_2">
							<input name="cr_r_fee" <?php if(isset($class16)){ echo $class16;}?> id="cr_r_fee" type="text" placeholder="* Registration Fee">
							</div>
							<div class="field_2">
							<input name="cr_cr_name" <?php if(isset($class17)){ echo $class17;}?> id="cr_cr_name" type="text" placeholder="* Counselor Name">
							</div>
							<div class="field_2">
							<input name="cr_joining_date" <?php if(isset($class18)){ echo $class18;}?> id="cr_joining_date" type="date" placeholder="* Course Joinging Date">
							</div>
							<input name="indian_admission" type="hidden">
							<center>
							<input type="submit" id="form_carrer" class="button" value="Submit">
							</center>							
							</div>
					</form>
							</div>
						</div>		
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<br>
	
		
				
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
$("#cr_alterno").on("keypress keyup blur",function (event) {    
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
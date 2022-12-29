<?php
include('db_connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if(isset($_POST['login_user']))
{
	$u_email = $_POST['u_email'];
	$u_password = $_POST['u_password'];
	
	
	$u_sql = "select u_id from user where u_email='$u_email' and u_password='$u_password'";
	$u_result = mysqli_query($con,$u_sql); 
	$u_result_1 = mysqli_num_rows($u_result);
	if($u_result_1>0)
	{
		$u_output = 1;
		session_start();
		$_SESSION["u_email"] = $u_email;
		$_SESSION["u_password"] = $u_password;
	}
	else
	{
		$u_output = 0;
	}
	echo $u_output;die;
}

if(isset($_POST['register']))
{
	$r_name = $_POST['r_name'];
	$r_course = $_POST['r_course'];
	$r_qry = "select c_title from courses where c_id='$r_course'";
	$r_result = mysqli_query($con,$r_qry);
	$r_output = mysqli_fetch_assoc($r_result);
	$r_data = $r_output['c_title'];
	$r_email = $_POST['r_email'];
	$r_mobile = $_POST['r_mobile'];
	$r_division = $_POST['r_division'];
	$r_message = $_POST['r_message'];
	$r_qualification = $_POST['r_qualification'];
	
	$r_sql = "insert into register(name,email,mobile,c_id,message,division,qualification) values('$r_name','$r_email','$r_mobile','$r_course','$r_message','$r_division','$r_qualification')";
	$r_result = mysqli_query($con,$r_sql);
	if($r_result>0)
	{
		$to = 'info@innovaskill.in';
		$nameto = 'Innovaskill Technologies';
		$subject = 'Course Training  - Enquiry Form';
		$message = '<h3>Training - Enquiry</h3><br>'.
					'Name : '.$r_name.'<br>'.
					'Request Course : '.$r_data.'<br>'.
					'Qualification : '.$r_qualification.'<br>'.
					'Division : '.$r_division.'<br>'.
					'Email : '.$r_email.'<br>'.
					'Mobile : '.$r_mobile.'<br>'.
					'Message : '.$r_message;
		$altmess = '';
		$email_output = sendmail($to,$nameto,$subject,$message,$altmess);
		if($email_output>0)
		{
			$r_output = 'Your Enquiry Submitted Through Email Successfully ! <br> We will get back to soon...';
		}
		else
		{
			$r_output = 'Your Enquiry Submitted Successfully! <br> We will get back to soon...';
		}
		echo $r_output;die;
	}
}

if(isset($_POST['register_1']))
{
	$r_name = $_POST['r_name_1'];
	$r_course = $_POST['r_course_1'];
	$r_qry = "select c_title from courses where c_id='$r_course'";
	$r_result = mysqli_query($con,$r_qry);
	$r_output = mysqli_fetch_assoc($r_result);
	$r_data = $r_output['c_title'];
	$r_email = $_POST['r_email_1'];
	$r_mobile = $_POST['r_mobile_1'];
	$r_division = $_POST['r_division_1'];
	$r_message = $_POST['r_message_1'];
	$r_qualification = $_POST['r_qualification_1'];
	
	$r_sql = "insert into register(name,email,mobile,c_id,message,division,qualification) values('$r_name','$r_email','$r_mobile','$r_course','$r_message','$r_division','$r_qualification')";
	$r_result = mysqli_query($con,$r_sql);
	if($r_result>0)
	{
		$to = 'info@innovaskill.in';
		$nameto = 'Innovaskill Technologies';
		$subject = 'Course Training  - Enquiry Form';
		$message = '<h3>Training - Enquiry</h3><br>'.
					'Name : '.$r_name.'<br>'.
					'Request Course : '.$r_data.'<br>'.
					'Qualification : '.$r_qualification.'<br>'.
					'Division : '.$r_division.'<br>'.
					'Email : '.$r_email.'<br>'.
					'Mobile : '.$r_mobile.'<br>'.
					'Message : '.$r_message;
		$altmess = '';
		$email_output = sendmail($to,$nameto,$subject,$message,$altmess);
		if($email_output>0)
		{
			$r_output = 'Your Enquiry Submitted Through Email Successfully ! <br> We will get back to soon...';
		}
		else
		{
			$r_output = 'Your Enquiry Submitted Successfully! <br> We will get back to soon...';
		}
		echo $r_output;die;
	}
}

if(isset($_POST['user_register']))
{
	$u_name = $_POST['ur_name'];
	$u_email = $_POST['ur_email'];
	$u_mobile = $_POST['ur_mobile'];
	$u_division = $_POST['ur_division'];
	$u_password = $_POST['ur_password'];
	$u_qualification = $_POST['ur_qualification'];
	
	$r_sql = "insert into user(u_name,u_email,u_mobile,u_division,u_password,u_qualification) values('$u_name','$u_email','$u_mobile','$u_division','$u_password','$u_qualification')";
	$r_result = mysqli_query($con,$r_sql);
	if($r_result>0)
	{
		$r_output = 'Registered Successfully!';
		echo $r_output;die;
	}
}

if(isset($_POST['service']))
{
	$s_name = $_POST['s_name'];
	$s_email = $_POST['s_email'];
	$s_mobile = $_POST['s_mobile'];
	$s_message = $_POST['s_message'];
		
	$s_sql = "insert into service(s_name,s_email,s_mobile,s_message) values('$s_name','$s_email','$s_mobile','$s_message')";
	$s_result = mysqli_query($con,$s_sql);
	if($s_result>0)
	{				
		$s_output = 'Your Enquiry Submitted Successfully! Enquiry confirmtion submitted in Our Team. We will get back to soon...';								
	}
	else
	{
		$s_output = 'Your Enquiry Submitted Successfully! We will get back to soon...';
	}
	echo $s_output;die;
}

if(isset($_POST['delete_course']))
{
	$c_id = $_POST['c_id'];
	$cdel_sql = "delete from courses where c_id='$c_id'";
	$cdel_result = mysqli_query($con,$cdel_sql);
	if($cdel_result>0)
	{
		$cdel_output = "Course Delete Successfully";
		echo $cdel_output;die;
	}
}

if(isset($_POST['delete_testimonial']))
{
	$t_id = $_POST['t_id'];
	$tdel_sql = "delete from testimonials where t_id='$t_id'";
	$tdel_result = mysqli_query($con,$tdel_sql);
	if($tdel_result>0)
	{
		$tdel_output = "Testimonial Delete Successfully";
		echo $tdel_output;die;
	}
}

if(isset($_POST['delete_job']))
{
	$j_id = $_POST['j_id'];
	$tdel_sql = "delete from jobs where j_id='$j_id'";
	$tdel_result = mysqli_query($con,$tdel_sql);
	if($tdel_result>0)
	{
		$tdel_output = "Job Delete Successfully";
		echo $tdel_output;die;
	}
}

if(isset($_POST['delete_blog']))
{
	$b_id = $_POST['b_id'];
	$tdel_sql = "delete from blogs where b_id='$b_id'";
	$tdel_result = mysqli_query($con,$tdel_sql);
	if($tdel_result>0)
	{
		$tdel_output = "Blog Delete Successfully";
		echo $tdel_output;die;
	}
}


if(isset($_POST['edit_course']))
{
	$c_image_1 = $_POST['c_image_1'];
	if(empty($_FILES['c_image']['name']))
	{
		$bannerpath = $c_image_1;
	}
	else
	{
		$banner=$_FILES['c_image']['name']; 
		$expbanner=explode('.',$banner);
		$bannerexptype=$expbanner[1];
		date_default_timezone_set('Australia/Melbourne');
		$date = date('m/d/Yh:i:sa', time());
		$rand=rand(10000,99999);
		$encname=$date.$rand;
		$bannername=md5($encname).'.'.$bannerexptype;
		$bannerpath="innovoskill_admin/uploads/training/".$bannername;
		move_uploaded_file($_FILES["c_image"]["tmp_name"],$bannerpath);
		$bannerpath = "uploads/training/".$bannername;
	}
	
	$c_id = $_POST['c_id'];
	$c_kids = $_POST['c_kids'];
	$c_title = $_POST['c_title'];
	$c_short_form = $_POST['c_short_form'];
	$c_duration = $_POST['c_duration'];
	$c_description = $_POST['c_description'];
	
	$c_c1 = $_POST['c_content']; 
	$c_content = implode(',',array_filter($c_c1));
	
	
	$sql = "update courses set c_title='$c_title',c_short_form='$c_short_form',c_duration='$c_duration',c_description='$c_description',c_image='$bannerpath',c_content='$c_content',is_kids='$c_kids' where c_id='$c_id'";
	$result = mysqli_query($con,$sql);
	if($result>0)
	{
		header("location:innovoskill_admin/courses.php");
	}
	else
	{
		$data = 'Course Data having an Error. pls try Again';echo $data;die;
	}
}

if(isset($_POST['edit_job']))
{
	
	$j_id = $_POST['j_id'];
	$j_title = $_POST['j_title'];
	$j_salary = $_POST['j_salary'];
	$j_location = $_POST['j_location'];
	

	$sql = "update jobs set j_title='$j_title',j_salary='$j_salary',j_location='$j_location' where j_id='$j_id'";
	$result = mysqli_query($con,$sql);
	if($result>0)
	{
		header("location:innovoskill_admin/jobs-list.php");
	}
	else
	{
		$data = 'Jobs Data having an Error. pls try Again';echo $data;die;
	}
}

if(isset($_POST['edit_testimonial']))
{
	$t_image_1 = $_POST['t_image_1'];
	if(empty($_FILES['t_image']['name']))
	{
		$bannerpath = $t_image_1;
	}
	else
	{  
		$banner=$_FILES['t_image']['name']; 
		$expbanner=explode('.',$banner);
		$bannerexptype=$expbanner[1];
		date_default_timezone_set('Australia/Melbourne');
		$date = date('m/d/Yh:i:sa', time());
		$rand=rand(10000,99999);
		$encname=$date.$rand;
		$bannername=md5($encname).'.'.$bannerexptype;
		$bannerpath="innovoskill_admin/uploads/testimonials/".$bannername;
		move_uploaded_file($_FILES["t_image"]["tmp_name"],$bannerpath);
		$bannerpath = "uploads/testimonials/".$bannername; 
	}
	$t_id = $_POST['t_id'];
	$t_name = $_POST['t_name'];
	$t_feedback = $_POST['t_feedback'];
	$t_company = $_POST['t_company'];
	$is_testimonial = $_POST['is_testimonial'];
	
	$sql = "update testimonials set t_name='$t_name',t_image='$bannerpath',t_feedback='$t_feedback',t_company='$t_company',is_testimonial='$is_testimonial' where t_id='$t_id'";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		header("location:innovoskill_admin/testimonial.php");
	}
	else
	{
		$data = 'Testimonial Data having an Error. pls try Again';echo $data;die;
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

if(isset($_POST['college_activity']))
{
	$ca_name = $_POST['ca_name'];
	$ca_mobile = $_POST['ca_mobile'];
	$ca_email = $_POST['ca_email'];
	$ca_college = $_POST['ca_college'];
	$ca_place = $_POST['ca_place'];
	$ca_message = $_POST['ca_message'];
	
	
	$r_sql = "insert into college_activity(ca_name,ca_mobile,ca_email,ca_college,ca_place,ca_message) values('$ca_name','$ca_mobile','$ca_email','$ca_college','$ca_place','$ca_message')";
	$r_result = mysqli_query($con,$r_sql);
	if($r_result>0)
	{
		$r_output = 'Your Enquiry Submitted Successfully! We will get back to soon...';
		echo $r_output;die;
	}
}

if(isset($_POST['associate_with']))
{
	$a_name = $_POST['a_name'];
	$a_email = $_POST['a_email'];
	$a_mobile = $_POST['a_mobile'];
	$a_address = $_POST['a_address'];
	$a_message = $_POST['a_message'];
	
	$a_sql = "insert into associate_form(a_name,a_email,a_mobile,a_address,a_message) values('$a_name','$a_email','$a_mobile','$a_address','$a_message')";
	$a_result = mysqli_query($con,$a_sql);
	if($a_result>0)
	{
		$to = 'info@innovaskill.in';
		$nameto = 'Innovaskill Technologies';
		$subject = 'Associate With Us - Enquiry Form';
		$message = '<h3>Associate With Us - Enquiry</h3><br>'.
					'Name : '.$a_name.'<br>'.
					'Email : '.$a_email.'<br>'.
					'Mobile : '.$a_mobile.'<br>'.
					'Message : '.$a_message;
		$altmess = '';
		$email_output = sendmail($to,$nameto,$subject,$message,$altmess);
		if($email_output>0)
		{
			$a_output = 'Your Enquiry Form Resgistered Sent Email Successfully Into Our Team! They Will Contact you soon';
		}
		else
		{
			$a_output = 'Your Enquiry Form Resgistered Successfully! Our Innovaskill Team Will Contact you soon';
		}		
		echo $a_output;die;
	}
	else
	{
		$a_output = 0;
		echo $a_output;die;
	}
}

if(isset($_POST['edit_blog']))
{
	$b_id			= $_POST['b_id'];
	$b_title 		= $_POST['b_title'];
	$b_course 		= $_POST['b_course'];
	$b_description 	= $_POST['b_description'];
	$b_learn_1 		= $_POST['b_learn'];
	$b_learn 		= implode(',',array_filter($b_learn_1));
	$b_role_1 		= $_POST['b_role']; 
	$b_role 		= implode(',',array_filter($b_role_1));
	$b_who_learn_1 	= $_POST['b_who_learn'];
	$b_who_learn 	= implode(',',array_filter($b_who_learn_1));
	
	$sql = "update blogs set b_title='$b_title',b_course='$b_course',b_description='$b_description',
			b_learn='$b_learn',b_role='$b_role',
			b_who_learn='$b_who_learn' where b_id='$b_id'";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		$data = 'Blog Updated Successfully';
		header("location:innovoskill_admin/blog_list.php");
	}
	else
	{
		$data = 'Blog Data having an Error. pls try Again';
	}
}

?>

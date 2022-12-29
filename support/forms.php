<?php
include('db_connect.php');

if(isset($_POST['change_password']))
{
	$change_password = $_POST['NewPasswordConfirm'];
	$p_email = $_POST['p_email'];
	$cp_sql = "update partners set p_password='$change_password' where p_email='$p_email'";
	$cp_result = mysqli_query($con,$cp_sql);
	if($cp_result)
	{
		$data = 1;
	}
	else
	{
		$data = 0;
	}
	echo $data;die;
}

if(isset($_POST['add_staff']))
{
	 $s_name 			= $_POST['s_name'];
	 $s_fname 			= $_POST['s_fname'];
	 $s_aadhar_number 	= $_POST['s_aadhar_number'];
	 $s_address 		= $_POST['s_address'];
	 $s_district 		= $_POST['s_district'];
	 $s_state 			= $_POST['s_state'];
	 $s_pincode 		= $_POST['s_pincode'];
	 $s_mobile 			= $_POST['s_mobile'];
	 $s_mailid 			= $_POST['s_mailid'];
	 $s_designation 	= $_POST['s_designation'];
	 $s_bte 			= $_POST['s_bte'];
	 $p_id				= $_POST['p_id'];
	 $s_sql = "insert into staff (s_name,s_fname,s_aadhar_number,s_address,s_district,s_state,
				s_pincode,s_mobile,s_mailid,s_designation,s_bte,p_id) values('$s_name','$s_fname','$s_aadhar_number',
				'$s_address','$s_district','$s_state','$s_pincode','$s_mobile','$s_mailid','$s_designation',
				'$s_bte','$p_id')";
	$s_result = mysqli_query($con,$s_sql);
	if($s_result)
	{
		$s_data = 1;
	}
	else
	{
		$s_data = 0;
	}
	echo $s_data;die;
}

if(isset($_POST['staff_delete']))
{
	$s_id =$_POST['s_id']; 
	$sd_sql = "delete from staff where s_id='$s_id'";
	$sd_result = mysqli_query($con,$sd_sql);
	if($sd_result)
	{
		$sd_data = 1;
	}
	else
	{
		$sd_data = 0;
	}
	echo $sd_data;die;
}

if(isset($_POST['search_name']))
{
	$search_name = $_POST['search_name'];
	$ss_sql = "select * from staff where s_name='$search_name'";
	$ss_query = mysqli_query($con,$ss_sql);
	$ss_result = mysqli_fetch_array($ss_query);
	echo json_encode($ss_result);die;
}

if(isset($_POST['update_staff']))
{	 
	 $s_id				= $_POST['s_id_2'];
	 $s_name 			= $_POST['s_name_2'];
	 $s_fname 			= $_POST['s_fname_2'];
	 $s_aadhar_number 	= $_POST['s_aadhar_number_2'];
	 $s_address 		= $_POST['s_address_2'];
	 $s_district 		= $_POST['s_district_2'];
	 $s_state 			= $_POST['s_state_2'];
	 $s_pincode 		= $_POST['s_pincode_2'];
	 $s_mobile 			= $_POST['s_mobile_2'];
	 $s_mailid 			= $_POST['s_mailid_2'];
	 $s_designation 	= $_POST['s_designation_2'];
	 $s_bte 			= $_POST['s_bte_2'];
	 $p_id				= $_POST['p_id_2'];
	 $s_sql = "update staff SET s_name='$s_name',s_fname='$s_fname',s_aadhar_number='$s_aadhar_number',
				s_address='$s_address',s_district='$s_district',s_state='$s_state',s_pincode='$s_pincode',
				s_mobile='$s_mobile',s_mailid='$s_mailid',s_designation='$s_designation',s_bte='$s_bte',p_id='$p_id' 				
				where p_id='$p_id' and s_id='$s_id'";
	$s_result = mysqli_query($con,$s_sql);
	if($s_result)
	{
		$s_data = 1;
	}
	else
	{
		$s_data = 0;
	}
	echo $s_data;die;
}

if(isset($_POST['training_request']))
{
	$r_type = '1';
	$r_type_id = $_POST['c_id'];
	$p_id = $_POST['p_id'];
	$r_status = '0';
	$r_date = date('Y-m-d');
	$r_sql = "insert into request(r_type,r_type_id,p_id,r_status,r_date) values('$r_type','$r_type_id','$p_id','$r_status','$r_date')";
	$r_result = mysqli_query($con,$r_sql);
	if($r_result)
	{
		$r_data = 1;
	}
	else
	{
		$r_data = 0;
	}
	echo $r_data;die;
	
}

if(isset($_POST['hardware_request']))
{
	$r_type = '2';
	$r_type_id = $_POST['h_id'];
	$p_id = $_POST['p_id'];
	$r_status = '0';
	$r_date = date('Y-m-d');
	$r_sql = "insert into request(r_type,r_type_id,p_id,r_status,r_date) values('$r_type','$r_type_id','$p_id','$r_status','$r_date')";
	$r_result = mysqli_query($con,$r_sql);
	if($r_result)
	{
		$r_data = 1;
	}
	else
	{
		$r_data = 0;
	}
	echo $r_data;die;
	
}

if(isset($_POST['event_request']))
{
	$r_type = '3';
	$r_type_id = $_POST['e_id'];
	$p_id = $_POST['p_id'];
	$r_status = '0';
	$r_date = date('Y-m-d');
	$r_sql = "insert into request(r_type,r_type_id,p_id,r_status,r_date) values('$r_type','$r_type_id','$p_id','$r_status','$r_date')";
	$r_result = mysqli_query($con,$r_sql);
	if($r_result)
	{
		$r_data = 1;
	}
	else
	{
		$r_data = 0;
	}
	echo $r_data;die;
	
}

if(isset($_POST['insert_student']))
{ 
	$st_code_qry = "select st_id from students order by st_id desc limit 1";
	$st_code_res = mysqli_query($con,$st_code_qry);
	$st_code_out = mysqli_fetch_array($st_code_res);
	if(empty($st_code_out))
	{
		$st_code_1 = '1';
	}
	else
	{
		$st_code_1 = $st_code_out['st_id']+1;
	}
	$y = substr( date('Y'), -2);
	$st_code = 'ITPL'.$y.$st_code_1;
	$st_name 					= $_POST['st_name'];
	$st_f_name 					= $_POST['st_f_name'];
	$st_aadhar_number 			= $_POST['st_aadhar_number'];
	$st_address 				= $_POST['st_address'];
	$st_district 				= $_POST['st_district'];
	$st_state 					= $_POST['st_state'];
	$st_pincode 				= $_POST['st_pincode'];
	$st_mobile 					= $_POST['st_mobile'];
	$st_email 					= $_POST['st_email'];
	$st_c_details 				= $_POST['st_c_details'];
	$c_name 					= $_POST['c_name'];
	$c_code 					= $_POST['c_code'];
	$c_fee 						= $_POST['c_fee'];
	$st_tot_fee 				= $_POST['st_tot_fee'];
	$st_paid 					= $_POST['st_paid'];
	$st_balance 				= $_POST['st_balance'];
	$st_doj 					= $_POST['st_doj'];
	$st_status 					= $_POST['st_status'];
	$st_doc 					= $_POST['st_doc'];
	$st_certification_status 	= $_POST['st_certification_status'];
	$p_id						= $_POST['p_id'];
	$st_sql = "insert into students(st_name,st_f_name,st_aadhar_number,st_address,st_district,st_state,st_pincode,st_mobile,
			   st_email,st_c_details,c_name,c_code,c_fee,st_tot_fee,st_paid,st_balance,st_doj,st_status,st_doc,st_certification_status,p_id,st_code,st_password)
			   values('$st_name','$st_f_name','$st_aadhar_number','$st_address','$st_district','$st_state','$st_pincode','$st_mobile',
			   '$st_email','$st_c_details','$c_name','$c_code','$c_fee','$st_tot_fee','$st_paid','$st_balance','$st_doj','$st_status','$st_doc','$st_certification_status','$p_id','$st_code','$st_code')";
	$st_result = mysqli_query($con,$st_sql);
	if($st_result>0)
	{
		echo '1';die;
	}
	else
	{
		echo '0';die;
	}
}

if(isset($_POST['student_delete']))
{
	$st_id =$_POST['st_id']; 
	$st_sql = "delete from students where st_id='$st_id'";
	$st_result = mysqli_query($con,$st_sql);
	if($st_result)
	{
		$st_data = 1;
	}
	else
	{
		$st_data = 0;
	}
	echo $st_data;die;
}

if(isset($_POST['search_student']))
{
	$search_student = $_POST['search_student'];
	$ss_sql = "select * from students where st_name='$search_student'";
	$ss_query = mysqli_query($con,$ss_sql);
	$ss_result = mysqli_fetch_array($ss_query);
	echo json_encode($ss_result);die;
}

if(isset($_POST['update_student']))
{ 
	$st_id	 					= $_POST['st_id_2'];
	$st_name 					= $_POST['st_name_2'];
	$st_f_name 					= $_POST['st_f_name_2'];
	$st_aadhar_number 			= $_POST['st_aadhar_number_2'];
	$st_address 				= $_POST['st_address_2'];
	$st_district 				= $_POST['st_district_2'];
	$st_state 					= $_POST['st_state_2'];
	$st_pincode 				= $_POST['st_pincode_2'];
	$st_mobile 					= $_POST['st_mobile_2'];
	$st_email 					= $_POST['st_email_2'];
	$st_c_details 				= $_POST['st_c_details_2'];
	$c_name 					= $_POST['c_name_2'];
	$c_code 					= $_POST['c_code_2'];
	$c_fee 						= $_POST['c_fee_2'];
	$st_tot_fee 				= $_POST['st_tot_fee_2'];
	$st_paid 					= $_POST['st_paid_2'];
	$st_balance 				= $_POST['st_balance_2'];
	$st_doj 					= $_POST['st_doj_2'];
	$st_status 					= $_POST['st_status_2'];
	$st_doc 					= $_POST['st_doc_2'];
	$st_certification_status 	= $_POST['st_certification_status_2'];
	$p_id						= $_POST['p_id_2'];
	$st_sql = "update students set st_name='$st_name',st_f_name='$st_f_name',st_aadhar_number='$st_aadhar_number',
				st_address='$st_address',st_district='$st_district',st_state='$st_state',st_pincode='$st_pincode',
				st_mobile='$st_mobile',st_email='$st_email',st_c_details='$st_c_details',c_name='$c_name',
			    c_code='$c_code',c_fee='$c_fee',st_tot_fee='$st_tot_fee',st_paid='$st_paid',st_balance='$st_balance',
				st_doj='$st_doj',st_status='$st_status',st_doc='$st_doc',st_certification_status='$st_certification_status'
				where p_id='$p_id' and st_id='$st_id'";   
	$st_result = mysqli_query($con,$st_sql);
	if($st_result>0)
	{
		echo '1';die;
	}
	else
	{
		echo '0';die;
	}
}

if(isset($_POST['insert_roi']))
{ 
	 $roi_date 		= $_POST['roi_date'];
	 $roi_p_name 	= $_POST['roi_p_name'];
	 $roi_c_fee 	= $_POST['roi_c_fee'];
	 $roi_o_fee 	= $_POST['roi_o_fee'];
	 $roi_no_reg 	= $_POST['roi_no_reg'];
	 $roi_total 	= $_POST['roi_total'];
	 $roi_iom 		= $_POST['roi_iom'];
	 $roi_balance 	= $_POST['roi_balance'];
	 $p_id			= $_POST['p_id'];
	$st_sql = "insert into roi(roi_date,roi_p_name,roi_c_fee,roi_o_fee,roi_no_reg,roi_total,roi_iom,roi_balance,p_id)
			   values('$roi_date','$roi_p_name','$roi_c_fee','$roi_o_fee','$roi_no_reg','$roi_total','$roi_iom','$roi_balance','$p_id')";
	$st_result = mysqli_query($con,$st_sql);
	if($st_result>0)
	{
		echo '1';die;
	}
	else
	{
		echo '0';die;
	}
}

if(isset($_POST['search_roi']))
{
	$search_roi = $_POST['search_roi'];
	$ss_sql = "select * from roi where roi_p_name='$search_roi'";
	$ss_query = mysqli_query($con,$ss_sql);
	$ss_result = mysqli_fetch_array($ss_query);
	echo json_encode($ss_result);die;
}

if(isset($_POST['signout']))
{
	$result = session_destroy();
	if($result)
	{
		echo '1';die;
	}
	else
	{
		echo '0';die;
	}
}

if(isset($_POST['search_partner']))
{
	$search_partner = $_POST['search_partner'];
	$ss_sql = "select * from partners where p_name='$search_partner'";
	$ss_query = mysqli_query($con,$ss_sql);
	$ss_result = mysqli_fetch_array($ss_query);
	echo json_encode($ss_result);die;
}

if(isset($_POST['partners_delete']))
{
	$pt_id =$_POST['pt_id']; 
	$st_sql = "delete from partners where p_id='$pt_id'";
	$st_result = mysqli_query($con,$st_sql);
	if($st_result)
	{
		$st_data = 1;
	}
	else
	{
		$st_data = 0;
	}
	echo $st_data;die;
}

if(isset($_POST['partners_add']))
{ 
	 $p_name_1 					= $_POST['p_name_1'];
	 $p_name_2_1 				= $_POST['p_name_2_1'];
	 $p_f_name_1 				= $_POST['p_f_name_1'];
	 $p_aadhar_number_1 		= $_POST['p_aadhar_number_1'];
	 $p_address_1 				= $_POST['p_address_1'];
	 $p_district_1 				= $_POST['p_district_1'];
	 $p_state_1 				= $_POST['p_state_1'];
	 $p_pincode_1 				= $_POST['p_pincode_1'];
	 $p_mobile_1 				= $_POST['p_mobile_1'];
	 $p_email_1 				= $_POST['p_email_1'];
	 $p_center_name_1 			= $_POST['p_center_name_1'];
	 $p_center_address_1 		= $_POST['p_center_address_1'];
	 $p_center_state_1 			= $_POST['p_center_state_1'];
	 $p_center_district_1 		= $_POST['p_center_district_1'];
	 $p_center_pincode_1		= $_POST['p_center_pincode_1'];
	 $p_center_contact_number_1 = $_POST['p_center_contact_number_1'];
	 $p_center_email_1			= $_POST['p_center_email_1'];
	 $p_center_floor_1			= $_POST['p_center_floor_1'];
	 $p_center_property_1		= $_POST['p_center_property_1'];
	 $p_agreement_signed_1		= $_POST['p_agreement_signed_1'];
	 $p_agreement_end_date_1	= $_POST['p_agreement_end_date_1'];
	 $p_agreement_renewal_date_1= $_POST['p_agreement_renewal_date_1'];
	 $p_password				= 'ITPLPARTNER-'.$p_name_1.'@'.rand(1,1000);
	 $pt_sql = "insert into partners(p_name,p_name_2,p_f_name,p_aadhar_number,p_address,p_district,
				 p_state,p_pincode,p_mobile,p_email,p_center_name,p_center_address,p_center_state,p_center_district,
				 p_center_pincode,p_center_contact_number,p_center_email,p_center_floor,p_center_property,
				 p_agreement_signed,p_agreement_end_date,p_agreement_renewal_date,p_password)
				 values('$p_name_1','$p_name_2_1','$p_f_name_1','$p_aadhar_number_1','$p_address_1','$p_district_1',
				 '$p_state_1','$p_pincode_1','$p_mobile_1','$p_email_1','$p_center_name_1','$p_center_address_1',
				 '$p_center_state_1','$p_center_district_1','$p_center_pincode_1','$p_center_contact_number_1',
				 '$p_center_email_1','$p_center_floor_1','$p_center_property_1','$p_agreement_signed_1',
				 '$p_agreement_end_date_1','$p_agreement_renewal_date_1','$p_password')"; 
	 $pt_result = mysqli_query($con,$pt_sql);
	 if($pt_result)
	{
		$pt_data = 1;
	}
	else
	{
		$pt_data = 0;
	}
	echo $pt_data;die;
}

if(isset($_POST['course_permission']))
{
	$c_id = $_POST['c_list'];
	$p_id = $_POST['p_id'];
	$c_list = implode(',',array_filter($c_id));
	$pcp = "update partners set p_permitted_course='$c_list' where p_id='$p_id'";
	$pcp_result = mysqli_query($con,$pcp);
	if($pcp_result)
	{
		$pcp_data = '1';
	}
	else
	{
		$pcp_data = '0';
	}
	echo $pcp_data;die;
}

if(isset($_POST['request_permission']))
{
	$r_id = $_POST['r_id'];
	$r_type_id = $_POST['r_type_id'];
	if($r_type_id==1)
	{
		$date = date('Y-m-d');
		$rsql = "update request set r_status='$r_type_id',r_accept_date='$date' where r_id='$r_id'";		
	}
	else
	{
		$rsql = "update request set r_status='$r_type_id' where r_id='$r_id'";
	}	
	$r_result = mysqli_query($con,$rsql);
	if($r_result)
	{
		$r_data = '1';
	}
	else
	{
		$r_data = '0';
	}
	echo $r_data;die;
}

if(isset($_POST['admin_logout']))
{
	$result = session_destroy();
	if($result)
	{
		echo '1';die;
	}
	else
	{
		echo '0';die;
	}
}

?>
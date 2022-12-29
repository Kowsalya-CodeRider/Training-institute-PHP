<!DOCTYPE html>
<html>

<?php include('signinhead.php');
$rand=substr(rand(),0,6);
include('db_connect.php');
if(isset($_POST['student_signin']))
{
	$student_email = $_POST['student_email'];
	$student_password = $_POST['student_password'];
	$chk = $_POST['chk'];
	$captcha = $_POST['captcha'];
	$studentsql = "select st_id,st_name from students where st_email='$student_email' and st_password='$student_password'";
	$presult = mysqli_query($con,$studentsql);
	$presult_1 = mysqli_num_rows($presult);
	if($chk!=$captcha)
	{
		$p_output = 'Captcha does not Match!';
	}
	else if($presult_1>0)
	{
		$presult_2 = mysqli_fetch_assoc($presult);
		$st_name = $presult_2['st_name'];
		$st_id = $presult_2['st_id'];
		session_start();
		$_SESSION["st_id"] = $st_id;
		$_SESSION["st_name"] = $st_name;
		$_SESSION["st_email"] = $student_email;
		$_SESSION["c_code"] = $student_password;
		header('Location: student_dashboard');
	}
	else
	{
		$p_output = 'Invalid Credentials';
	}
}
?>
<body>
    <section class="content">
	<div class="container-fluid">
		<div class="row">	
			<div class="col-md-9">
						<div class="login-box">							
							<div class="card">
								<div class="card-header">
									<div class="logo">
										<center><a href="javascript:void(0);"><img src="../images/footer_logo.png" class="img-responsive"></a></center>
										<!--<small>Admin BootStrap Based - Material Design</small>-->
									</div>
								</div>
								<div class="body">
									<div class="row">
										<div class="col-md-5">
											<div class="card">
												<div class="embed-responsive embed-responsive-16by9">
													<video autoplay loop muted playsinline>
													  <source src="vedios/login.mp4" type="video/mp4">
													  Your browser does not support the video tag.
													</video>
												</div>
											</div>
										</div>
										<div class="col-md-7">
													<form id="sign_in" method="POST" action="student_signin">
														<div class="msg" align="center"><?=isset($p_output)? '<span class="text-danger font-weight-bold">'.$p_output.'</span>' : 'Welcome to Innovaskill Students Login'?></div>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="material-icons">person</i>
															</span>
															<div class="form-line">
																<input type="text" class="form-control" name="student_email" placeholder="Username" required autofocus>
															</div>
														</div>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="material-icons">lock</i>
															</span>
															<div class="form-line">
																<input type="password" class="form-control" name="student_password" placeholder="Password" required>
															</div>
														</div>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="material-icons">android</i>
															</span>
															<div class="form-line">
																<div class="col-md-6">
																<input type="button" id="ran" name="ran" class="btn btn-block bg-orange waves-effect" style="font-size:20px;" value="<?=$rand?>" readonly="readonly">				
																</div>
																<div class="col-md-6">
																<input type="button" class="btn btn-block bg-cyan waves-effect" style="margin-top:4px;" value="Referesh" onclick="captch()" />						
																
																</div>
																<input type="hidden" name="student_signin">
																<input type="hidden" id="chk" name="chk" value="<?=$rand?>">
																<input type="password" class="form-control" name="captcha" placeholder="Captcha" required>
															</div>
														</div>
														
														<div class="row">
															<div class="col-xs-8 p-t-5">
																<input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
																<label for="rememberme">Remember Me</label>
															</div>
															<div class="col-xs-4">
																<button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
															</div>
														</div>
														<div class="row m-t-15 m-b--20">
															<div class="col-xs-6">
																<a href="student_signup">Register Now!</a>
															</div>
															<div class="col-xs-6 align-right">
																<a href="#">Forgot Password?</a>
															</div>
														</div>
													</form>
												</div>
											</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>
		</section>
</body>

</html>
<script type="text/javascript">



function captch() {
    var x = document.getElementById("ran")
    x.value = Math.floor((Math.random() * 1000000) + 1);
	document.getElementById("chk").value=x.value;
}

</script>
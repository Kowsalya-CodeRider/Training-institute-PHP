<!DOCTYPE html>
<html>

<?php include('signinhead.php');
$rand=substr(rand(),0,6);
include('db_connect.php');
if(isset($_POST['partners_signin']))
{
	$p_email = $_POST['p_email'];
	$p_password = $_POST['p_password'];
	$psql = "select p_id,p_name from partners where p_email='$p_email' and p_password='$p_password'";
	$presult = mysqli_query($con,$psql);
	$presult_1 = mysqli_num_rows($presult);
	if($presult_1>0)
	{
		$presult_2 = mysqli_fetch_assoc($presult);
		$p_name = $presult_2['p_name'];
		$p_id = $presult_2['p_id'];
		session_start();
		$_SESSION["p_id"] = $p_id;
		$_SESSION["p_name"] = $p_name;
		$_SESSION["p_email"] = $p_email;
		$_SESSION["p_password"] = $p_password;
		header('Location: partners_dashboard_1');
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
													<form id="sign_in" method="POST" action="partners_signin">
														<div class="msg" align="center"><?=isset($p_output)? '<span class="text-danger font-weight-bold">'.$p_output.'</span>' : 'Welcome to Innovaskill Partners Login'?></div>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="material-icons">person</i>
															</span>
															<div class="form-line">
																<input type="text" class="form-control" name="p_email" placeholder="User Email" required autofocus>
															</div>
														</div>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="material-icons">lock</i>
															</span>
															<div class="form-line">
																<input type="password" class="form-control" name="p_password" placeholder="Password" required>
															</div>
														</div>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="material-icons">android</i>
															</span>
															<div class="form-line">
																<div class="col-md-6">
																<input type="button" id="ran" class="btn btn-block bg-orange waves-effect" style="font-size:20px;" value="<?=$rand?>" readonly="readonly">				
																</div>
																<div class="col-md-6">
																<input type="button" class="btn btn-block bg-cyan waves-effect" style="margin-top:4px;" value="Referesh" onclick="captch()" />						
																
																</div>
																<input type="hidden" name="partners_signin" value="">
																<input type="hidden" name="chk" id="chk" value="<?=$rand?>">
																<input type="password" class="form-control" name="captcha" id="captcha" placeholder="Captcha" required>
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
														<div class="row">															
															<div class="col-xs-12 align-right">
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
   <?php include('signinjs.js');?>
</body>

</html>
<script type="text/javascript">
$(function () {
    $('#sign_in').validate({
		rules: {
            'terms': {
                required: true
            },
            'captcha': {
                equalTo: '#chk'
            }
        },
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
        }
    });
});


function captch() {
    var x = document.getElementById("ran")
    x.value = Math.floor((Math.random() * 1000000) + 1);
}

</script>
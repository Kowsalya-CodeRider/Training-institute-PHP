<!DOCTYPE html>
<html>

<?php include('signinhead.php');?>
<?php
$rand=substr(rand(),0,6);

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
													<form id="sign_in" method="POST">
														<div class="msg" align="center">Welcome to Innovaskill Student's Login</div>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="material-icons">person</i>
															</span>
															<div class="form-line">
																<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
															</div>
														</div>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="material-icons">lock</i>
															</span>
															<div class="form-line">
																<input type="password" class="form-control" name="password" placeholder="Password" required>
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
																
																<input type="hidden" name="chk" value="<?=$rand?>">
																<input type="password" class="form-control" name="password" placeholder="Captcha" required>
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
   <?php include('signinjs.js');?>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>
<script type="text/javascript">



function captch() {
    var x = document.getElementById("ran")
    x.value = Math.floor((Math.random() * 1000000) + 1);
}

</script>
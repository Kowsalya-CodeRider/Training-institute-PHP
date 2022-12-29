<!DOCTYPE html>
<html>
<?php 
include('signinhead.php');
include('db_connect.php');
if(isset($_POST['partners_signup']))
{
	$p_name = $_POST['p_name'];
	$p_password = $_POST['p_password'];
	$p_confirm_password = $_POST['p_confirm_password'];
	$p_email = $_POST['p_email'];
	$p_sql = "insert into partners(p_name,p_email,p_password) values('$p_name','$p_email','$p_password')";
	$p_result = mysqli_query($con,$p_sql);
	if($p_result>0)
	{
		$p_output = "Signup Successfully!";
	}
	else
	{
		$p_output = "Sorry Your data Having error.";
	}
}
?>

<body>
	 <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<div class="signup-box">
						<div class="card">
							<div class="logo">
						   <center><a href="javascript:void(0);"><img src="../images/footer_logo.png" class="img-responsive"></a></center>
						</div>
							<div class="body">
								<form id="sign_up" method="POST" action="partners_signup">
									<div class="msg" align="center"><?=isset($p_output)? '<span class="text-success"><strong>'.$p_output.'</strong></span>':'Welcome to Innovaskill! Register a new Partnership'?></div>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">person</i>
										</span>
										<div class="form-line">
											<input type="text" class="form-control" name="p_name" id="p_name" placeholder="Name" required autofocus>
										</div>
									</div>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<div class="form-line">
											<input type="email" class="form-control" name="p_email" id="p_email" placeholder="Email Address" required>
										</div>
									</div>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock</i>
										</span>
										<div class="form-line">
											<input type="password" class="form-control" name="p_password" id="p_password" minlength="6" placeholder="Password" required>
										</div>
									</div>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock</i>
										</span>
										<div class="form-line">
											<input type="password" class="form-control" name="p_confirm_password" id="p_confirm_password" minlength="6" placeholder="Confirm Password" required>
										</div>
									</div>
									<div class="form-group">
										<input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
										<label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
									</div>
									<input type="hidden" name="partners_signup">
									<button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

									<div class="m-t-25 m-b--5 align-center">
										<a href="partners_signin">You already have a membership?</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>
    <!-- Jquery Core Js -->
   
    <!-- Custom Js -->
    <?php include('signinjs.js');?>
</body>

</html>
<script>
$(function () {
    $('#sign_up').validate({		
        rules: {
            'terms': {
                required: true
            },
            'p_confirm_password': {
                equalTo: '#p_password'
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
            $(element).parents('.form-group').append(error);
        },
		 submitHandler: function(form) {
    form.submit();
  }
    });
});
</script>
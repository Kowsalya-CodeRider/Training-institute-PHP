<?php include('header_1.php'); ?>


<section class="wrapper align-left">
<div class="container shadow-lg p-3 mb-5">

<div class="row">
<div class="col-md-12">
<h2 class="h1set">Industrial Service<span class="float-right shadow-lg p-3 mb-5"><img src="images/plc_panel_1.jpg" class="img-fluid"></span></h2><br>


<p id="service_para">
We offer a full suite of general engineering services, 
including diagnostic services, application design, 
web development, graphic designing, on-site training, 
ongoing project management and many other services. 
We understand the economic pressures you face for 
which our services can help you in attaining the desired goals.

</p>


</div>

</div>

<header></header>
<div class="row">

<div class="col-md-12">
<h2 class="h1set" id="service_h2">Project Solutions/Management<span class="float-left shadow-lg p-3 mb-5"><img src="images/plc_panel_1.jpg" class="img-fluid"></span></h2><br>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-11">
<p id="service_para">
Innovaskill Technologies offers up gradation of old systems 
to new generation of Controls & Automation. We are fully 
capable of implementing PLC controls on any machine 
in need of Controls and Automation.
</p>
</div>
</div>
</div>
</div>

<header></header>
<div class="row">
<div class="col-md-12">
<h2 class="h1set">Solar Installation<span class="float-right shadow-lg p-3 mb-5"><img src="images/solar.jpg" class="img-fluid"></span></h2><br>
<p id="service_para">
Our solar energy solutions are helping businesses & 
residentials to transform themselves to environmentally 
responsible while also cutting their energy costs 
through the installation of renewable technologies.
</p>
</div>
</div>

<header></header>
<div class="row">
<div class="col-md-12">
<h2 class="h1set" id="service_h2">Engineering Services<span class="float-left shadow-lg p-3 mb-5"><img src="images/Engineering_Services.jpg" class="img-fluid"></span></h2><br>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-11">
<p id="service_para">
We offer a full suite of general engineering services 
like PLC installation & Programming, HMI & SCADA Design & Development, 
Drives Commissioning, including diagnostic services, application design, 
start-up assistance, training, and ongoing project management.
</p>
</div>
</div>
</div>
</div>


<header></header>
<div class="row">
<div class="col-md-12">
<h2 class="h1set">Control Panel Fabrication & Wiring<span class="float-right shadow-lg p-3 mb-5"><img src="images/plc_panel.jpg" class="img-fluid"></span></h2><br>
<p id="service_para">
Our team designs and builds sophisticated panels both for a 
wide variety of projects, from small operator PLC cabinets, 
to large multi-bay safety and control systems designed 
to run large facilities.
</p>
</div>
</div>



<header></header>
<div class="row">
<div class="col-md-12">
<h2 class="h1set">Sales & Services</h2><br>
<p id="service_para">
We are focused on delivering Leading Brands & Quality Technological 
components for Industrial Automation tools like PLC, SCADA, Drives, 
HMI and many other devices. Hardware and software solutions
for specific user applications.
</p>
</div>
<div class="col-md-12 align-center">
<img src="images/sales_service.jpg" class="img-fluid shadow-lg p-3 mb-5">
</div>
</div>



<header></header>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="shadow-lg p-3 mb-5">
<center><h3>Enquiry</h3>
	<p id="result_form"></p></center>
						
						<div class="enquiry-form">
						<div class="enq_form">
						<form id="service_form" method="post">
							<div class="field">	
							<div class="field_2">
							<input name="s_name" id="s_name" type="text" placeholder="* Name">
							</div>												
							<div class="field_2">
							<input name="s_mobile" id="s_mobile" type="text" placeholder="* Mobile">
							</div>
							<div class="field_2">
							<input name="s_email" id="s_email" type="email" placeholder="* Email">
							</div>														
							<div class="field_2">
							<textarea name="s_message" id="s_message" rows="3" placeholder="* Message"></textarea>																																													
							</div>					
							<input name="service" type="hidden">
							<center>
							<a id="form_service" class="button shadow-lg">Submit</a>
							</center>
							
							</div>
							</form>
							</div>
						</div>
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
 $("#s_mobile").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
$(document).ready(function(){
	$('#form_service').on('click', function(){ 
	
var s_name = $('#s_name').val();
var s_mobile = $('#s_mobile').val();
var s_email = $('#s_email').val();
var s_message = $('#s_message').val();


 if (s_name.length < 1) {
      $('#s_name').css('border','1px solid red');
    }
if (s_mobile.length < 1) {
      $('#s_mobile').css('border','1px solid red');
    }
if (s_mobile.length < 10) {
      $('#s_mobile').css('border','1px solid red');
    }
if (s_email.length < 1) {
      $('#s_email').css('border','1px solid red');
    }
if (s_message.length < 1) {
      $('#s_message').css('border','1px solid red');
    }

if((s_name.length < 1) || (s_mobile.length < 1) || (s_message.length < 1) || (s_email.length < 1) ||  (s_mobile.length < 10))  
{
	//alert('fill');
}
else {
	$('#s_name').css('border', '2px solid #ccc');
	$('#s_mobile').css('border', '2px solid #ccc');
	$('#s_message').css('border', '2px solid #ccc');
	$('#s_email').css('border', '2px solid #ccc');
	 $.ajax({
            type: 'post',
            url: 'forms.php',
            data: $('#service_form').serialize(),
            success: function (result) {
			  $('#result_form').addClass('text-success font-weight-bold');
              $('#result_form').html(result);
			  $('#service_form').trigger("reset");
            }
          });
}
});
});
</script>
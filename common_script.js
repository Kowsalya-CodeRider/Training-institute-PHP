
$(document).ready(function(){
	
	
 
 $('#second_div_close').on('click', function(event){
     $('#second_div').css('display','none');
	 $('#first_div').css('display','block');
	 $('#icon_wrapper').css('display','block');
 });

 $('#i1').on('click', function(event){
      event.preventDefault();
      $('html, body').stop().animate({scrollTop: $('#move').offset().top}, 2000);
 });
 $('.scrollToTop').on('click', function(event){
      event.preventDefault();
      $('html, body').stop().animate({scrollTop: $('#new_banner').offset().top}, 2000);
 });
 
  $('#testimonial_scroll').on('click', function(event){
      event.preventDefault();
      $('html, body').stop().animate({scrollTop: $('#testimonial').offset().top}, 2000);
 });
  $('#contact_scroll').on('click', function(event){
      event.preventDefault();
      $('html, body').stop().animate({scrollTop: $('#contact').offset().top}, 2000);
 });
 
 $('#whatwe_scroll').on('click', function(event){
      event.preventDefault();
      $('html, body').stop().animate({scrollTop: $('#whatwe').offset().top}, 2000);
 });
 
 $('#form_register').on('click', function(){ 
	
var r_name = $('#r_name').val();
var r_qualification = $('#r_qualification').val();
var r_division = $('#r_division').val();
var r_email = $('#r_email').val();
var r_mobile = $('#r_mobile').val();
var r_course = $('#r_course').val();
var r_message = $('#r_message').val();

 if (r_name.length < 1) {
      $('#r_name').css('border','1px solid red');
    }
if (r_qualification.length < 1) {
      $('#r_qualification').css('border','1px solid red');
    }
if (r_division.length < 1) {
      $('#r_division').css('border','1px solid red');
    }
if (r_email.length < 1) {
      $('#r_email').css('border','1px solid red');
    }
if (r_mobile.length < 1) {
      $('#r_mobile').css('border','1px solid red');
    }
if (r_mobile.length < 10) {
      $('#r_mobile').css('border','1px solid red');
    }
if (r_course.length < 1) {
      $('#r_course').css('border','1px solid red');
    }
if (r_message.length < 1) {
      $('#r_message').css('border','1px solid red');
    }
 
if((r_name.length < 1) || (r_qualification.length < 1) || (r_division.length < 1) || (r_email.length < 1) || (r_mobile.length < 1) || (r_course.length < 1) || (r_message.length < 1) || (r_mobile.length < 10))  
{
	//alert('fill');
}
else {
	$('#r_name').css('border', '2px solid #ccc');
	$('#r_qualification').css('border', '2px solid #ccc');
	$('#r_division').css('border', '2px solid #ccc');
	$('#r_email').css('border', '2px solid #ccc');
	$('#r_mobile').css('border', '2px solid #ccc');
	$('#r_course').css('border', '2px solid #ccc');
	$('#r_message').css('border', '2px solid #ccc');
	 $.ajax({
            type: 'post',
            url: 'forms.php',
            data: $('#register_form').serialize(),
            success: function (result) {
			  $('#enquiry-form-header').addClass('btn-success');
              $('#enquiry-form-header').html(result);
			  $('#register_form').trigger("reset");
            }
          });
}
});
 
 
$('#form_register_1').on('click', function(){ 
	
var r_name = $('#r_name_1').val();
var r_qualification = $('#r_qualification_1').val();
var r_division = $('#r_division_1').val();
var r_email = $('#r_email_1').val();
var r_mobile = $('#r_mobile_1').val();
var r_course = $('#r_course_1').val();
var r_message = $('#r_message_1').val();

 if (r_name.length < 1) {
      $('#r_name_1').css('border','1px solid red');
    }
if (r_qualification.length < 1) {
      $('#r_qualification_1').css('border','1px solid red');
    }
if (r_division.length < 1) {
      $('#r_division_1').css('border','1px solid red');
    }
if (r_email.length < 1) {
      $('#r_email_1').css('border','1px solid red');
    }
if (r_mobile.length < 1) {
      $('#r_mobile_1').css('border','1px solid red');
    }
if (r_mobile.length < 10) {
      $('#r_mobile_1').css('border','1px solid red');
    }
if (r_course.length < 1) {
      $('#r_course_1').css('border','1px solid red');
    }
if (r_message.length < 1) {
      $('#r_message_1').css('border','1px solid red');
    }
 
if((r_name.length < 1) || (r_qualification.length < 1) || (r_division.length < 1) || (r_email.length < 1) || (r_mobile.length < 1) || (r_course.length < 1) || (r_message.length < 1) || (r_mobile.length < 10))  
{
	//alert('fill');
}
else {
	$('#r_name_1').css('border', '2px solid #ccc');
	$('#r_qualification_1').css('border', '2px solid #ccc');
	$('#r_division_1').css('border', '2px solid #ccc');
	$('#r_email_1').css('border', '2px solid #ccc');
	$('#r_mobile_1').css('border', '2px solid #ccc');
	$('#r_course_1').css('border', '2px solid #ccc');
	$('#r_message_1').css('border', '2px solid #ccc');
	 $.ajax({
            type: 'post',
            url: 'forms.php',
            data: $('#register_form_1').serialize(),
            success: function (result) {
			  $('#result_form').addClass('text-success font-weight-bold');
              $('#result_form').html(result);
			  $('#register_form_1').trigger("reset");
            }
          });
}
});
 
});
$( "#carrer_id" ).mouseover(function() {
  $( "#carrer_dropdown" ).css( "display","block" );
});
$( "#carrer_id" ).mouseleave(function() {
  $( "#carrer_dropdown" ).css( "display","none" );
});
$( "#service_id" ).mouseover(function() {
  $( "#service_dropdown" ).css( "display","block" );
});
$( "#service_id" ).mouseleave(function() {
  $( "#service_dropdown" ).css( "display","none" );
});
$( "#technology_id" ).mouseover(function() {
  $( "#technology_dropdown" ).css( "display","block" );
});
$( "#technology_dropdown" ).mouseleave(function() {
  $( "#technology_dropdown" ).css( "display","none" );
});
$( "#training_id" ).mouseover(function() {
  $( "#training_dropdown" ).css( "display","block" );
});
$( "#training_id" ).mouseleave(function() {
  $( "#training_dropdown" ).css( "display","none" );
});
$( "#registrationform_id" ).mouseover(function() {
  $( "#registration_dropdown" ).css( "display","block" );
});
$( "#training_dropdown" ).mouseleave(function() {
  $( "#training_dropdown" ).css( "display","none" );
});
$( "#registration_dropdown" ).mouseleave(function() {
  $( "#registration_dropdown" ).css( "display","none" );
});
$( "#login_id" ).mouseover(function() {
  $( "#login_dropdown" ).css( "display","block" );
});
$( "#login_id" ).mouseleave(function() {
  $( "#login_dropdown" ).css( "display","none" );
});


 $('#form_user_register').on('click', function(){ 
	
var ur_name = $('#ur_name').val();
var ur_qualification = $('#ur_qualification').val();
var ur_division = $('#ur_division').val();
var ur_email = $('#ur_email').val();
var ur_mobile = $('#ur_mobile').val();
var ur_password = $('#ur_password').val();


 if (ur_name.length < 1) {
      $('#ur_name').css('border','1px solid red');
    }
if (ur_qualification.length < 1) {
      $('#ur_qualification').css('border','1px solid red');
    }
if (ur_division.length < 1) {
      $('#ur_division').css('border','1px solid red');
    }
if (ur_email.length < 1) {
      $('#ur_email').css('border','1px solid red');
    }
if (ur_mobile.length < 1) {
      $('#ur_mobile').css('border','1px solid red');
    }
if (ur_password.length < 1) {
      $('#ur_password').css('border','1px solid red');
    }

 
if((ur_name.length < 1) || (ur_qualification.length < 1) || (ur_division.length < 1) || (ur_email.length < 1) || (ur_mobile.length < 1) || (ur_password.length < 1))  
{
	//alert('fill');
}
else {
	$('#ur_name').css('border', '2px solid #ccc');
	$('#ur_qualification').css('border', '2px solid #ccc');
	$('#ur_division').css('border', '2px solid #ccc');
	$('#ur_email').css('border', '2px solid #ccc');
	$('#ur_mobile').css('border', '2px solid #ccc');
	$('#ur_password').css('border', '2px solid #ccc');
	 $.ajax({
            type: 'post',
            url: 'forms.php',
            data: $('#user_register_form').serialize(),
            success: function (result) {
              $('#user_register_result').html(result);
			  $('#user_register_form').trigger("reset");
            }
          });
}
});

$('#user_login').on('click', function(){ 
	
var u_email = $('#u_email').val();
var u_password = $('#u_password').val();


 if (u_email.length < 1) {
      $('#u_email').css('border','1px solid red');
    }
if (u_password.length < 1) {
      $('#u_password').css('border','1px solid red');
    }


 
if((u_email.length < 1) || (u_password.length < 1))  
{
	//alert('fill');
}
else {
	$('#u_email').css('border', '2px solid #ccc');
	$('#u_password').css('border', '2px solid #ccc');
	
	 $.ajax({
            type: 'post',
            url: 'forms.php',
            data: $('#user_login_form').serialize(),
            success: function (result) {
			if(result==0)
			{
				result_1 = 'Invalid Login Credencials';
				$('#user_login_result').html(result_1);
			}
			else
			{
				$('#user_login_form').trigger("reset");
				window.location.href="user/user_index.php";
			}
              
			  
            }
          });
}
});

function first_div()
{
     $('#second_div').css('display','block');
	 $('#first_div').css('display','none');
	 $('#icon_wrapper').css('display','none');
 }
 
 $("#r_mobile").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
 $("#r_mobile_1").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
		
 
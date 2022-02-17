jQuery(document).ready(function(){
	
//-------------------- Root elementi
	jQuery("#snipper").hide();
	jQuery("#divPassword").hide();
	jQuery("#btnPassForgot").hide();
	jQuery("#btnCloseReg").on('click', function(){
		jQuery("#msg").hide();
		jQuery("#imeError").hide();
		jQuery("#emailError").hide();
		jQuery("#passError").hide();
		jQuery("#RegForm")[0].reset();
		location.reload();
	});
	jQuery("#btnCloseForget").on('click',function() {
		jQuery("#msg1").hide();
		jQuery("#emailError1").hide();
		jQuery("#passError1").hide();
		jQuery("#ForgotPassForm")[0].reset();
		location.reload();
	});

	
//------------------------------------------------------------ Registracioni modal
	jQuery("#btnRegForm").on('click', function(){
		
//----------------- Validacija za ime
		var ime = jQuery("#regIme").val();
		var regexIme = /^[a-zA-Z]{3,25}$/
		
		if(ime == "")
		{
			jQuery("#imeError").html('Ime je obavezno!');
			jQuery("#imeError").css('color', 'red');
			return false;
		}
		else if(!(ime.match(regexIme)))
		{
			jQuery("#imeError").html('Pogresan format imena!');
			jQuery("#imeError").css('color', 'red');
			return false;
		}
		else
		{
			jQuery("#imeError").html('');
		}
		
//------------------ Validacija za email
		var email = jQuery("#regEmail").val();
		var regexEmail = /^[a-z0-9]+@[a-z]+.[a-z]{2,3}$/ // nikola@gmail.com
		
		if(email == "")
		{
			jQuery("#emailError").html('Email je obavezan!');
			jQuery("#emailError").css('color', 'red');
			return false;
		}
		else if(!(email.match(regexEmail)))
		{
			jQuery("#emailError").html('Pogresan format email-a! primer: user@mail.com');
			jQuery("#emailError").css('color', 'red');
			return false;
		}
		else
		{
			jQuery("#emailError").html('');
		}
		
//----------------- Validacija za sifru
		var sifra = jQuery("#regPass").val();
		
		if(sifra == "")
		{
			jQuery("#passError").html('Sifra je obavezna!');
			jQuery("#passError").css('color', 'red');
			return false;
		}
		else
		{
			jQuery("#passError").html('');
			jQuery("#btnRegForm").hide('');
			jQuery("#snipper").show('');
		}
		
//--------------------- Ajax 
		jQuery.ajax({
			
			type: 'POST',
			url: 'web_services/register.php',
			data: jQuery("#RegForm").serialize(),
			success: function(result)
			{
				if(result.status == 'fail')
				{
					jQuery("#emailError").html('Email vec postoji!');
					jQuery("#emailError").css('color', 'red');
					jQuery("#btnRegForm").show('');
					jQuery("#snipper").hide('');
				}
				else if(result.status = 'success')
				{
					jQuery("#msg").html('Uspesno ste se registrovali!');
					jQuery("#msg").css('color', 'orange');
					jQuery("#RegForm")[0].reset();
					jQuery("#snipper").hide();
				}
			}
		});
	});
	
//------------------------------------------------------------------Verifikacija mejla
	jQuery("#btnVerifyEmail").on('click', function(){
		var verifyEmail = jQuery("#forgotEmail").val();
		var regexEmail = /^[a-z0-9]+@[a-z]+.[a-z]{2,3}$/ // nikola@gmail.com
		
		if(verifyEmail == "")
		{
			jQuery("#emailError1").html('Email je obavezan!');
			jQuery("#emailError1").css('color', 'red');
			return false;
		}
		else if(!(verifyEmail.match(regexEmail)))
		{
			jQuery("#emailError1").html('Pogresan format email-a! primer: user@mail.com');
			jQuery("#emailError1").css('color', 'red');
			return false;
		}
		else
		{
			
//------------------------ Ajax za verifikaciju mejla
			jQuery.ajax({
				type: 'POST',
				url: 'web_services/verifyEmail.php',
				data: jQuery("#ForgotPassForm").serialize(),
				success: function(result)
				{
					if(result.status == 'success')
					{
						jQuery("#divPassword").show(500);
						jQuery("#btnPassForgot").show();
						jQuery("#btnVerifyEmail").hide();
						jQuery("#emailError1").html('');
					}
					else if(result.status == 'fail')
					{
						jQuery("#msg1").html('Nije pronadjen ni jedan Email!');
						jQuery("#msg1").css('color', 'red');
					}
				}
			});
		}
	});

//----------------------------------------------------------Forgot Password Email Verifikacija
	jQuery("#btnPassForgot").on('click',function(){

//--------------------------Verifikacija mejla
		var verifyEmail = jQuery("#forgotEmail").val();
		var regexEmail = /^[a-z0-9]+@[a-z]+.[a-z]{2,3}$/ // nikola@gmail.com
		
		if(verifyEmail == "")
		{
			jQuery("#emailError1").html('Email je obavezan!');
			jQuery("#emailError1").css('color', 'red');
			return false;
		}
		else if(!(verifyEmail.match(regexEmail)))
		{
			jQuery("#emailError1").html('Pogresan format email-a! primer: user@mail.com');
			jQuery("#emailError1").css('color', 'red');
			return false;
		}
		else
		{
			jQuery("#emailError1").html('');
		}	

//----------------- Validacija za promenu sifre
		var sifra = jQuery("#forgotPassword").val();
		
		if(sifra == "")
		{
			jQuery("#passError1").html('Sifra je obavezna!');
			jQuery("#passError1").css('color', 'red');
		}
		else
		{
			jQuery("#passError1").html('');

//-------------------------------Ajax za promenu sifre
			jQuery.ajax({
				type: 'POST',
				url: 'web_services/updatePassword.php',
				data: jQuery("#ForgotPassForm").serialize(),
				success: function(result) {
					if(result.status == 'success')
					{
						jQuery("#msg1").html('Sifra je promenjena!');
						jQuery("#msg1").css('color','orange');
						jQuery("#ForgotPassForm")[0].reset();
						jQuery("#btnPassForgot").hide();	
					}
					else if(result.status == 'fail')
					{
						jQuery("#msg1").html('Sifra nije promenjena!');
						jQuery("#msg1").css('color','red');
					}
				}
			})
		}
	});

//------------------------------------------------------------Login validacija
	jQuery("#btnLogin").on('click', function(){
			
//------------------ Validacija za email
		var email = jQuery("#emailLogin").val();
		var regexEmail = /^[a-z0-9]+@[a-z]+.[a-z]{2,3}$/ // nikola@gmail.com
		
		if(email == "")
		{
			jQuery("#emailLoginError").html('Email je obavezan!');
			jQuery("#emailLoginError").css('color', 'red');
			return false;
		}
		else if(!(email.match(regexEmail)))
		{
			jQuery("#emailLoginError").html('Pogresan format email-a! primer: user@mail.com');
			jQuery("#emailLoginError").css('color', 'red');
			return false;
		}
		else
		{
			jQuery("#emailLoginError").html('');
		}
		
//----------------- Validacija za sifru
		var sifra = jQuery("#passLogin").val();
		
		if(sifra == "")
		{
			jQuery("#passLoginError").html('Sifra je obavezna!');
			jQuery("#passLoginError").css('color', 'red');
			return false;
		}
		else
		{
			jQuery("#passLoginError").html('');
		}
	});
});
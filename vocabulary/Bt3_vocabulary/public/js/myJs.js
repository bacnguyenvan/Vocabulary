$(document).ready(function(){
	// when key is enter and pick out so running this method
	$('#form-signUp').validate({
		rules:{
			// email:"required"
			email:{
				required:true,
				email:true
			},
			userName:{
				required:true,
				minlength:5
			},
			pass :{
				required:true,
				minlength:5
			},
			pass_confirm :{
				required:true,
				equalTo:'#pass'
			}
		},

		messages:{
			email:{
				required:"This field is requied",
				email:   "Please enter a valid email address"
			},
			userName:{
				required:"This field is required",
				minlength:"Your name must be at least 5 characters"
			},
			pass:{
				required:"Please provide a password",
				minlength:"Your password must be at least 5 characters long"
			},
			pass_confirm:{
				required:"This field is required",
				equalTo :"Please enter the same password as above"
			}

		}
	});

	$('#form-lostPassword').validate({
		rules:{
			email:{
				required:true,
				email:true
			},
			email_confirm:{
				required:true,
				email   :true,
				equalTo :"#email"
			}
		},
		messages:{
			email:{
				required:"This field is required",
				email   :"Please enter a valid email address"
			},
			email_confirm:{
				required:"This field is required",
				email   :"Please enter a valid email address",
				equalTo :"Please enter the same email as above"
			}
		}
	});
});
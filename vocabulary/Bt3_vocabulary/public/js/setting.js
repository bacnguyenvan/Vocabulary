$(document).ready(function(){
	$('#form-setting').validate({
		rules:{
			txtName:{
				required:true,
				minlength:5
			},
			txtPass:{
				required:true,
				minlength:5
			}
		},
		messages:{
			txtName:{
				required:"Please inputting your name",
				minlength:"Your name must be at least 5 characters long"
			},
			txtPass:{
				required:"Please inputting password",
				minlength:"Your password must be at least 5 characters long"
			}
		}
	});


});
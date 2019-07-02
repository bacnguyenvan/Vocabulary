$(document).ready(function(){
	//hide,show account
	$('.acount').on('click',function(){
		$('.acount-dropdown').toggleClass('show');
	});

	//create
	$('.create').on('click',function(){
		// console.log('da create');
		var action=$(this).attr('action');
		var token =$('meta[name="csrf-token"]').attr('content');
		$.confirm({
			title:"<h3>Creating new vocabulary</h3>",
			content:
			'<form action="'+action+'" id="formName" method="post">'+
				'<input type="hidden" name="_token" value=" '+token+' " />'+
				'<input type="text" placeholder="Your new word" name="txtName"> '+
				'<input type="text" placeholder="Your sentence" name="txtSentence"> '+
				'<input type="text" placeholder="Meaning" name="txtMean"> '+
			'</form>',
			buttons:{
				formSubmit:{
					text:'Oke',
					btnClass: 'btn-blue',
					action:function(){
						$('#formName').submit();
					}
				},
				cancel:function(){
					//cancel
				}
			}
		});
	});

	//validate form
	$('#formName').validate({
		rules:{
			txtName:{
				required:true,
				maxlength:20
			}
		},

		messages:{
			txtName:{
				required:"Please inputting word!",
				maxlength:"The word must be as less than 20 characters long"
			}
		}

	});

	$('#main-form').validate({
		rules:{
			txtName:{
				required:true,
				maxlength:20
			}
		},
		messages:{
			txtName:{
				required:"Please inputting vocabulary",
				maxlength:"The vocabulary must be less than 20 characters long"
			}
		}
	});
	
	//
	$('div.alert').delay(4000).slideUp();

});
$(document).ready(function(){
	//hide,show account
	$('.acount').on('click',function(){
		$('.acount-dropdown').toggleClass('show');
	});

	
	//create
	$('.create').on('click',function(){
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
	//search
	$('.search_content').on('click',function(){
		var action=$(this).attr('action');
		var token =$('meta[name="csrf-token"]').attr('content');
		$.confirm({
			title:"<h3 style='color:purple'>Search</h3>",
			content:
			'<form action="'+action+'" id="search_form" method="post">'+
				'<input type="hidden" name="_token" value="'+token+'" />'+
				'<table class="table table-bordered table-danger">'+	

					  '<tbody>'+
						    '<tr>'+
						     
						      '<th>Vocabulary</td>'+
						      '<td><input type="text" name="txtVoca"></td>'+
						     
						    '</tr>'+
						    '<tr>'+
						     
						      '<th>Meaning</td>'+
						      '<td><input type="text" name="txtMean"></td>'+
						     
						    '</tr>'+
					   '</tbody>'+

					
				'</table>'+


			'</form>',
			buttons:{
				formSubmit:{
					text:'Oke',
					btnClass:'btn-blue',
					action:function(){
						$('#search_form').submit();
					}
				},
				cacel:function(){
					//not do something
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

	// messages
	$('div.alert').delay(4000).slideUp();

});
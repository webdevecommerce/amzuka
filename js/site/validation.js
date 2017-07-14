function IsEmail(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

function validateAlphabet(value) {
	var regexp = /^[a-zA-Z ]*$/;
	return regexp.test(value);
}


function clrURL() {
	$("#invitation_url").val('');
	$("#invitation_url").focus();
}
function check_invitation_url() {
	var url_string = $("#invitation_url").val();
	if(url_string!=''){		
		$.ajax( {
				url: 'check-invitations-url',
				type: 'post',
				dataType: 'json',
				data: {'url':url_string},
				success: function( msg ) {
					if(msg.status==1){
						/* $("#urlContDiv").addClass("has-success");
						$("#urlContDiv").removeClass("has-error"); */
						/* $("#url_chk_model_lbl").addClass("alert-success");
						$("#url_chk_model_lbl").removeClass("alert-danger"); */
						$(".url_chk_model_lbl").html(base_url+url_string+" is available");
						$("#url_chk_success_btn").trigger("click");
					}else{
						/* $("#urlContDiv").addClass("has-error");
						$("#urlContDiv").removeClass("has-success"); */
						/* $("#url_chk_model_lbl").addClass("alert-danger");
						$("#url_chk_model_lbl").removeClass("alert-success"); */
						$(".url_chk_model_lbl").html(base_url+url_string+" is unavailable");
						$("#url_chk_danger_btn").trigger("click");
					}
				}
		} );
	}else{
		$("#urlContDiv").addClass("has-errors");
		$("#urlContDiv").removeClass("has-success");
		$("#url_chk_warning_btn").trigger("click");
	}
}
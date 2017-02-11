$(document).ready(function(){
	/* $( "#register" ).click(function() {
		alert( "Handler for .click() called." );
	}); */
/* 	
	var bindStoreSubmit = function () {
    $('#iFormRegister').submit(function (event) {
			alert( "Handler for .click() fsdfsfs called." +  $('#iInputUserid').val() + ' oo ' + $('#iInputPinNum').val());
      // TODO add $.blockui
      event.preventDefault();
      var registration = {
        reg_id: $('#iInputUserid').val(),
        pin: $('#iInputPinNum').val(),
        password: $('#iInputPasswd').val()
      };

      $.post("/auth/register_user/", registration, function (response) {
        getResources();
      });
    });
  }; */
	
/* 	$("#register").validate({
		rules:{
			pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			pwd2:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	}); */
	// bindStoreSubmit();
});
//# sourceMappingURL=register.js.map
